@if($errors->has())
  <?php
  $all_errors = '';
  foreach ($errors->all() as $error) {
    $all_errors .= $error . '<br>';
  }
  echo StatusMessage::danger($all_errors);
  ?>
@endif