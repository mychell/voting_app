<?php
	$this->load->view('inc/header');
?>

<div id="container">
	<h1>New Entry</h1>
	<?php echo validation_errors(); ?>
	
	<?php
	$attributes = array('id' => 'new-entry-form');
	
	$title = array(
					'name' => 'title',
					'class' => 'span6'
					);
					
	echo form_open('admin/insertentry', $attributes);
	echo form_label('Entry Title', 'title');
	echo form_input($title);
	echo form_submit('submit', 'submit');
	echo form_close();
	?>

</div>

<?php
	$this->load->view('inc/footer');
?>