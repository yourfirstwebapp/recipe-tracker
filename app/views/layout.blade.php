<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title') | Recipe Tracker | Your First Web App</title>

  {{ View::make('partials.shim') }}

  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::style('css/style.css') }}
  {{ HTML::script('js/jquery-latest.min.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/script.js') }}
</head>
<body>

  {{ View::make('partials.header') }}

  <div class="container">

    {{ View::make('partials.message') }}
    {{ View::make('partials.errors') }}

    @yield('content')

    {{ View::make('partials.footer') }}

  </div>

</body>
</html>