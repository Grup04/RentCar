<?php 
    $this->load->view('template/header2');
?>

 <title>Data Car</title>

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
            <li class="breadcrumb-item active">Car</li>
        </ol>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card">
        <div class="card-block">
            <h4 class="card-title">Car Table</h4>
            <h6 class="card-subtitle">Add Car<code>.table</code></h6>
            <div class="table-responsive">
            <div class="alert-warning"><?php echo (isset($message))? : "";?></div>
            
<?php echo validation_errors(); ?>
<?php echo form_open_multipart ('admin/tambah_car', array('class' => 'needs-validation', 'novalidate' => '') ); ?>

    <table border="0px">
             <tr>
                <td>No Polisi</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_no_polisi" value="<?php echo set_value('input_polisi'); ?>" required>
                <div class="invalid-feedback">isi nomer polisi</div></td>
            </tr>
            <tr>
                <td>Merk</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_merk" value="<?php echo set_value('input_merk'); ?>" required>
                <div class="invalid-feedback">isi merk</div></td>
            </tr>
            <tr>
                <td>Jenis Mobil</td>
                <td>:</td>
                <td>
                    <select name="id_cat" class="form-control">
                    <option value="">Pilih Jenis Mobil</option>
                    <?php foreach($categories as $category): ?>
                    <option value="<?php echo $category->id_cat; ?>"><?php echo $category->cat_mobil; ?></option>
                    <?php endforeach; ?>
                </select>
                </td>
            </tr>
            <!-- <tr>
                <td>Jenis Mobil</td>
                <td>:</td>
                <td>
                    <select name="input_jenis_mobil" style="width: 200px;">
                        <option value="Van">Van</option>
                        <option value="MiniBus">Mini Bus</option>
                        <option value="Family">Family</option>
                        <option value="MiniCar">Mini Car</option>
                    </select>
                </td> -->
                <!-- <td><input type="text" name="input_jenis_mobil" value="<?php echo set_value('input_jenis_mobil'); ?>"></td> -->
            <!-- </tr> -->
            <tr>
                <td>Warna Mobil</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_warna_mobil" value="<?php echo set_value('input_warna_mobil'); ?>"required>
                <div class="invalid-feedback">isi warna mobilnya</div></td>
            </tr>
            <tr>
                <td>Tahun Mobil</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="input_tahun_mobil" value="<?php echo set_value('input_tahun_mobil'); ?>" required>
                <div class="invalid-feedback">isi tahun mobil</div></td>
            </tr>
            <tr>
                <td>Bahan Bakar</td>
                <td>:</td><br>
                <td><input type="text" class="form-control" name="input_bahan_bakar" value="<?php echo set_value('input_bahan_bakar'); ?>"required>
                <div class="invalid-feedback">isi bahan bakar</div></td>
            </tr>
            <tr>
                <td>Price/Day</td>
                <td>:</td><br>
                <td><input type="text" class="form-control" name="input_price" value="<?php echo set_value('input_price'); ?>"required>
                <div class="invalid-feedback">isi Price/Day</div></td>
            </tr>
            <tr>
                <td>Image</td>
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