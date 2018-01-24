@extends('layouts.admin')

@section('title')
    My Contact
@endsection

@section('content')
    @include('includes.header')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sign In</h3>
            </div>
            <div class="panel panel-body">
                <form action="{{ route('admin.login') }}" method="post">
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <div class="input-group">
                            <span for="email" class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <div class="input-group">
                            <span for="password" class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                            <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

