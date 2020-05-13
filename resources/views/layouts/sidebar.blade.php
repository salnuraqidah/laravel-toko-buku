<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
          <a href="index.html" class="site_title"><i class="fa fa-code"></i> <span>Code Book Store</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
         
          <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ Auth::user()->name }}</h2>
          </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
            <h3>General</h3>
            <ul class="nav side-menu">
              <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home </a>
               
              </li>
              @if (Auth::user()->roles == 'ADMIN')
              <li><a href="{{ url('/member') }}"><i class="fa fa-edit"></i> Manage Users</a>
              </li>
              <li><a href="{{ url('/categories') }}"><i class="fa fa-desktop"></i> Manage Categories</a>
               @endif 
              </li>
              <li><a href="{{ url('/books') }}"><i class="fa fa-table"></i>Books</a>
              </li>
              @if (Auth::user()->roles == 'ADMIN')
              <li><a href="{{ url('/orders') }}"><i class="fa fa-edit"></i> Manage Orders</a>
              </li>
              @endif
              <li><a href="{{ url('/kontak') }}"><i class="fa fa-clone"></i>Hubungi Kami</a>
              </li>
            </ul>
          </div>
          

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
          <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="FullScreen">
            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
      </div>
    </div>