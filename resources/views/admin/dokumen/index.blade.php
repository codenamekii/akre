@extends('layouts.main')

@section('content')

<section class="section-padding" style="margin-top: 12vh ;">
  <div class="container">
    <a href="{{ route('dokumen.create') }}" class="btn btn-primary">Buat Dokumen</a>
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