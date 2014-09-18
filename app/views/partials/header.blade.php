<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"
        data-toggle="collapse" data-target="#main_navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::action('PageController@index') }}">
        Recipe Tracker</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="main_navigation">
      <ul class="nav navbar-nav navbar-right">
        <li {{ Request::is('recipe') ? 'class="active"' : '' }}>
          <a href="{{ URL::route('recipe.index') }}">
            Recipes</a>
        </li>
        <li {{ Request::is('/') ? 'class="active"' : '' }}>
          <a href="{{ URL::action('PageController@index') }}">
            Home</a>
        </li>
        <li {{ Request::is('about') ? 'class="active"' : '' }}>
          <a href="{{ URL::action('PageController@about') }}">
            About</a>
        </li>
        <li {{ Request::is('contact') ? 'class="active"' : '' }}>
          <a href="{{ URL::action('PageController@contact') }}">
            Contact</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>