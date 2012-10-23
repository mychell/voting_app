<?php
	$this->load->view('inc/header');
?>

	<h1>Admin Login</h1>
	<p>Enter the admin password to access the admin panel. (Hint: it's the new dev password that replaced A$$...)</p>
	<?php echo form_open('/admin/auth'); ?>
	<?php echo form_password(array('name'=>'password'));?>
	<?php echo form_submit(array('value' => 'submit')); ?>
	<?php echo form_close();?>

<?php
	$this->load->view('inc/footer');
?>