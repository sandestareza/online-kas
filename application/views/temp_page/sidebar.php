<div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url('page/beranda');?>" class="site_title"><i class="fa fa-calculator"></i> <span>Buku Kas Online</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url('assets/img/'.$user['foto']);?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$user['nama'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?=base_url('page/beranda');?>"><i class="fa fa-home"></i> Menu</a>
                  <li><a href="<?=base_url('page/backup');?>"><i class="fa fa-gear"></i> Pengaturan</a>
                  </li><li><a href="<?=base_url('page/info');?>"><i class="fa fa-info"></i> Info Aplikasi</a>
                  </li>
                  <li><a href="<?=base_url('auth/logout');?>"><i class="fa fa-sign-out"></i> Logout</a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url('assets/img/'.$user['foto']);?>" alt=""><?=$user['nama'];?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="<?=base_url('page/profile');?>"><i class="fa fa-user pull-right"></i> My Profile</a>
                    <a class="dropdown-item"  href="<?=base_url('auth/logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->