@extends('layouts.main')

@section('notes')

    <p>This is a basic Laravel CRUD application (a simple contact list).</p>

@stop

@section('content')

    <div class="container-fluid">
        
        <h1>Contacts</h1>

        @if( ! count($contacts))
            <h3>No contacts found</h3>
        @else
            <table class="compact">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <td><a href="/project001/contacts/{{$contact->id}}">{{ $contact->name }}</a></td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="/project001/contacts/create" class="btn btn-primary">Create a new contact</a>

    </div><!-- /.container -->

@stop
