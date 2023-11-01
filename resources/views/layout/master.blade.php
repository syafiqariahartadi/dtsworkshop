<!doctype html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
  </head>
  <body>
    <div class="main-wrapper">
      <div class="px-3 py-2 text-bg-dark">
        <div class="container-fluid">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <h3> Data Siswa </h3>
          </div> 
        </div>
      </div>
      <div class="main-content"> @yield('content') </div>
      <div class="container">
        <footer class="d-flex flex-wrap justify-content-betweenalign-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-muted">© 2023 RPL, Sepik</p>
        </footer>
      </div>
    </div>
  </body>
</html>