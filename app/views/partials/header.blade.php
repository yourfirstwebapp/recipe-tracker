<nav class="navbar navbar-inverse navbar-static-top" role="navigation">

  <div class="container">

    <!-- Mobile navigation button and app name -->
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

    <!-- Navigation -->
    <div class="collapse navbar-collapse" id="main_navigation">
      <ul class="nav navbar-nav navbar-right">
        <li <?php
          if (Request::is('author')) {
            echo 'class="active"';
          }
        ?>
        >
          <a href="{{ URL::route('author.index') }}">
            Authors</a>
        </li>
        <li <?php
          if (Request::is('recipe')) {
            echo 'class="active"';
          }
        ?>
        >
          <a href="{{ URL::route('recipe.index') }}">
            Recipes</a>
        </li>
        <li <?php
          if (Request::is('/')) {
            echo 'class="active"';
          }
        ?>>
          <a href="{{ URL::action('PageController@index') }}">
            Home</a>
        </li>
        <li <?php
          if (Request::is('about')) {
            echo 'class="active"';
          }
        ?>>
          <a href="{{ URL::action('PageController@about') }}">
            About</a>
        </li>
        <li <?php
          if (Request::is('contact')) {
            echo 'class="active"';
          }
        ?>>
          <a href="{{ URL::action('PageController@contact') }}">
            Contact</a>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->

  </div><!-- /.container -->

</nav>