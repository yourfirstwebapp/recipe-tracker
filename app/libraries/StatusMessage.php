<?php

class StatusMessage
{
  public static function success($message = '')
  {
    return '<div class="alert alert-success">'
      . $message . '</div>';
  }

  public static function danger($message = '')
  {
    return '<div class="alert alert-danger">'
      . $message . '</div>';
  }
}
