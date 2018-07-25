<?php 
    $this->load->view('template/header2');
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
            <div class="alert-warning"><?php echo (isset($message))? : "";?></div>
            <div class="table-responsive">
            <div class="alert-warning"><?php echo (isset($message))? : "";?></div>
<!-- <?php //echo form_open('admin/tambah_driver', array('enctype'=>'multipart/form-data')); ?> -->
<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('admin/tambah_driver', array('class' => 'needs-validation', 'novalidate' => '') ); ?>

    <table border="0px">
             <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_username" value="<?php echo set_value('input_username'); ?>"required>
                <div class="invalid-feedback">wajib isi nama </div></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_alamat" value="<?php echo set_value('input_alamat'); ?>"required>
                <div class="invalid-feedback">wajib isi alamat </div></td>
            </tr>
            <tr>
                <td>No Telpon</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_no_telp" value="<?php echo set_value('input_no_telp'); ?>"required>
                <div class="invalid-feedback">isi nomor HP </div></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_email" value="<?php echo set_value('input_email'); ?>"required>
                <div class="invalid-feedback">masukan Email </div></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td><input type="number" class="form-control" name="input_umur" value="<?php echo set_value('input_umur'); ?>"required>
                <div class="invalid-feedback">isi umur </div></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>
                    <select name="input_gender" class="form-control" required>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Price/Day</td>
                <td>:</td><br>
                <td><input type="text" class="form-control" name="input_price" value="<?php echo set_value('input_price'); ?>"required>
                <div class="invalid-feedback">isi harga</div></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td>:</td>
                <td><input type="file" name="input_gambar"></td>
            </tr>
            <td colspan="3" align="center">
                <input type="submit" name="simpan" value="Add" id="submitBtn">
                <input type="reset" name="reset" value="Cancel">
            </td>
        </table>
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