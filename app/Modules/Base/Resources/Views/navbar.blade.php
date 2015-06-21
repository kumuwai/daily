<nav id="main-menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Playground</a>
    </div><!-- .navbar-header -->

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Projects <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            @foreach($projects as $project)
                <li>
                    <a href="/{{$project->slug}}">{{$project->title}} - {{$project->description}}</a>
                </li>
            @endforeach
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Other <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/history">History</a></li>
          </ul>
        </li>
      </ul>

    </div><!-- /.navbar-collapse -->

  </div><!-- .container -->
</nav>
