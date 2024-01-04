@extends('layouts.admin')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">

        <!-- card -->
        <div class="card">
          <h5 class="card-header">Data Sisa Cuti Karyawan</h5>

          <!-- table wrapper -->
          <div class="table-responsive text-nowrap px-3 pb-3">
            <!-- table -->
            <table class="table table-hover" id="dataTable">
              <thead>
                <tr class="text-nowrap">
                  <th>Nomor Induk</th>
                  <th>Nama</th>
                  <th>Sisa Cuti</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($sisa_cuti as $sisa_cuti)
                  <tr>
                    <th scope="row">{{ $sisa_cuti->nomor_induk }}</th>
                    <td>{{ $sisa_cuti->nama }}</td>
                    <td>{{ $sisa_cuti->sisa_cuti }}</td>
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
