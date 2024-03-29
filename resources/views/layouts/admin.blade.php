<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Dashboard</title>

  @stack('before-style')
  @include('includes.admin.style')
  @stack('after-style')

  <!-- Helpers -->
  <script src="{{ asset('backend/vendor/js/helpers.js') }}"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="{{ asset('backend/js/config.js') }}"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Sidebar -->
      @include('includes.admin.sidebar')
      <!-- / Sidebar -->

      <!-- Layout container -->
      <div class="layout-page">

        <!-- Navbar -->
        @include('includes.admin.navbar')
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->
          @yield('content')
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                <script>
                  document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  @stack('before-script')
  @include('includes.admin.script')
  @stack('after-script')

  <!-- SweetAlert2 -->
  @if (Session::has('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        timer: 2500,
        timerProgressBar: true,
      })
    </script>
  @endif

  @if (Session::has('error'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        timer: 2500,
        timerProgressBar: true,
      })
    </script>
  @endif
</body>

</html>
