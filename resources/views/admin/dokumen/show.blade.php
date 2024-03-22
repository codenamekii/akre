@extends('layouts.main')

@section('content')
  <section style="margin-top: 12vh">
    <div class="container">
      <h1>{{ $dokumen->nama }}</h1>
      <p>{{ $dokumen->kriteria }}</p>
      <p>{{ $dokumen->sub_kriteria }}</p>
      <p>{{ $dokumen->catatan }}</p>
      <p>{{ $dokumen->tipe }}</p>
      <p>{{ $dokumen->path }}</p>
      <p>{{ $dokumen->created_at }}</p>
      <p>{{ $dokumen->updated_at }}</p>
    </div>
  </section>
@endsection