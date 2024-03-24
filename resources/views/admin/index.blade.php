@extends('layouts.main')

@section('content')
  <section style="margin-top: 12vh">
    <div class="container">
      <h1>Admin</h1>
      Pilih apa yang ingin anda olah?
      <a class="btn btn-primary" href="/admin/dokumen">Dokumen</a>
      <a class="btn btn-primary" href="/admin/visualisasi">Visualisasi</a>
    </div>
  </section>
@endsection