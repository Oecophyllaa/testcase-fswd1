@extends('layouts.admin')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">

        <!-- card -->
        <div class="card">
          <h5 class="card-header">Data Cuti Karyawan</h5>

          <!-- table wrapper -->
          <div class="table-responsive text-nowrap px-3 pb-3">
            <!-- view sisa cuti -->
            <a href="{{ route('admin.cuti.sisa-cuti') }}" class="btn btn-primary mb-4">
              <span class="tf-icons bx bxs-notepad"></span>&nbsp; Sisa Cuti Karyawan
            </a>
            <!-- / view sisa cuti -->

            <!-- table -->
            <table class="table table-hover" id="dataTable">
              <thead>
                <tr class="text-nowrap">
                  <th>Nomor Induk</th>
                  <th>Nama</th>
                  <th>Tanggal Cuti</th>
                  <th>Lama Cuti</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cuti as $cuti)
                  <tr>
                    <th scope="row">{{ $cuti->nomor_induk }}</th>
                    <td>{{ $cuti->karyawan->nama }}</td>
                    <td>{{ $cuti->tgl_cuti->format('d-M-y') }}</td>
                    <td>{{ $cuti->lama_cuti }}</td>
                    <td>{{ $cuti->keterangan }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table wrapper -->
        </div><!-- / card -->

      </div><!-- / end column -->
    </div><!-- / end row -->
  </div><!-- / end wrapper -->
@endsection

@push('after-script')
  <script>
    $('#dataTable').DataTable();
  </script>
@endpush
