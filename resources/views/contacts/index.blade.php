@extends('layouts.master')

@section('title')
    My Contact
@endsection

@section('content')
    @include('includes.info-box')
    <div class="panel panel-default">
        <table class="table">
            <div class="well clearfix">
                <span class="lead">All Contacts</span>
                <a href="{{ route('contacts.create') }}" class="btn btn-success pull-right">
                    <i class="glyphicon glyphicon-plus"></i>
                    Add Contact
                </a>
            </div>
            @foreach($contacts as $contact)
            <tr>
                <td class="middle">
                    <div class="media">
                    <div class="media-left hover">
                        <a href="#">
                            <?php $photo = !is_null($contact->photo) ? $contact->photo : 'default.png' ?>
                            <img class="media-object" src="{{ asset('uploads/' . $photo) }}" alt="{{ $contact->name }}" width="100" height="100">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $contact->name }}</h4>
                        <address>
                            <strong>{{ $contact->company }}</strong><br>
                            {{ $contact->email }}
                        </address>
                    </div>
                    </div>
                </td>
                <td width="100" class="middle">
                    <div>
                        <a href="{{ route('contacts.edit', ['id' => $contact->id]) }}" class="btn btn-circle btn-default btn-xs" title="Edit">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a href="{{ route('contacts.destroy', ['id' => $contact->id]) }}" class="btn btn-circle btn-danger btn-xs" title="Delete" onclick="return confirm('Are You sure?')">
                            <i class="glyphicon glyphicon-remove"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>            
    </div>

    <div class="text-center">
        <nav>
            {{ $contacts->appends( Request::query() )->links() }}
        </nav>
    </div>
@endsection