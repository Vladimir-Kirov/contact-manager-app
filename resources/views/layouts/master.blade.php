<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon"/>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="{{ asset('assets/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
	  <link href="{{ asset('assets/jquery-ui/jquery-ui.theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
  </head>
  <body>
    @include('includes.admin-header')
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group" {{ $selected_group = Request::get('group_id') }}>
            <a href="{{ route('contacts.index') }}" class="list-group-item {{ empty($selected_group) ? 'active' : '' }}">All Contacts <span class="badge">{{ App\Contact::count() }}</span></a>
            @foreach(App\Group::all() as $group)
                <a href="{{ route('contacts.index', ['group_id' => $group->id]) }}" class="list-group-item {{ $selected_group == $group->id ? 'active' : '' }}">{{ $group->name }} <span class="badge">{{ $group->contacts->count() }}</span></a>
            @endforeach
          </div>
        </div>
        <div class="col-md-9">
            @yield('content')
        </div>
      </div>
    </div>
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jasny-bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
      $(document).ready(function () {
        $('#term').autocomplete({
          source: "{{ route('contacts.autocomplete') }}",
          minLength: 3,
          select: function(event, ui) {
            $('#term').val(ui.item.value);
          }
        });
      });
    </script>
    @yield('form-script')
  </body>
</html>