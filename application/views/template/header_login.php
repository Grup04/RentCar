<?php if($this->session->flashdata('user_registered')): ?>
<?php echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('user_registered').'</div>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('login_failed')): ?>
<?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
<?php endif; ?>

<?php if($this->session->flashdata('user_loggedout')): ?>
<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
<?php endif; ?>

<?php if(!$this->session->userdata('logged_in')) : ?>
	<div class="btn-group" role="group" aria-label="Data baru">
       <?php echo anchor('home', 'Home', array('class' => 'btn btn-outline-light')); ?>
       <?php echo anchor('user/login', 'Login', array('class' => 'btn btn-outline-light')); ?>
   </div>
<?php endif; ?>

<?php if($this->session->userdata('logged_in')) : ?>
   <div class="btn-group" role="group" aria-label="Data baru">
       <?php echo anchor('user/login', 'Login', array('class' => 'btn btn-outline-light')); ?>
      <!--  <?php echo anchor('category/create', 'Kategori Baru', array('class' => 'btn btn-outline-light')); ?> -->
       <?php echo anchor('user/logout', 'Logout', array('class' => 'btn btn-outline-light')); ?>
   </div>
<?php endif; ?>