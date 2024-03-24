@extends('layouts.main')

@section('content')

<section class="section-padding" style="margin-top: 9vh;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Dokumen</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>

  <div class="container border rounded shadow p-4" style="width:90%;">
    <div class="row justify-content-between pb-4">
      <div class="col-lg-2 col-md-4 col-sm-12 mb-2 mb-md-0">
        <a href="{{ route('dokumen.create') }}" class="btn btn-success btn-block"><i class="bi bi-plus"></i> Buat Dokumen</a>
      </div>
      <div class="col-lg-4 col-md-8 col-sm-12">
        <form class="wow fadeInRight" ata-wow-delay="0.3s" action="/admin/dokumen" method="get">
          <div class="input-group">
            <select class="form-select p-1 bg-success text-light" name="kriteria" id="" style="max-width: 90px;">
              <option value="" selected>Kriteria</option>
              @for ($i = 1; $i <= 9; $i++)
              <option value="{{ $i }}" {{ request()->input('kriteria') == $i ? 'selected' : '' }}>Kriteria {{ $i }}</option>
              @endfor
              <option value="10" {{ request()->input('kriteria') == '10' ? 'selected' : '' }}>Kondisi Eksternal</option>
              <option value="11" {{ request()->input('kriteria') == '11' ? 'selected' : '' }}>Profil Institusi</option>
              <option value="12" {{ request()->input('kriteria') == '12' ? 'selected' : '' }}>Analisis & Penetapan Program Pengembangan</option>
            </select>
            <select class="form-select p-1 bg-success text-light" name="tipe" id="" style="max-width: 80px;">
              <option value="" selected>Tipe</option>
              <option value="URL" {{ request()->input('tipe') == 'URL' ? 'selected' : '' }}>URL</option>
              <option value="PDF" {{ request()->input('tipe') == 'PDF' ? 'selected' : '' }}>PDF</option>
              <option value="Image" {{ request()->input('tipe') == 'Image' ? 'selected' : '' }}>Image</option>
            </select>
            <input type="text" class="form-control" name="result" placeholder="Cari Dokumen.." aria-label="Recipient's username" aria-describedby="button-addon2" value="{{ old('result', request()->input('result')) }}">
            <div class="input-group-append">
              <button class="btn btn-success" id="button-addon2"><i class="bi bi-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    
    <div class="col-12" style="overflow-x: auto">
      <table class="table table-hover">
        <tr>
          <th class="text-center">No</th>
          <th>Nama</th>
          <th class="text-center">Kriteria</th>
          <th>Sub Kriteria</th>
          <th class="text-center">Tipe</th>
          <th class="text-center">Aksi</th>
        </tr>
        @foreach ($dokumens as $dokumen)
          <tr>
            <td class="text-center">{{ $dokumens->firstItem() + $loop->index }}</td>
            <td><a class="text-success" href="{{ route('dokumen.show', $dokumen->id) }}">{{ $dokumen->nama }}</a></td>
            <td class="text-center">{{ $dokumen->kriteria }}</td>
            <td>{{ $dokumen->sub_kriteria }}</td>
            <td class="text-center">{{ $dokumen->tipe }}</td>
            <td class="text-center">
              <a class="text-primary" href="{{ route('dokumen.edit', $dokumen->id) }}"><i class="bi bi-pencil-square"></i></a>
              <form class="d-inline" action="{{ route('dokumen.destroy', $dokumen->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-danger" style="background:none; border:none; padding:0;" onclick="return confirm('Apakah anda yakin ingin menghapus dokumen ini?')"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </table>
    </div>

    {{ $dokumens->onEachSide(1)->links() }}
  </div>
</section>

@endsection