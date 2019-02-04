<?php $this->load->view('header/header') ?>

<section>
	<br>
	<div class="container col-3 card shadow-lg" style="padding-left: 40px; padding-right: 40px;">
		<h4 style="text-align: center; padding-top: 20px; padding-bottom: 20px;"><?php echo $button ?> user</h4>


	
		
			<form action="<?php echo $actiondaftar; ?>" method="post" enctype="multipart/form-data">
			<!-- <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" /> -->
			 

			<input type="hidden" name="group" value="<?php echo '2'; ?>" /> 

			  
				<div class="form-group">
			  	<label for="varchar">nama_user <?php echo form_error('nama_user') ?></label>
			    <input type="text" class="form-control" name="nama_user" placeholder="nama_user" value="<?php echo $nama_user; ?>">  
			  </div>
				<div class="form-group">
			  	<label for="varchar">alamat_user <?php echo form_error('alamat_user') ?></label>
			    <input type="text" class="form-control" name="alamat_user" placeholder="alamat_user" value="<?php echo $alamat_user; ?>">  
			  </div>
				<div class="form-group">
			  	<label for="varchar">no_hp <?php echo form_error('no_hp') ?></label>
			    <input type="text" class="form-control" name="no_hp" placeholder="no_hp" value="<?php echo $no_hp; ?>">  
			  </div>
				<div class="form-group">
			  	<label for="varchar">username <?php echo form_error('username') ?></label>
			    <input type="text" class="form-control" name="username" placeholder="username" value="<?php echo $username; ?>">  
			  </div>
				<div class="form-group">
			  	<label for="varchar">password <?php echo form_error('password') ?></label>
			    <input type="text" class="form-control" name="password" placeholder="password" value="<?php echo $password; ?>">  
			  </div>


			  <div class="form-group">
			  	<label for="varchar">Foto <?php echo form_error('foto') ?></label>
	            <input type="file" class="form-control" name="f"  placeholder="Foto" value="<?php echo $foto; ?>" />
			  </div>
			 
			  

			  <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" /> 
			   

			  <br>
			  <div class="form-group tmbol" align="center">
				  	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
		    		<a href="<?php echo site_url('admin/user') ?>" class="btn btn-default">Cancel</a>
			  </div>
			  <br>
		</form>
 		<!-- <?php print_r($this->session->userdata()); ?> -->
	</div>
</section>
</body>
</html>