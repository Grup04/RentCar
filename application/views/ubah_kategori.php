<?php 
    $this->load->view('template/header_edit');
?>

 <title>Data Car</title>

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
                            <a href="../../admin/tampil_car" class="waves-effect"><i class="fa fa-user m-r-10" aria-hidden="true"></i>Cars</a>
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
                            <li class="breadcrumb-item active">Car</li>
                        </ol>
                    </div>
                </div>
<div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title">Edit Category Car Table</h4>
                                <h6 class="card-subtitle">Edit Car<code>.table</code></h6>
                                <div class="table-responsive">
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="alert-warning"><?php echo (isset($message))? : "";?></div>

<?php echo form_open("admin/ubah_kategori/".$tampil->id_cat, array('enctype'=>'multipart/form-data')); ?> 
<?php echo validation_errors(); ?>
<?php $this->form_validation->set_error_delimiters('<div class="alert alert-warning" role="alert">', '</div>');?>

            <table border="0px">
                <h1>Edit Kategori Baru</h1>
            <tr>
                <td>Kategori</td>
                <td>:</td>
                <td>
                    <input type="text" class="form-control" name="cat_mobil" value="<?php echo set_value('cat_mobil', $tampil->cat_mobil); ?>" size="30" required>
                </td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td>
                    <input type="text" class="form-control" name="description" value="<?php echo set_value('description', $tampil->description); ?>" size="30" required>
                </td>
            </tr>
            <td colspan="3" align="center">
                <input type="submit" name="simpan" value="Update">
                <input type="reset" name="reset" value="Reset">
            </td>
        </table>
</div>
</div>
</div>
</section>
</div>
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