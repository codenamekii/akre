@extends('layouts.main')

@section('content')

<section class="section-padding" style="margin-top: 9vh;">
  <div class="section-header text-center">
    <h2 class="section-title wow fadeInDown" data-wow-delay="0.3s">Dokumen</h2>
    <div class="shape wow fadeInDown" data-wow-delay="0.3s"></div>
  </div>

  <div class="container border rounded shadow p-4" style="width:90%;">
    <div class="row justify-content-between pb-4">
      <div class="col-lg-4 col-md-6 col-sm-12 mb-2 mb-md-0">
        <a href="/admin"  class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-chevron-double-left"></i> Kembali</a>
        <a href="{{ route('dokumen.create') }}" class="btn btn-success wow fadeInRight" ata-wow-delay="0.3s"><i class="bi bi-plus-lg"></i> Tambah</a>
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
              <option value="12" {{ request()->input('kriteria') == '12' ? 'selected' : '' }}>Gugus Jaminan Mutu</option>
            </select>
            <select class="form-select p-1 bg-success text-light" name="tipe" id="" style="max-width: 80px;">
              <option value="" selected>Tipe</option>
              <option value="URL" {{ request()->input('tipe') == 'URL' ? 'selected' : '' }}>URL</option>
              <option value="PDF" {{ request()->input('tipe') == 'PDF' ? 'selected' : '' }}>PDF</option>
              <option value="Image" {{ request()->input('tipe') == 'Image' ? 'selected' : '' }}>Image</option>
            </select>
            <input type="text" class="form-control shadow" name="result" placeholder="Cari Dokumen.." aria-describedby="button-addon2" value="{{ old('result', request()->input('result')) }}">
            <div class="input-group-append">
              <button class="btn btn-search" id="button-addon2"><i class="bi bi-search"></i></button>
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

                <button type="button" class="text-danger" style="background:none; border:none; padding:0;" data-toggle="modal" data-target="#confirmationModal"><i class="bi bi-trash"></i></button>

              <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered  " role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title text-dark" id="exampleModalLabel">Konfirmasi Hapus Dokumen</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body d-flex justify-content-start text-dark">
                      Apakah anda yakin ingin menghapus dokumen ini?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <form class="d-inline" action="{{ route('dokumen.destroy', $dokumen->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</button>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </td>
          </tr>
        @endforeach
      </table>
    </div>

    <div id="pagenation">
      {{ $dokumens->onEachSide(1)->links() }}
    </div>
  </div>
  <!-- Modal -->


</section>
<script>
  function hapusDokumen() {
    console.log('Dokumen telah dihapus.');
    $('#confirmationModal').modal('hide');
}
</script>

@endsection