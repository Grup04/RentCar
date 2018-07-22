<?php 
    $this->load->view('template/header');
?>

 <title>Data Admin</title>

        <aside class="left-sidebar">
            <div class="scroll-sidebar">
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
                            <a href="tampil_car" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Cars</a>
                        </li>
                        <li>
                            <a href="tampil_driver" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Drivers</a>
                        </li>
                        <li>
                            <a href="tampil_order" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Data Order</a>
                        </li>
                        <li>
                            <a href="<?=site_url('user/logout');?>" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Logout</a>
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
                                <h4 class="card-title">Admin Table</h4>
                                <h6 class="card-subtitle">Add Admin<code>.table</code></h6>
                                <a href="../admin/tambah_admin"><button type="button" class="btn btn-primary">Tambah Admin</button></a>
                                <div class="table-responsive">
                                    <table class="table" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>User ID</th>
                                                <th>Nama</th>
                                                <th>Gender</th>
                                                <th>Kode Pos</th>
                                                <th>Email</th>
                                                <th>No Telpon</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Register</th>
                                                <th>Level ID</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tampil as $key): ?>
                                                <tr>
                                                    <td><?php echo $key-> user_id; ?></td>
                                                    <td><?php echo $key-> nama; ?></td>
                                                    <td><?php echo $key-> gender; ?></td>
                                                    <td><?php echo $key-> kodepos; ?></td>
                                                    <td><?php echo $key-> email; ?></td>
                                                    <td><?php echo $key-> no_telp; ?></td>
                                                    <td><?php echo $key-> username; ?></td>
                                                    <td><?php echo $key-> password; ?></td>
                                                    <td><?php echo $key-> register_date; ?></td>
                                                    <td><?php echo $key-> level_id; ?></td>
                                                    <td><img src="../assets/picture/<?php echo $key->img;?>" width="50px" height="50px"></td>
                                                    <td>
                                                        <a href="../admin/ubah/<?=$key->user_id?>"><button type="button" class="btn btn-primary">Update</button></a>
                                                        <a href="../admin/hapus/<?=$key->user_id?>"><button type="button" class="btn btn-primary" name="delete">Delete</button></a></p>
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