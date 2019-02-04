<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
        
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/owesome/css/fontawesome-all.min.css') ?>">
  <style type="text/css">
    .head{
      color: white;
    }
    .dropdown:hover>.dropdown-menu{
      display: inline-block;
    }
  </style>
</head>
<body>   
  
  <section class="head shadow-lg">
  <nav class="navbar navbar-dark bg-danger">
      <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">
        <img src="<?php echo base_url('assets/1 (3).png') ?>" width="40" style = " margin-right : 10px;" class="d-inline-block align-top" alt="">
        Jualan Yuk
      </a>



      <?php if($this->session->userdata('username')) : ?>

        
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <div class="dropdown">
          <li class="nav-item dropdown">
            <a class="head nav-link dropdown-toggle fas fa-list" role="button">       Gelap Om !</a>
            <div class="dropdown-menu shadow-lg">
              <a class="dropdown-item" href="<?php echo base_url('admin'); ?>">Barang</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('admin/keranjang'); ?>">keranjang</a>
               <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('admin/user'); ?>">Pengguna</a>
            </div>
          </li>
          </div>
        </li>
        
        <li class="nav-item">
          <a href="#" class="head nav-link fas fa-lock-open">
            <?php echo 'kamu adalah : ' .$this->session->userdata('nama_user'); ?>
            sebagai admin
          </a>
        </li>
        
        <li class="nav-item">
          <a class="head nav-link fas fa-user" href="<?php echo base_url('welcome/logout') ?>" tabindex="-1" aria-disabled="true">    Logout</a>
        </li>

      </ul> 

    <?php endif; ?>


  </nav>
  </section>




</body>
</html>