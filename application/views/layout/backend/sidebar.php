<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-success text-sm">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link navbar-success accent-success text-sm text-center">
      <span class="brand-text font-weight-light text-center">
        
        <img src="<?=base_url()?>assets/img/AdminLTELogo.png" alt="<?=base_name()?>" class="brand-image img-circle elevation-3"> Sistem Informasi Surat Menyurat
        <!-- <?=base_name()?> -->
        &nbsp;
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()."assets/img/m1avataaars.png";?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$this->userdata->nama?></a>
        </div>
      </div>
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
               <li class="nav-item">
            <a href="<?=base_url()?>admin/home" class="nav-link <?=(@$active == "home")?'active':''?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <?php if ($this->userdata->role == "admin"){ ?>
          <li class="nav-item">
            <a href="<?=base_url()?>admin/members" class="nav-link <?=(@$active == "members")?'active':''?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <?php } ?>
          
          <li class="nav-item">
            <a href="<?=base_url()?>admin/suratmasuk" class="nav-link <?=(@$active == "surat masuk")?'active':''?>">
              <i class="nav-icon fa fa-envelope"></i>
              <p>
                Surat Masuk
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url()?>admin/suratkeluar" class="nav-link <?=(@$active == "surat keluar")?'active':''?>">
              <i class="nav-icon fa fa-share"></i>
              <p>
                Surat Keluar
              </p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="<?=base_url()?>admin/members/edit/<?=$this->userdata->user_id?>" class="nav-link <?=(@$active == "profile")?'active':''?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="<?=base_url()?>auth/signout" class="nav-link text-danger">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>