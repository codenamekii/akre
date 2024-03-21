@extends('layouts.main')

@section('content')
<section class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <form action="/admin/dokumen" method="POST">
      @csrf
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama">
      <label for="kriteria">Kriteria</label>
      <select name="kriteria" id="kriteria">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
      <label for="sub_kriteria">Sub Kriteria</label>
      <input type="text" name="sub_kriteria" id="sub_kriteria">
      <label for="catatan">Catatan</label>
      <input type="text" name="catatan" id="catatan">
      <label for="tipe">Tipe</label>
      <select name="tipe" id="tipe">
        <option value="pdf">PDF</option>
        <option value="image">Image</option>
        <option value="url">URL</option>
      </select>
      <button type="submit">Submit</button>
    </form>
  </div>
</section>
@endsection