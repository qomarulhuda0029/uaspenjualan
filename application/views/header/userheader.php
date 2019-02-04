<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
        
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/owesome/css/fontawesome-all.min.css') ?>">
  <style type="text/css">
    .head{
      color: white;
    }

  </style>
</head>
<body>   
  
  <section class="head">
  <nav class="navbar navbar-dark bg-danger">
      <a class="navbar-brand" href="<?php echo base_url('user'); ?>">
        <img src="<?php echo base_url('assets/1 (3).png') ?>" width="40" style = " margin-right : 10px;" class="d-inline-block align-top" alt="">
        Jualan Yuk
      </a>



      <?php if($this->session->userdata('username')) : ?>


      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="head nav-link active fas fa-home" href="<?php echo base_url('user/homepage'); ?>">
            Home
          </a>
          
        </li>
        <li class="nav-item">
          <a class="head nav-link fas fa-list" href="<?php echo base_url('user'); ?>">   Barang Ane</a>
        </li>
        <li class="nav-item">
          <a class="head nav-link fas fa-cart-arrow-down" href="<?php echo base_url('user/keranjang'); ?>"> keranjang : <?php $this->cart->total_items(); ?> item</a>
        </li>
        <li class="nav-item">
          <a href="#" class="head nav-link fas fa-lock-open">
            <?php echo 'kamu adalah : ' .$this->session->userdata('username'); ?>
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