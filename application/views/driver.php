<?php 
    $this->load->view('template/header');
 ?>

 <title>Data Driver</title>

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="<?=site_url('home');?>" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                <li>
                    <a href="<?=site_url('admin');?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                </li>               
                <li>
                    <a href="<?=site_url('admin/tampil_admin');?>" class="waves-effect"><i class="fa fa-user-circle m-r-10" aria-hidden="true"></i>Admin</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/tampil_user');?>" class="waves-effect"><i class="fa fa-vcard-o m-r-10" aria-hidden="true"></i>Members</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/tampil_car');?>" class="waves-effect"><i class="fa fa-car m-r-10" aria-hidden="true"></i>Cars</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/tampil_driver');?>" class="waves-effect"><i class="fa fa-group (alias) m-r-10" aria-hidden="true"></i>Drivers</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/tampil_order');?>" class="waves-effect"><i class="fa fa-file-text-o m-r-10" aria-hidden="true"></i>Data Order</a>
                </li>
                <li>
                    <a href="<?=site_url('user/logout');?>" class="waves-effect"><i class="fa fa-ban m-r-10" aria-hidden="true"></i>Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<div class="page-wrapper">
<div class="container-fluid">
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Driver</li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">Driver Table</h4>
            <h6 class="card-subtitle">Add Driver<code>.table</code></h6>
            <a href="../admin/tambah_driver"><button type="button" class="btn btn-primary">Tambah Driver</button></a>
            <div class="table-responsive">
<table class="table" id="myTable">
    <thead>
        <tr>
            <th>ID Driver</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No Telpon</th>
            <th>Email</th>
            <th>Umur</th>
            <th>Gender</th>
            <th>Price/Day</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($tampil_driver as $key): ?>
            <tr>
                <td><?php echo $key-> id_driver; ?></td>
                <td><?php echo $key-> username; ?></td>
                <td><?php echo $key-> alamat; ?></td>
                <td><?php echo $key-> no_telp; ?></td>
                <td><?php echo $key-> email; ?></td>
                <td><?php echo $key-> umur; ?></td>
                <td><?php echo $key-> gender; ?></td>
                <td><?php echo $key-> price; ?></td>
                <td><img src="../assets/picture/<?php echo $key->foto;?>" width="50px" height="50px"></td>
                <td>
                    <a href="../admin/ubah_driver/<?=$key->id_driver?>"><button type="button" class="btn btn-primary">Update</button></a>
                    <a href="../admin/hapus_driver/<?=$key->id_driver?>"><button type="button" class="btn btn-primary" name="delete">Delete</button></a></p>
                </td>
            </tr>
        </tbody>
    <?php endforeach ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php 
    $this->load->view('template/footer');
?>