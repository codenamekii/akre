<form action="/login" method="POST">
  @csrf
  <input type="text" name="username" placeholder="Username">
  <input type="password" name="password" placeholder="Password">
  <input type="submit" value="Login">
</form>

@if ($errors->any())
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif

@if (session()->has('error'))
<div>
  {{ session()->get('error') }}
</div>
@endif