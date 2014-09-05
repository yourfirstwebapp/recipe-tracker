<footer class="footer clearfix">
  <small>
    <a href="http://yourfirstwebapp.com">
      Your First Web App</a>
    by Alex P. Coleman
  </small>
  <nav>
    <ul>
      <li><a href="<?php
        echo URL::action('PageController@about'); ?>">About</a></li>
      <li><a href="<?php
        echo URL::action('PageController@contact'); ?>">Contact</a></li>
    </ul>
  </nav>
</footer>