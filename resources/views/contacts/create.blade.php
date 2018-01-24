@extends('layouts.master')

@section('title')
    Create Contact
@endsection

@section('content')
   <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Add Contact</strong>
        </div>          
        <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @include('contacts.form')
            {{ csrf_field() }}
        </form> 
    </div>
@endsection