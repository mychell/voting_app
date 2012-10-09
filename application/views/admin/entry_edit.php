<?php
	$this->load->view('inc/header');
?>

	<h1>New Entry</h1>
	<?php echo validation_errors(); ?>
	
	<?php
	$attributes = array('id' => 'new-entry-form');
	
	$title = array(
					'name' => 'entry_title',
					'class' => 'span6'
					);
					
	echo form_open('admin/entry/add', $attributes);
	echo form_label('Entry Title', 'entry_title');
	echo form_input($title);
	echo form_submit('submit', 'submit');
	echo form_close();
	?>

<?php
	$this->load->view('inc/footer');
?>