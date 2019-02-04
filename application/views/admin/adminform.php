<?php $this->load->view('header/adminheader') ?>

<section>
	<br>
	<div class="container col-3 card shadow-lg" style="padding-left: 40px; padding-right: 40px;">
		<h4 style="text-align: center; padding-top: 20px; padding-bottom: 20px;"><?php echo $button ?> barang</h4>


	
		
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			<!-- <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" /> -->

			  
			    <input type="hidden" class="form-control" name="i" value="<?php echo $this->session->userdata('id_user'); ?>">  
			 


			  <div class="form-group">
			  	<label for="varchar">Nama barang <?php echo form_error('nama_barang') ?></label>
			    <input type="text" class="form-control" name="nama_barang" aria-describedby="nama_barang" placeholder="nama barang" value="<?php echo $nama_barang; ?>">  
			  </div>


			  <div class="form-group">
			  	<label for="varchar">jenis_barang <?php echo form_error('jenis_barang') ?></label>  
			    <input type="text" class="form-control" name="jenis_barang" placeholder="jenis barang" value="<?php echo $jenis_barang; ?>">
			  </div>

			  
			  <div class="form-group">
			  	<label for="int">stok <?php echo form_error('stok') ?></label>
			    <input type="number" class="form-control" name="stok" aria-describedby="stok" placeholder="stok" value="<?php echo $stok; ?>">  
			  </div>


			  <div class="form-group">
			  	<label for="varchar">Foto <?php echo form_error('foto') ?></label>
	            <input type="file" class="form-control" name="f"  placeholder="Foto" value="<?php echo $foto; ?>" />
			  </div>
			 
			  <div class="form-group">
			  	<label for="number">harga <?php echo form_error('harga') ?></label>			    
			    <input type="number" class="form-control" id="harga" name="harga" aria-describedby="harga" placeholder="harga" value="<?php echo $harga; ?>">  
			  </div>

			  <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>" /> 
			   

			  <br>
			  <div class="form-group tmbol" align="center">
				  	<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
		    		<a href="<?php echo site_url('admin') ?>" class="btn btn-default">Cancel</a>
			  </div>
			  <br>
		</form>
 		<!-- <?php print_r($this->session->userdata()); ?> -->
	</div>
</section>
</body>
</html>