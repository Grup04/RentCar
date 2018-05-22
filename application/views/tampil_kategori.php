<?php 
    $this->load->view('template/header_cat');
?>

 <title>Data Category</title>

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a href="../admin" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="admin/tampil_admin" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Admin</a>
                        </li>
                        <li>
                            <a href="tampil_user" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Users</a>
                        </li>
                        <li>
                            <a href="../admin/tampil_car" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Cars</a>
                        </li>
                        <li>
                            <a href="tampil_driver" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Drivers</a>
                        </li>
                        <li>
                            <a href="tampil_order" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Data Order</a>
                        </li>
                        <li>
                            <a href="<?=site_url('login/logout');?>" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Logout</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Car</li>
                        </ol>
                    </div>
                </div>
<div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Car Category Table</h4>
                                <h6 class="card-subtitle">Add Car Category<code>.table</code></h6>
                                 <a href="../admin/tambah_kategori"><button type="button" class="btn btn-primary">Tambah Kategori Mobil</button></a>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID Car Category</th>
                                                <th>Category Car</th>
                                                <th>Description</th>
                                                <th>Date Created</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php foreach ($tampil_kategori as $key): ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $key-> id_cat; ?></td>
                                                <td><?php echo $key-> cat_mobil; ?></td>
                                                <td><?php echo $key-> description; ?></td>
                                                <td><?php echo $key-> date_created; ?></td>
                                                <td colspan="3" align="center">
                                                <a href="../admin/ubah_kategori/<?=$key->id_cat?>"><button type="button" class="btn btn-primary">Update</button></a>
                                                <a href="../admin/hapus_kategori/<?=$key->id_cat?>"><button type="button" class="btn btn-primary" name="delete">Delete</button></a></p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php endforeach ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php 
    $this->load->view('template/footer_cat');
?>