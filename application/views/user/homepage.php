<head>
    <title>home page</title>
    <?php $this->load->view('header/userheader'); ?>
    <br>
</head>
<body>
    
    <div class="container">

        <div class="row">
        <?php foreach ($barang as $data ) { ?>
            <div class="col-sm-2">
                <div class="thumbnail">
                    <tr>
                        <td>
                            <img src="<?php echo base_url().'assets/upload/barang/' .$data->foto ?>" class="card-img-top" style = "width: 100" >
                        </td>
                    </tr>
                    <div class="caption">
                        <h6><?php echo $data->nama_barang ?></h6>
                        <p class="card-title"><?php echo $data->jenis_barang ?></p>
                        <p class="card-title"><?php echo $data->stok ?></p>
                        <p class="card-title"><?php echo $data->harga ?></p>
                        <p>
                            <?= anchor('welcome/cart/' .$data->id_barang, 'buy', [
                                'class' => 'btn btn-primary',
                                'role'  => 'button'
                            ]) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php } ?>    
        </div>

    </div>
</body>