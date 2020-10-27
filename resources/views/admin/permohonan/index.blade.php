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
            <a class="nav-link" href="{{route('Admin.home')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
            </li>
            <li class="nav-item active">
            <a class="nav-link active" href="{{route('admin.permohonan')}}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Daftar Permohonan TA</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dosbing')}}">
                <i class="ni ni-single-02 text-pink"></i>
                <span class="nav-link-text">Pilih Dosen Pembimbing</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('admin.kelompok')}}">
                <i class="ni ni-circle-08 text-yellow"></i>
                <span class="nav-link-text">Kelompok Bimbingan</span>
            </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('keluar')}}">
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
                    <div class="card-header"><h3>Daftar Permohonan TA</h3></div>
                    

                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table align-items-center table-dark">
                            <thead class="thead-dark">
                            <tr>
                               
                                <th>No.</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Judul TA</th>
                                <th>Dosen Pembimbing</th>
                                <th>Detail</th>
                              </tr>
                            </thead>
                            <tbody>
                              
                            @forelse ($rancangan as $rc)
                            <tr>
                              <td>{{$loop->iteration}}</td>
                              <td>{{$rc->mahasiswa->nim}}</td>
                              <td>{{$rc->mahasiswa->nama}}</td>
                              <td>{{$rc->judul}}</td>
                              <td>
                                <ul>
                              @forelse($rc->detail as $dt)
                                    <li>{{$dt->dosen->nama}}</li>
                                </ul>
                              @empty  
                                <li>Belum Ada</li>
                              </td>
                              @endforelse
                              <td>
                                    <a href="{{ route('admin.permohonan.show', [$rc->id]) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="5">Tidak Ada Permohonan</td>
                          </tr>
                            @endforelse
                          
                            </tbody>
                        </table>
                    
                    </div>
                </div>
            </div>
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