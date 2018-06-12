@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <div class="alert alert-danger">
      {{ $error }}
    </div>
  @endforeach
@endif


@if(session('smsg'))
  <div class="alert alert-success">
    {{ session('smsg') }}
  </div>
@endif

@if(session('fmsg'))
  <div class="alert alert-danger">
    {{ session('fmsg') }}
  </div>
@endif
