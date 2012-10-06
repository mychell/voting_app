<?php
	$this->load->view('inc/header');
?>

<div id="container">
	<h1>New Category</h1>
	<?php echo validation_errors(); ?>
	
	<?php
	$attributes = array('id' => 'new-cat-form');
	
	$cat_title = array(
					'name' => 'cat_title',
					'class' => 'span6'
					);
					
	echo form_open('admin/cat/add', $attributes);
	echo form_label('Category Title', 'cat_title');
	echo form_input($cat_title);
	echo form_submit('submit', 'submit');
	echo form_close();
	?>

</div>

<?php
	$this->load->view('inc/footer');
?>