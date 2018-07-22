<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/admin/images/favicon.png">
    <link href="../assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/admin/css/style.css" rel="stylesheet">
    <link href="../assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
</head>
<body>

<div class="table-responsive">
<div class="alert-warning"><?php echo (isset($message))? : "";?></div>

<?php echo form_open('user/register', array('class' => 'needs-validation', 'novalidate' => '')); ?>

<table border="0px">

<tr>
   <div class="form-group">
       <td><label>Nama Lengkap</label></td>
       <td>:</td>
       <td><input type="text" class="form-control" name="nama" placeholder="Nama Lengkap"></td>
   </div>
</tr>
<tr>
   <div class="form-group">
       <td><label>Gender</label></td>
       <td>:</td>
       <td><select name="gender" class="form-control" style="width: 250px;">
                  <option value="Perempuan">Perempuan</option>
                  <option value="Laki-laki">Laki-Laki</option>
              </select>
        </td>
   </div>
</tr>
<tr>
   <div class="form-group">
       <td><label>Kode Pos</label></td>
       <td>:</td>
       <td><input type="text" class="form-control" name="kodepos" placeholder="Kode Pos"></td>
   </div>
</tr>
<tr>
   <div class="form-group">
       <td><label>Email</label></td>
       <td>:</td>
       <td><input type="text" class="form-control" name="email" placeholder="Email"></td>
   </div>
</tr>
<tr>
   <div class="form-group">
       <td><label>No Telp</label></td>
       <td>:</td>
       <td><input type="text" class="form-control" name="no_telp" placeholder="No Telp"></td>
   </div>
</tr>
<tr>
   <div class="form-group">
       <td><label>Username</label>
       <td>:</td>
       <td><input type="text" class="form-control" name="username" placeholder="Username"></td>
   </div>
</tr>
<tr>
   <div class="form-group">
       <td><label>Password</label></td>
       <td>:</td>
       <td><input type="password" class="form-control" name="password" placeholder="Password"></td>
   </div>
</tr> 
 <tr>
    <td>Image</td>
    <td>:</td>
    <td><input type="file" name="input_gambar"></td>
</tr>
<tr>
  <td><label for="">Pilih Paket Membership</label></td>
  <td>:</td>
  <td>
        <input type="radio" name="membership" value="2">Gold member
        <input type="radio" name="membership" value="3">Silver member
 </td>
</tr>
    
        
<td colspan="3" align="right">  
   <br>
   <!-- <button type="submit" name="daftar" class="btn btn-primary btn-block">Daftar</button> -->
   <input type="submit" name="daftar" value="Register">
   <input type="reset" name="reset" value="Cancel">
</td>

</table>
</div>

<?php echo form_close(); ?>

<script src="../assets/admin/plugins/jquery/jquery.min.js"></script>
<script src="../assets/admin/plugins/bootstrap/js/tether.min.js"></script>
<script src="../assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/admin/js/jquery.slimscroll.js"></script>
<script src="../assets/admin/js/waves.js"></script>
<script src="../assets/admin/js/sidebarmenu.js"></script>
<script src="../assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
<script src="../assets/admin/js/custom.min.js"></script>
<script src="../assets/admin/plugins/flot/jquery.flot.js"></script>
<script src="../assets/admin/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
<script src="../assets/admin/js/flot-data.js"></script>
<script src="../assets/admin/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>