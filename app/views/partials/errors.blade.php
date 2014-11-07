@if (Session::has('errors') && Session::get('errors')->has())
  {{ StatusMessage::danger(
    implode('<br>', Session::get('errors')->all()) ) }}
@endif