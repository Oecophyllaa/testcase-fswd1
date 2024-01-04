@extends('layouts.admin')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">

        <!-- card -->
        <div class="card">
          <h5 class="card-header">Data Karyawan</h5>
          <!-- table wrapper -->
          <div class="table-responsive text-nowrap px-3 pb-3">
            <!-- btn tambah -->
            <a href="{{ route('admin.karyawan.create') }}" class="btn btn-primary mb-4">
              <span class="tf-icons bx bx-plus"></span>&nbsp; Tambah
            </a>
            <!-- / btn tambah -->

            <table class="table table-hover" id="dataTable">
              <thead>
                <tr class="text-nowrap">
                  <th>No</th>
                  <th>Nomor Induk</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Tanggal Lahir</th>
                  <th>Tanggal Bergabung</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $karyawan)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $karyawan->nomor_induk }}</td>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->alamat }}</td>
                    <td>{{ $karyawan->tgl_lahir->format('d-M-y') }}</td>
                    <td>{{ $karyawan->tgl_bergabung->format('d-M-y') }}</td>
                    <td>
                      <a href="{{ route('admin.karyawan.edit', $karyawan) }}" class="btn btn-warning px-2 py-1">
                        <i class="bx bxs-edit"></i>
                      </a><!-- / edit -->

                      <button type="button" class="btn btn-danger px-2 py-1" data-bs-toggle="modal" data-bs-target="#delete-modal-{{ $karyawan->id }}">
                        <i class="bx bxs-trash"></i>
                      </button><!-- / delete -->

                      <!-- delete modal wrapper -->
                      <div class="modal fade" id="delete-modal-{{ $karyawan->id }}" tabindex="-1" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel2">Delete Confirmation</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div><!-- / modal header -->
                            <div class="modal-body">
                              <div class="row">
                                <div class="col">
                                  <p>Data karyawan <strong>{{ $karyawan->nomor_induk }}</strong> akan dihapus?</p>
                                </div>
                              </div>
                            </div><!-- / modal body -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cancel
                              </button>
                              <button type="button" class="btn btn-danger"
                                onclick="event.preventDefault();document.getElementById('delete-form-{{ $karyawan->id }}').submit();">
                                Delete
                                <form action="{{ route('admin.karyawan.destroy', $karyawan->id) }}" method="POST"
                                  id="delete-form-{{ $karyawan->id }}" style="display: none;">
                                  @csrf @method('DELETE')
                                </form>
                              </button>
                            </div><!-- / modal footer -->
                          </div><!-- / modal content -->
                        </div>
                      </div><!-- / modal wrapper -->
                    </td>
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
