@if (Session::has('error'))
<br>
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">
      &times;
    </button>
    {{Session::get('danger')}}
  </div>
@endif