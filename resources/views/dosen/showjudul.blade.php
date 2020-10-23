<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>KELOMPOK 2 - Aplikasi Pengajuan Judul TA</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="{{ asset('assets/img/brand/favicon.png') }}" type="image/png"> -->
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
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <!-- <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{ asset('assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
        </a>
      </div> -->
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" href="{{route('Dosen.home')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('judul.index')}}">
              <i class="ni ni-single-02 text-green"></i>
                <span class="nav-link-text">Pembuatan judul</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="examples/register.html">
                <i class="ni ni-chat-round text-pink"></i>
                <span class="nav-link-text">Lihat Grup Bimbingan</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/keluar">
              <i class="fas fa-sign-out-alt text-pink"></i>
                <span class="nav-link-text">Logout</span>
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
                    <div class="card-header">Revisi Judul Bimbingan TA</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-group">
                                            <div><strong>TA Oleh</strong></div>
                                          <div>{{ $data->mahasiswa->nama }} <br>
                                        <small>{{ $data->mahasiswa->nim }}</small></div>
                                    </div>
                                    <div class="form-group">
                                            <div><strong>Judul</strong></div>
                                          <div>@if ($data->judul != null)
                                            {{ $data->judul }}
                                          @else
                                          Belum Ada judul
                                          @endif
                                        </div>
                                        
                                    </div>
                                    <a href="{{route('judul.updatess', [$id] )}}"  type="button" class="btn btn-primary"><i class="fa fa-check" aria-hidden="true"></i> Acc Judul
                                    <a href="" data-toggle="modal" data-target="#exampleModal" type="button" class="btn btn-warning"><i class="fa fa-cogs" aria-hidden="true"></i> Revisi
                                    </a>
    
                                </div>
                            </div>
                        </div>
                    </div>
                   
            </div>
    {{-- Modal --}}
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Masukan Catatan Revisi Anda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        {{--  --}}
        <form action="{{route('judul.updates', [$id])}}" method="POST">
          @csrf
      {{-- Judul Webinar --}}
      <div class="form-group">
          <label class="bmd-label-floating" for="catatan_dosen">Apa yang harus direvisi?</label>
          <div class="input-group">
              <textarea type="text" class="form-control" name="catatan_dosen" placeholder="Tulis Komentar di sini" aria-label="catatan_dosen" aria-describedby="catatan_dosen"></textarea>
            </div>
        
      </div>
      {{-- Submit --}}
     
  
      
      
        {{--  --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
  </form>
      </div>
      
      </div>
  
    {{-- TT Modal TT --}}
        </div>
    </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        @include('include.footer')
      </footer>
    </div>
  </div>
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