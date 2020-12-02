<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>KELOMPOK 2 - Aplikasi Pengajuan Judul TA</title>
  <!-- Favicon -->
   <link rel="icon" href="{{ asset('assets/img/brand/unand.png') }}" type="image/png"> 
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}"
    type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0" type="text/css') }}">
  {{-- DataTables CSS --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
       <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="/mahasiswa">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{route('list')}}">
                <i class="ni ni-folder-17 text-yellow"></i>
                <span class="nav-link-text">Ajukan Ide</span>
            </a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="">
                <i class="ni ni-folder-17 text-yellow"></i>
                <span class="nav-link-text">Ajukan TA</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('mahasiswa.upload')}}">
                <i class="ni ni-cloud-upload-96 text-blue"></i>
                <span class="nav-link-text">Upload Surat Permohonan</span>
            </a>
            </li>
           
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          @include('include.navbar')
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                	<div class="card-header"><b>Input Ide Tugas Akhir</b></div>
                    
                    <div class="card-body">
                  <form action="{{route('storedos',[$id])}}" method="post">
                  {{csrf_field()}}
				          <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                  <label>Pilih Dosen Pembimbing II</label>
                <select class="form-control" name="dosen" id="dosen">
                @foreach ($dosen as $dos)
                <option value="{{$dos->id}}">{{$dos->nama}}</option>
                @endforeach
                </select> 
                  </div>
              </div>
          </div>


          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                <a class="btn btn-danger" href="{{route('list')}}">Cancel</a>
                <button type="submit" class="btn btn-primary">Next</button>
                  </div>
              </div>
          </div>

                </div>
            </div>
        </div>
    </div>
  </form>
      <!-- Footer -->
      <footer class="footer pt-0">
        @include('include.footer')
      </footer>
    </div>
  </div>

  <!-- Script -->
   <!--  -->
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
  {{-- DataTables JS --}}
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  @yield('scripts')
</body>

</html>