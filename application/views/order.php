<?php 
    $this->load->view('template/header');
 ?>

 <title>Data Order</title>

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="../admin" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                </li>
                <li>
                    <a href="<?=site_url('home');?>" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                <li>
                    <a href="tampil_admin" class="waves-effect"><i class="fa fa-user-circle m-r-10" aria-hidden="true"></i>Admin</a>
                </li>
                <li>
                    <a href="tampil_user" class="waves-effect"><i class="fa fa-vcard-o m-r-10" aria-hidden="true"></i>Members</a>
                </li>
                <li>
                    <a href="tampil_car" class="waves-effect"><i class="fa fa-car m-r-10" aria-hidden="true"></i>Cars</a>
                </li>
                <li>
                    <a href="admin/tampil_driver" class="waves-effect"><i class="fa fa-group (alias) m-r-10" aria-hidden="true"></i>Drivers</a>
                </li>
                <li>
                    <a href="admin/tampil_order" class="waves-effect"><i class="fa fa-file-text-o m-r-10" aria-hidden="true"></i>Data Order</a>
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
            <li class="breadcrumb-item active">Admin</li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">Order Table</h4>
            <h6 class="card-subtitle">Add Driver<code>.table</code></h6>
            <div class="table-responsive">
<table class="table" id="myTable">
<thead>
    <tr>
        <th>ID Order</th>
        <th>Merk</th>
        <th>Day</th>
        <th>Price</th>
        <th>Date Order</th>
        <!-- <th>Foto</th> -->
        <th>Status</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
<?php foreach ($tampil_order as $key): ?>
    <tr>
        <td><?php echo $key-> id_order; ?></td>
        <td><?php echo $key-> merk; ?></td>
        <td><?php echo $key-> day; ?></td>
        <td><?php echo $key-> price; ?></td>
        <td><?php echo $key-> date_order; ?></td>
        <!-- <td><?php echo $key-> foto_bukti; ?></td> -->
        <td><?php echo $key-> status; ?></td>
        <td>
            <?php if ($key->status == "Terbayar") {?>
              <a href="<?php echo site_url('admin/antar/'.$key->id_order);?>"><button type="button" class="btn btn-success">Antar</button></a>
           <?php } else if ($key->status == "Antar") {?>
              <a href="<?php echo site_url('admin/selesai/'.$key->id_order);?>"><button type="button" class="btn btn-success">Selesai</button></a>
           <?php } else if ($key->status == "Selesai") {?>
                -
           <?php } ?>
        </td>
        
    </tr>
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