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
                    <div class="card-header"><b>List Rancangan Judul Tugas Akhir</b></div>
                    {{--  --}}
                    @if (session('pesan'))
                    <h5 class="card-title">
                      <div class="alert alert-success" role="alert">
                        <i class="ni ni-like-2"></i> {{session('pesan')}}
                      </div>
                    </h5>
                 @endif
                    @if (session('pesans'))
                    <h5 class="card-title">
                      <div class="alert alert-warning" role="alert">
                        <i class="ni ni-like-2"></i> {{session('pesans')}}
                      </div>
                    </h5>
                 @endif
                @if (count($errors) > 0)
                  <div class="alert alert-danger">
                    Cek Kembali Input Anda !!
                  </div>
                @endif

                    <div class="card-body">
                    <div class="card-body">
                         <div class="card">
                          <!-- <a class="btn btn-primary" href = "/mahasiswa/tambah">Ajukan Judul</a> -->
                    <div class="table-responsive">
    <div>
    <table class="table align-items-center table-dark" style="text-align:center">
        <thead class="thead-dark">
            <tr>
              <!-- <th scope="col" class="sort" data-sort="nim">NIM</th> -->
              <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col" class="sort" data-sort="judul">Judul yang Diajukan</th>
                <th scope="col" class="sort" data-sort="dosbing">Dosen Pembimbing</th>
                <th scope="col" class="sort" data-sort="status">Pesan Dosen</th>
                <!-- <th scope="col">Users</th> -->
                <!-- <th scope="col" class="sort" data-sort="aksi">Aksi</th> -->
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            @forelse($rancangan as $rancangan)
            <tr>
              
              <td>
                {!!$rancangan->status_text!!}
              </td>
                <td class="budget">
                {{$rancangan->judul}}
                </td>
                <td>
                   @forelse ($rancangan->detail as $it)
                       <div>
                         {{$it->dosen->nama}}
                       </div>
                   @empty
                       <div>
                         Belum Ada
                       </div>
                   @endforelse
                </td>
                

                <td>
                  @if ($rancangan->catatan_dosen)
                          {{$rancangan->catatan_dosen}}
                          @else
                          Belum Ada Pesan
                          @endif
                </td>
                <td>
                    @if ($rancangan->status==2)
                    <a type="button" class="btn btn-primary btn-sm" href="{{route('detail',[$rancangan->id])}}">Detail</a>
                    @else
                    Tidak Tersedia
                    @endif
                </td>

            </tr>
            @empty
            <tr>
              <td colspan="5">Belum ada list judul TA</td>
            <tr>
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