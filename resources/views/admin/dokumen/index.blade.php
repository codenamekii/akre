@extends('layouts.main')

@section('content')

<section class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <a href="{{ route('dokumen.create') }}" class="btn btn-primary">Buat Dokumen</a>
    <form class="d-inline" action="/admin/dokumen" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" name="result" placeholder="Cari Dokumen.." aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('result', request()->input('result')) }}">
        <select name="kriteria" id="" style="width: 70px;">
          <option value="" selected>Kriteria</option>
          @for ($i = 1; $i <= 9; $i++)
            <option value="{{ $i }}" {{ request()->input('kriteria') == $i ? 'selected' : '' }}>{{ 'Kriteria '.$i }}</option>
          @endfor
          <option value="10" {{ request()->input('kriteria') == '10' ? 'selected' : '' }}>Kondisi Eksternal</option>
          <option value="11" {{ request()->input('kriteria') == '11' ? 'selected' : '' }}>Profil Institusi</option>
          <option value="12" {{ request()->input('kriteria') == '12' ? 'selected' : '' }}>Analisis & Penetapan Program Pengembangan</option>
        </select>
        <select name="tipe" id="" style="width: 70px;">
          <option value="" selected>Tipe</option>
          <option value="URL" {{ request()->input('tipe') == 'URL' ? 'selected' : '' }}>URL</option>
          <option value="PDF" {{ request()->input('tipe') == 'PDF' ? 'selected' : '' }}>PDF</option>
          <option value="Image" {{ request()->input('tipe') == 'Image' ? 'selected' : '' }}>Image</option>
        </select>
        <div class="input-group-append">
          <button class="btn btn-common" id="button-addon2"><i class="bi bi-search"></i> Cari</button>
          <a class="btn btn-danger" href="/admin/dokumen"><i class="bi bi-arrow-clockwise"></i> Reset</a>
        </div>
      </div>
    </form>
    <table class="table">
      <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Kriteria</th>
        <th>Sub Kriteria</th>
        <th>Tipe</th>
        <th>Aksi</th>
      </tr>
      @foreach ($dokumens as $dokumen)
        <tr>
          <td>{{ $dokumens->firstItem() + $loop->index }}</td>
          <td><a href="{{ route('dokumen.show', $dokumen->id) }}">{{ $dokumen->nama }}</a></td>
          <td>{{ $dokumen->kriteria }}</td>
          <td>{{ $dokumen->sub_kriteria }}</td>
          <td>{{ $dokumen->tipe }}</td>
          <td>
            <a href="{{ route('dokumen.edit', $dokumen->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
          </td>
        </tr>
      @endforeach
    </table>

    {{ $dokumens->links() }}
  </div>
</section>

@endsection