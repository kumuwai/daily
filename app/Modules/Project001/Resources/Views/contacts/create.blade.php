@extends('layouts.main')

@section('notes')

    <p>This is a basic Laravel CRUD application (a simple contact list).</p>

@stop

@section('content')

    <div class="container-fluid">
        
        @include('base::notifications')

        <h1>Add a New Contact</h1>

        <form action="/project001/contacts" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="/project001" class="btn btn-default">Cancel</a>
        </form>

    </div><!-- .container -->
@stop