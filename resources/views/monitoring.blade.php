<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <title>WEB MONITORING MISBA</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="{{ ('jquery/jquery.min.js') }}" ></script>



    <!-- Proses -->
    {{-- <script type="text/javascript">
      $(document).ready(function(){
        setInterval(function() {
          $("#ph").load("{{ url('bacaph')}}");
          $("#turbi").load("{{ url('bacaturbi')}}");
          $("#hasil").load("{{ url('status')}}");
        }, 1000);
        });
    </script> --}}



  </head>
  <body class="hold-transition layout-top-nav">
      <div class="wrapper">
        <nav class="main-header navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
          <div class="container-fluid">
             <a href="#" class="navbar-brand">
              <img src="/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
             </a>
              <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse"><div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="/"><h4><strong>Home</strong></h4></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link " aria-current="page" href="/data"><h4><strong>Data</strong></h4></a>
                    </li>
                </ul>
              <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>
      <div class="container" style="text-align: center; margin-top: 100px; ">
       
         <h2><strong>Sistem Monitoring Kualitas Air Laut</strong></h2>
        <h2><strong>Untuk Ekosistem Terumbu Karang</strong></h2>
        <br>
      
          <!-- Tabel -->
            <div class="container text-center">
              <div class="row align-items-start">
                <div class="col">
                  <div class="card">
                    <h3 class="card-header" style="background-color: #e3f2fd; color: black;"><strong>Hasil pH</strong></h3>
                    <div class="card-body" >
                      <div style="font-size: 70px; weight: bold;" >
                        <span id="ph">{{$data_sensor->ph}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div class="card">
                    <h3 class="card-header" style="background-color: #e3f2fd; color: black;"><strong>Hasil Kekeruhan</strong></h3>
                    <div class="card-body" >
                      <div style="font-size: 70px; weight: bold;" >
                        <span id="turbi">{{$data_sensor->turbi}}</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <br>
              <div class="container text-center">
                      <div class="row align-items-start">
                        <div class="col">
                          <div class="card">
                            <h3 class="card-header" style="background-color: #e3f2fd; color: black;"><strong>HASIL</strong></h3>
                            <div class="card-body">
                              <div style="font-size: 70px; weight: bold;" >
                                <span id="hasil"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
              </div>
            
              <!-- Tabel end -->
              <br>
        <!-- Main Footer -->
    <footer class="main-footer">

      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 <a href="#">MisiBahari</a>.</strong> All rights reserved.
      
    </footer>
  </body>
</html>
