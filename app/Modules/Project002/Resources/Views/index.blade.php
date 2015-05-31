@extends('layouts.main')

@section('notes')

    <p>Today, I'm doing a little bit of work with Bootstrap menus. A lot of this will be reflected in the basic site infrastructure (eg, the main menu).</p>

@stop

@section('content')

    <div class="container">
        <p>This is a Bootstrap button with navigation:</p>

        <div class="btn-group">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            Navigate To Project &nbsp;<span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            @foreach($projects as $project)
                <li>
                    <a href="/{{$project->slug}}">{{$project->title}} - {{$project->description}}</a>
                </li>
            @endforeach
          </ul>
        </div><!-- .btn-group -->
    
    </div><!-- /.container -->

@stop