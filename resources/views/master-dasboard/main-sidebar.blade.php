<?php 
    $path  = request()->path();
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!--  class active belum di implementasi -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview {{ in_array(Request::path(), ['home','home2']) ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{$path == 'home' ? 'active' : '' }}"><a href="{{ url('home') }}"><i class="fa fa-circle-o"></i> Dashboard 0</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Dashboard 1</a></li>
          </ul>
        </li>
      
        <!-- Menu Navigation Team-->
        <li class="treeview {{ in_array(Request::path(), ['home','home2']) ? 'active' : '' }}">
          <a href="#">
            <i class="fa fa-list"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{$path == 'home' ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="fa fa-circle-o"></i> Products</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Product Order</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>