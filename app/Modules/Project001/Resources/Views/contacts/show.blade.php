@extends('layouts.main')

@section('notes')

    <p>This is a basic Laravel CRUD application (a simple contact list).</p>

@stop

@section('content')

    <div class="container-fluid">
        
        <h1>Details for {{$contact->name}}:</h1>

        <table class="compact">
            <tr><td>Name:</td><td>{{$contact->name}}</td></tr>
            <tr><td>Email:</td><td>{{$contact->email}}</td></tr>
            <tr><td>ID:</td><td>{{$contact->id}}</td></tr>
            <tr><td>Created:</td><td>{{$contact->created_at->format('n/j/Y g:i a T')}}</td></tr>
            <tr><td>Updated:</td><td>{{$contact->updated_at->format('n/j/Y g:i a T')}}</td></tr>
        </table>

        <a href="/project001/contacts/{{$contact->id}}/edit" class="btn btn-primary">Edit this record</a>
        <button type="submit" form="delete-record" class="btn btn-danger">Delete this record</button>
        <a href="/project001" class="btn btn-default">Return to Index</a>

        <form id="delete-record" action="/project001/contacts/{{$contact->id}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete">
        </form>

    </div><!-- .container -->
@stop
