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



<header>
    <nav class="navbar navbar-dark bg-danger">
      <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">
        <img src="<?php echo base_url('assets/1 (3).png') ?>" width="40" style = " margin-right : 10px;" class="d-inline-block align-top" alt="">
        Jualan Yuk
      </a>



      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="head nav-link active fas fa-home" href="<?php echo base_url('user/home'); ?>">
            Home
          </a>

        <li class="nav-item">
          <a class="head nav-link fas fa-sign-in-alt" href="<?php echo base_url('welcome/index'); ?>">      login</a>
        </li>
        <li class="nav-item">
          <a class="head nav-link fas fa-user-plus" href="<?php echo base_url('home/usertambah'); ?>">      daftar</a>
        </li>
      
      </ul>
    </nav>
</header>



</html>