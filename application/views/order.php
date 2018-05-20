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
                                <a href="tampil_admin" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Admin</a>
                            </li>
                            <li>
                                <a href="tampil_user" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Users</a>
                            </li>
                            <li>
                                <a href="tampil_car" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Cars</a>
                            </li>
                            <li>
                                <a href="admin/tampil_driver" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Drivers</a>
                            </li>
                            <li>
                                <a href="admin/tampil_order" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Data Order</a>
                            </li>
                            <li>
                                <a href="<?=site_url('login/logout');?>" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Logout</a>
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
                        <!-- column -->
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
                                                    <th>Username</th>
                                                    <th>Jenis Mobil</th>
                                                    <th>Merk</th>
                                                    <th>Day</th>
                                                    <th>Price</th>
                                                    <th>Date Order</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                            <?php foreach ($tampil_order as $key): ?>
                                                    <tr>
                                                        <td><?php echo $key-> id_order; ?></td>
                                                        <td><?php echo $key-> username; ?></td>
                                                        <td><?php echo $key-> jenis_mobil; ?></td>
                                                        <td><?php echo $key-> merk; ?></td>
                                                        <td><?php echo $key-> day; ?></td>
                                                        <td><?php echo $key-> price; ?></td>
                                                        <td><?php echo $key-> date_order; ?></td>
                                                        <td>
                                                            <a href="../admin/ubah_order/<?=$key->id_order?>"><button type="button" class="btn btn-primary">Update</button></a>
                                                            <a href="../admin/hapus_order/<?=$key->id_order?>"><button type="button" class="btn btn-primary" name="delete">Delete</button></a></p>
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