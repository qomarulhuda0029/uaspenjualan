<?php $this->load->view('header/header') ?>

<section>
	<br>
	<div class="container col-3 card shadow-lg" style="padding-left: 40px; padding-right: 40px;">
		<h1 style="text-align: center; font-size: 40px; padding-top: 20px; padding-bottom: 20px;">LogIn Juluq</h1>

		<div>
			<?php echo validation_errors() ?>
		</div>
		<div><?php echo $this->session->flashdata('errors'); ?></div>
		
		<form action="<?=base_url('welcome/login'); ?>" method="post">
		  <div class="form-group">
		    <label for="username">Ape Username de ?</label>
		    <input type="text" class="form-control" id="username" name="username" aria-describedby="username" placeholder="Tamak Username Juluk">  
		  </div>

		  <div class="form-group">
		    <label for="password">Ape Password ?</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Tamak Password Endah">
		  </div>

		  <small class="form-text text-muted">Melem Bejual..? Tame juluk</small>
		  <small class="form-text text-muted">Ndeqman Bedoe Akun ? <a href="<?php echo base_url('users/create'); ?>">Piak Juluq</a></small>
		  <br>
		  <div class="form-group tmbol" align="center">
			  <button type="submit" id="masuk" class="tombol btn btn-primary"><i class="fas fa-sign-in-alt"></i> Tame</button>
		  </div>
		  <br>
		</form>
	</div>
</section>
</body>
</html>