@extends('app')
@section('title') Dashboard @endsection
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div id="list_sektor" class="row">
        @foreach ($jenis_produksis as $jenis_produksi)
          @if (count($jenis_produksi->dataPuk) > 0)
            <div class="col-lg-4 col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{ $jenis_produksi->nama }}</h3>
                  @php
                    $sudah_laporan = 0;
                    $jumlah_rupiah_terkumpul = 0;
                    foreach ($jenis_produksi->dataPuk as $dataPuk) {
                      foreach ($dataPuk->dataLaporan as $key => $dataLaporan) {
                        $tgl_laporan = tglCarbon($dataLaporan->created_at, "m");
                        $tgl_now = date('m');
                        if ($tgl_now == $tgl_laporan) {
                          $sudah_laporan += count($dataPuk->dataLaporan);
                          $jumlah_rupiah_terkumpul += $dataLaporan->jumlah_iuran_dpp_hasil;
                        }
                      }
                    }

                    $persen = $sudah_laporan * 100 / count($jenis_produksi->dataPuk);
                  @endphp
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="pr-3">{{ $sudah_laporan }}/{{ count($jenis_produksi->dataPuk) }}</span>
                    <div id="progress_bar" class="progress flex-grow-1" data-id="{{ $jenis_produksi->id }}">
                      <div id="progress_bar" class="progress-bar bg-success" role="progressbar" data-id="{{ $jenis_produksi->id }}" style="width: {{ $persen }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <span class="ml-3">{{ round($persen) }}%</span>
                  </div>
                </div>
                <div class="card-footer">
                  <span>Rp. {{ rupiah($jumlah_rupiah_terkumpul) }}</span>
                </div>
              </div>
            </div>
            @endif
        @endforeach
      </div>
    </div>
  </div>
</div>

{{-- modal list puk --}}
<div class="modal fade" id="modal_list">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Daftar Nama PUK</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="daftar_nama_puk"></div>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#list_sektor').on('click', function(e) {
      $('#daftar_nama_puk').empty();

      const id = e.target.id;
      const dataId = e.target.getAttribute('data-id')
      
      if (!id) return false;
      
      let url = "{{ route('home.get_puk', [':id']) }}";
      url = url.replace(':id', dataId);

      $.ajax({
        url: url,
        type: "get",
        success: function(response) {
          let val_puk = ``;
          $.each(response.puks, function(index, item) {
            val_puk += `<div>${index + 1}. ${item.nama}`;
              $.each(item.data_laporan, function(index_laporan, item_laporan) {
                let created_at = item_laporan.created_at;
                let date = new Date(created_at);
                let dateNow = new Date().getMonth() + 1;
                let month = date.getMonth() + 1;
                
                if (dateNow === month) {
                  val_puk += `[<span class="text-success font-weight-bold">Sudah</span>]`;
                }
              });              
            val_puk += `</div>`;
          })
          $('#daftar_nama_puk').append(val_puk);
          $('#modal_list').modal('show');
        }
      })
    })
  })
</script>
@endsection