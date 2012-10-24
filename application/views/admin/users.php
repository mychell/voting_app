<?php
	$this->load->view('inc/admin_header');
?>

	<h1>User Upload</h1>
	<p>Upload a .csv file to enter new users</p>
	<?php echo validation_errors(); ?>
	<?php
    	if(isset($error)){
    	   echo '<div class="alert alert alert-error">';
    	   print_r($error['error']);
    	   echo '</div>';
    	}
	?>
	<?php
    	echo form_open_multipart('admin/users/add');
    	echo form_upload(array('name' => 'userfile'));
    	echo form_submit('submit', 'upload');
    	echo form_close();
	?>

<?php
	$this->load->view('inc/footer');
?>