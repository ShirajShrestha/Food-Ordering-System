
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory</title>

  @include('template.style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    @include('template.navbar')
    @include('template.sidebar')
    
    <div class="content-wrapper">
      <div class="content">
          <div class="container-fluid">
              @yield('content')
          </div>
      </div>
    </div>

    @include('template.footer')
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

  @include('template.script')
</body>
</html>
