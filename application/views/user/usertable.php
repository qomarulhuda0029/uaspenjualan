<?php $this->load->view('header/userheader') ?>




<br>


<section class="container shadow-lg">
  <a href="<?php echo base_url('user/usertambah') ?>">tambah</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">no</th>
      
      <th scope="col">nama barang</th>
      <th scope="col">jenis barang</th>
      <th scope="col">stok</th>
      <th scope="col">foto</th>
      <th scope="col">harga</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>

  <tbody>


    <?php $no = 1; foreach ($barang as $data ) { ?>
    <tr>
      
      <td width="80px"><?php echo $no++ ?></td>
      
      <td><?php echo $data->nama_barang ?></td>
      <td><?php echo $data->jenis_barang ?></td>
      <td><?php echo $data->stok ?></td>
      <td>
        <img src="<?php echo base_url().'assets/upload/barang/' .$data->foto ?>" width ="50">
      </td>
      <td><?php echo $data->harga ?></td>
      <td>

        <?php echo anchor(site_url('user/userubah/' .$data->id_barang), 'ubah'); 
          ?>
         |
        <?php echo anchor(site_url('user/delete/' .$data->id_barang), 'havus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
          ?>

      </td>
    </tr>
    <?php } ?>
    
  </tbody>




</table>
</section>