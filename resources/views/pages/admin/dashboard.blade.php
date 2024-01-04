@extends('layouts.admin')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-8 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-7">
              <div class="card-body">
                <h5 class="card-title text-primary">Selamat Datang, {{ Auth::user()->name }}! 👋</h5>
                <p class="mb-4">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, repellat?
                </p>

                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Profile</a>
              </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
              <div class="card-body pb-0 px-0 px-md-4">
                <img src="{{ asset('backend/img/illustrations/man-with-laptop-light.png') }}" height="140" alt="View Badge User"
                  data-app-dark-img="illustrations/man-with-laptop-dark.png"
                  data-app-light-img="{{ asset('backend/img/illustrations/man-with-laptop-light.png') }}" />
              </div>
            </div>
          </div>
        </div>
      </div><!-- / col -->
    </div><!-- / row -->

    <div class="row">
      <div class="col-md-6 col-lg-5 order-2 mb-4">
        <div class="card h-100">
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">First 3 Employees</h5>
          </div>
          <div class="card-body">
            <ul class="p-0 m-0">
              @foreach ($employees as $karyawan)
                <li class="d-flex mb-4 pb-1">
                  <div class="avatar flex-shrink-0 me-3">
                    <img src="{{ url('https://bootdey.com/img/Content/avatar/avatar6.png') }}" alt="User" class="rounded">
                  </div>
                  <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                    <div class="me-2">
                      <small class="text-muted d-block mb-1">{{ $karyawan->nomor_induk }}</small>
                      <h6 class="mb-0">{{ $karyawan->nama }}</h6>
                    </div>
                    <div class="user-progress d-flex align-items-center gap-1">
                      <h6 class="mb-0">{{ $karyawan->tgl_bergabung->format('d M Y') }}</h6>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      </div><!-- / col -->
    </div><!-- / row -->
  </div>
@endsection
