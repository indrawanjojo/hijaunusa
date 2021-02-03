<style>
    .bg-gradient-primary {
        background-color: #1095be;
        background-image: linear-gradient(180deg,#3da939 10%,#1095be 100%);
        background-size: cover;
    }
</style>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>">
      <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">LOGO</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
      <a class="nav-link" href="<?php echo base_url() ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading active">
      Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Menu Components:</h6>
              <a class="collapse-item" href="<?php echo base_url('category') ?>">Categories</a>
              <a class="collapse-item" href="<?php echo base_url('category/sub_category') ?>">Sub Categories</a>
              <a class="collapse-item" href="<?php echo base_url('contact/setting') ?>">Contact Us</a>
          </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#data"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-database"></i>
          <span>Data</span>
      </a>
      <div id="data" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Data List:</h6>
              <a class="collapse-item" href="<?php echo base_url('data/visitor') ?>">Visitor</a>
              <a class="collapse-item" href="<?php echo base_url('data/subscribe') ?>">Subscriber</a>
          </div>
      </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading active">
      Master
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Home Screens:</h6>
              <a class="collapse-item" href="<?php echo base_url('home/banner') ?>">Banner</a>
              <a class="collapse-item" href="<?php echo base_url('home/ourService') ?>">Our Service</a>
              <a class="collapse-item" href="<?php echo base_url('product') ?>">Products</a>
          </div>
      </div>
  </li>

  <li class="nav-item active">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallery"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Gallery</span>
      </a>
      <div id="gallery" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Gallery Screens:</h6>
              <a class="collapse-item" href="<?php echo base_url('gallery/insert') ?>">Insert Data Gallery</a>
              <a class="collapse-item" href="<?php echo base_url('gallery') ?>">View Data Gallery</a>
          </div>
      </div>
  </li>



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->
  <div class="sidebar-card">
      <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
      <p class="text-center mb-2">Powered by<br> <strong>Grow Technology</strong> </p>
  </div>

</ul>
<!-- End of Sidebar -->
