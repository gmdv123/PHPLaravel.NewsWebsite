<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link ">
      <span class=" font-weight-light  text-primary d-flex justify-content-center">yhoccotruyen.edu.vn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-1 pb-1 mb-1">
        <div class="info">
          <a href="#" class="d-block">Xin chào {{ Auth::User()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{ route('admin.theloai.danhsach') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tin tức
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.tintuc.danhsach') }}" class="nav-link">
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.tintuc.them') }}" class="nav-link">
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Loại tin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.loaitin.danhsach') }}" class="nav-link">
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.loaitin.them') }}" class="nav-link">
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Thể loại
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.theloai.danhsach') }}" class="nav-link">
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.theloai.them') }}" class="nav-link">
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-images"></i>
              <p>
                Slide
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.slide.danhsach') }}" class="nav-link">
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.slide.them') }}" class="nav-link">
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.danhsach') }}" class="nav-link">
                  <p>Danh sách</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.them') }}" class="nav-link">
                  <p>Thêm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('adminlogout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                Đăng xuất
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://yhoccotruyen.edu.vn">yhoccotruyen</a>.</strong>
    All rights reserved.
</body>
</html>
