@extends('layouts.master')

@section('title')
    Edit Contact
@endsection

@section('content')
   <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Edit Contact</strong>
        </div>          
        <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
            @include('contacts.form')
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $postId }}">
        </form> 
    </div>
@endsection