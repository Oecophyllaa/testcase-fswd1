@extends('layouts.admin')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-xl">

        <!-- card -->
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Update Data Karyawan</h5>
          </div>

          <div class="card-body">
            <!-- form -->
            <form action="{{ route('admin.karyawan.update', $karyawan) }}" method="POST">
              @csrf @method('PUT')

              <input type="hidden" name="karyawan_id" value="{{ $karyawan->id }}" />

              <div class="row mb-4">
                <div class="col-lg-6 col-12">
                  <label class="form-label" for="nomor_induk">Nomor Induk</label>
                  <input type="text" name="nomor_induk" id="nomor_induk" value="{{ old('nomor_induk', $karyawan->nomor_induk) }}" placeholder="-----"
                    class="form-control @error('nomor_induk') is-invalid @enderror" />
                  @error('nomor_induk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    <small>contoh: IP06001</small>
                  @enderror
                </div><!-- / nomor_induk -->

                <div class="col-lg-6 col-12">
                  <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir', $karyawan->tgl_lahir->format('Y-m-d')) }}"
                    class="form-control @error('tgl_lahir') is-invalid @enderror" />
                  @error('tgl_lahir')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div><!-- / tgl_lahir -->
              </div><!-- / row -->

              <div class="row mb-4">
                <div class="col-lg-6 col-12">
                  <label class="form-label" for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" value="{{ old('nama', $karyawan->nama) }}" placeholder="----&nbsp;----"
                    class="form-control @error('nama') is-invalid @enderror" />
                  @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div><!-- / nama -->

                <div class="col-lg-6 col-12">
                  <label class="form-label" for="tgl_bergabung">Tanggal Bergabung</label>
                  <input type="date" name="tgl_bergabung" id="tgl_bergabung"
                    value="{{ old('tgl_bergabung', $karyawan->tgl_bergabung->format('Y-m-d')) }}"
                    class="form-control @error('tgl_bergabung') is-invalid @enderror" />
                  @error('tgl_bergabung')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div><!-- / tgl_bergabung -->
              </div><!-- / row -->

              <div class="row mb-4">
                <div class="col-lg-6 col-12">
                  <label class="form-label" for="alamat">Alamat</label>
                  <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat', $karyawan->alamat) }}</textarea>
                  @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div><!-- / alamat -->
              </div><!-- / row -->

              <button type="submit" class="btn btn-primary">
                <span class="tf-icons bx bxs-save"></span>&nbsp; Update
              </button>
            </form><!-- / form -->
          </div>
        </div><!-- / card -->
      </div>
    </div>
  </div>
@endsection
