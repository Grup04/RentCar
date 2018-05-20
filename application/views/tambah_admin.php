<?php 
    $this->load->view('template/header2');
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
                            <a href="../admin/tampil_admin" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Admin</a>
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
                                <h4 class="card-title">Admin Table</h4>
                                <h6 class="card-subtitle">Add Admin<code>.table</code></h6>
                                <div class="table-responsive">
                                <div class="alert-warning"><?php echo (isset($message))? : "";?></div>                                  
<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('admin/tambah_admin', array('class' => 'needs-validation', 'novalidate' => '') ); ?>
    <table border="0px">                    
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_username" value="<?php echo set_value('input_username'); ?>" required>
                <div class="invalid-feedback">isi username</div></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td><br>
                <td><input type="password" class="form-control" name="input_password" value="<?php echo set_value('input_password'); ?>" required><div class="invalid-feedback">masukan password</div></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_email" value="<?php echo set_value('input_email'); ?>"required><div class="invalid-feedback">masukan email </div></td>
            </tr>
            <tr>
                <td>No Telfon</td>
                <td>:</td><br>
                <td><input type="number" class="form-control" name="input_no_telp" value="<?php echo set_value('input_no_telp'); ?>"required><div class="invalid-feedback">isi no telpon </div></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td><br>
                <td><input type="text" class="form-control" name="input_alamat" value="<?php echo set_value('input_alamat'); ?>"required><div class="invalid-feedback">isi alamat </div></td>
            </tr>
            <td colspan="3" align="center">
                <input type="submit" name="simpan" value="Add" id="submitBtn">
                <input type="reset" name="reset" value="Cancel">
            </td>
        </table>
        </font>
                                </div>

                                </font>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php 
    $this->load->view('template/footer2');
?>