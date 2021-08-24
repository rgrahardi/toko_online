<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('master-dasboard.head')
  @yield('datatables')
</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  
  @include('master-dasboard.main-header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('master-dasboard.main-sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('master-dasboard.main-footer')


  <!-- Control Sidebar -->
  @include('master-dasboard.control-sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
  @include('master-dasboard.js')
  @yield('datatables2')
</body>
</html>
