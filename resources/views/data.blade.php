<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
  <link rel="stylesheet" href="/public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/public/plugins/fontawesome-free/css/all.min.css">
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
              <div class="card-header">
                <h3 class="card-title">DATA MONITORING</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Sensor pH</th>
                    <th>Sensor Turbidity</th>
                    <th>Kesimpulan</th>
                    <th>Update_at</th>
                  </tr>
                  @foreach ($data as $k => $item)
                  <tr>

                      <td> {{$k+1}} </td>
                      <td> {{$item->ph}} </td>
                      <td> {{$item->turbi}} </td>
                      <td> {{$item->status}} </td>
                      <td> {{$item->updated_at}} </td>
                  </tr>
                  @endforeach
                  </thead>
                  <tbody>
                  <tr></tr>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
                </div>
              </div>
            </div> 
            <br>
              <!-- Tabel end -->
              <br>
        <!-- Main Footer -->
    <footer class="main-footer">

      <!-- Default to the left -->
      <strong>Copyright &copy; 2023 <a href="#">MisiBahari</a>.</strong> All rights reserved.
      
    </footer>

    <script src="/public/plugins/jquery/jquery.min.js"></script>
<script src="/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
<script src="/public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/public/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/public/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/public/plugins/jszip/jszip.min.js"></script>
<script src="/public/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/public/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/public/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/public/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/public/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
  </body>
</html>
