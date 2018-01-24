<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contact;
use App\Group;

class ContactsController extends Controller
{
    private $upload_dir;

    public function __construct()
    {
        $this->upload_dir = base_path() . '/public/uploads';
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }

        $contacts = Contact::where(function($query) use ($request) {
                if ( ($group_id = $request->get('group_id') ) ) {
                        $query->where('group_id', $group_id);
                    }
                
                if ( ($term = $request->get('term') ) ) {
                    $query->orWhere('name', 'like', '%' . $term . '%');
                    $query->orWhere('email', 'like', '%' . $term . '%');
                    $query->orWhere('company', 'like', '%' . $term . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(5);

        return view('contacts.index', ['contacts' => $contacts]);
    }

    public function autocomplete(Request $request)
    {
        if ($request->ajax()) 
        {
            $contacts = Contact::where(function($query) use ($request) {   
                if ( ($term = $request->get('term') ) ) {
                    $query->orWhere('name', 'like', '%' . $term . '%');
                    $query->orWhere('email', 'like', '%' . $term . '%');
                    $query->orWhere('company', 'like', '%' . $term . '%');
                }
            })
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();
    
            $results = [];
            foreach ($contacts as $contact) {
                $results[] = ['id' => $contact->id, 'value' => $contact->name];
            }
            return response()->json($results);
        }
    }

    private function getGroups()
    {  
        $groups = Group::all();
        return $groups;
    }

    public function create()
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $groups = $this->getGroups();
        return view('contacts.create', ['groups' => $groups]);
    }

    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $groups = $this->getGroups();        
        $contact = Contact::find($id);

        return view('contacts.edit', ['groups' => $groups, 'contact' => $contact, 'postId' => $id]);
    }

    private function get_request(Request $request)
    {
        $data = $request->all(); 

        if ($request->hasFile('photo'))
        {
            $photo = $request->file('photo')->getClientOriginalName(); 

            $destination = $this->upload_dir; 
            $request->file('photo')->move($destination, $photo);
            
            $data['photo'] = $photo;
        }
        return $data;
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'company' => 'required',
            'email' => 'required|email',
            'photo' => 'mimes:jpg,jpeg,png,gif,bmp'
        ]);
        
        if (!Auth::check()) {
            return redirect()->back();
        }
        $data = $this->get_request($request);
        Contact::create($data);

        return redirect()->route('contacts.index')->with('success', 'Contact Saved!');  
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'company' => 'required',
            'email' => 'required|email'
        ]);

        if (!Auth::check()) {
            return redirect()->back();
        }

        $contact = Contact::find($request->input('id'));

        $data = $this->get_request($request);

        $contact->update($data);

        return redirect()->route('contacts.index')->with('success', 'Contact Updated!');        
    }

    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        
        $contact = Contact::where('id', $id)->firstOrFail();

        if (!is_null($contact->photo))
        {
            $file_path = $this->upload_dir . '/' . $contact->photo;
            if (file_exists($file_path)) 
            {
                unlink($file_path);
            }
        }
        $contact->delete();
        
        return redirect()->route('contacts.index')->with('success', 'Contact Deleted!');
    }
}
