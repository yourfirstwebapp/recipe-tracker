<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title') | Recipe Tracker | Your First Web App</title>
  <?php echo View::make('partials.shim') ?>

  {{ HTML::style('css/bootstrap.css') }}
  {{ HTML::style('css/style.css') }}
  {{ HTML::script('js/jquery-latest.min.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
</head>
<body>

  <?php echo View::make('partials.header') ?>

  <div class="container">

    @yield('content')

    <?php echo View::make('partials.footer') ?>

  </div>

</body>
</html>