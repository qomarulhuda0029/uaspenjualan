<?php $this->load->view('header/adminheader') ?>




<br>


<section class="container shadow-lg">
  <a href="<?php echo base_url('admin/usertambah') ?>">tambah</a>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">no</th>
      <th scope="col">id user</th>
      <th scope="col">group</th>
      <th scope="col">nama user</th>
      <th scope="col">alamat user</th>
      <th scope="col">no hp</th>
      <th scope="col">username</th>
      <th scope="col">password</th>
      <th scope="col">foto</th>
      <th scope="col">aksi</th>
    </tr>
  </thead>

  <tbody>


    <?php $no = 1; foreach ($user1 as $data ) { ?>
    <tr>
      
      <td width="80px"><?php echo $no++ ?></td>
      <td><?php echo $data->id_user ?></td>
      <td><?php echo $data->group ?></td>
      <td><?php echo $data->nama_user ?></td>
      <td><?php echo $data->alamat_user ?></td>
      <td><?php echo $data->no_hp ?></td>
      <td><?php echo $data->username ?></td>
      <td><?php echo $data->password ?></td>
      <td>
        <img src="<?php echo base_url().'assets/upload/user/' .$data->foto ?>" width ="50">
      </td>
      
      <td>

        <?php echo anchor(site_url('admin/userubah/' .$data->id_user), 'ubah'); 
          ?>
         |
        <?php echo anchor(site_url('admin/deleteuser/' .$data->id_user), 'havus','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
          ?>

      </td>
    </tr>
    <?php } ?>
    
  </tbody>




</table>
</section>