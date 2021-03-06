<?php 
    $this->load->view('template/header_edit');
?>

 <title>Data User</title>

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="<?=site_url('home_2');?>" class="waves-effect"><i class="fa fa-home m-r-10" aria-hidden="true"></i>Home</a>
                </li>
                <!-- <li>
                    <a href="<?=site_url('admin');?>" class="waves-effect"><i class="fa fa-clock-o m-r-10" aria-hidden="true"></i>Dashboard</a>
                </li>               
                <li>
                    <a href="<?=site_url('admin/tampil_admin');?>" class="waves-effect"><i class="fa fa-user-circle m-r-10" aria-hidden="true"></i>Admin</a>
                </li> -->
                <li>
                    <a href="<?=site_url('admin/tampil_user');?>" class="waves-effect"><i class="fa fa-vcard-o m-r-10" aria-hidden="true"></i>Members</a>
                </li>
                <!-- <li>
                    <a href="<?=site_url('admin/tampil_car');?>" class="waves-effect"><i class="fa fa-car m-r-10" aria-hidden="true"></i>Cars</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/tampil_driver');?>" class="waves-effect"><i class="fa fa-group (alias) m-r-10" aria-hidden="true"></i>Drivers</a>
                </li>
                <li>
                    <a href="<?=site_url('admin/tampil_order');?>" class="waves-effect"><i class="fa fa-file-text-o m-r-10" aria-hidden="true"></i>Data Order</a>
                </li> -->
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
            <li class="breadcrumb-item active">User</li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">User Table</h4>
            <h6 class="card-subtitle">Add User<code>.table</code></h6>
            <div class="table-responsive">
              <div class="alert-warning"><?php echo (isset($message))? : "";?></div>
<?php echo validation_errors(); ?>
<?php $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<form class="needs-validation" novalidate>
    <table border="0px">
             <tr>
                <td class="control-label">Nama</td>
                <td>:</td>
                <td>
                <input type="text" class="form-control" name="nama" value="<?php echo set_value('nama', $tampil->nama); ?>"></td>
                <div class="invalid-feedback">Isi Nama</div>
                </td>
            </tr>
            <tr>
                <td class="control-label">Gender</td>
                <td>:</td><br>
                <td>
                <input type="text" class="form-control" name="gender" value="<?php echo set_value('gender', $tampil->gender); ?>" required></td>
                <div class="invalid-feedback">Isi Gender</div></td>
            </tr>
            <tr>
                <td class="control-label">Kode Pos</td>
                <td>:</td>
                <td>
                <input type="text" class="form-control" name="kodepos" value="<?php echo set_value('kodepos', $tampil->kodepos); ?>" required></td>
                <div class="invalid-feedback">Isi Kode Pos</div></td>
            </tr>
            <tr>
                <td class="control-label">Email</td>
                <td>:</td><br>
                <td>
                <input type="text" class="form-control" name="email" value="<?php echo set_value('email', $tampil->email); ?>" required></td>
                <div class="invalid-feedback">Isi Email</div></td>
            </tr>
            <tr>
                <td class="control-label">No Telpon</td>
                <td>:</td><br>
                <td>
                <input type="text" class="form-control" name="no_telp" value="<?php echo set_value('no_telp', $tampil->no_telp); ?>" required></td>
                <div class="invalid-feedback">Isi No Telpon</div></td>
            </tr>
            <tr>
                <td class="control-label">Username</td>
                <td>:</td><br>
                <td>
                <input type="text" class="form-control" name="username" value="<?php echo set_value('username', $tampil->username); ?>" required></td>
                <div class="invalid-feedback">Isi Username</div></td>
            </tr>
            <tr>
                <td class="control-label">Password</td>
                <td>:</td><br>
                <td>
                <input type="text" class="form-control" name="password" value="<?php echo set_value('password', $tampil->password); ?>" required></td>
                <div class="invalid-feedback">Isi Password</div></td>
            </tr>
            <tr>
                <td>Image</td>
                <td>:</td>
                <td><input type="file" name="input_gambar"></td>
            </tr>
            <td colspan="3" align="center">
                <input type="submit" name="simpan" value="Add">
                <input type="reset" name="reset" value="Cancel">
            </td>
</table>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    $this->load->view('template/footer_edit');
?>