@if (isset($errors) && $errors->has())
  {{ StatusMessage::danger(
    implode('<br>', $errors->all()) ) }}
@endif