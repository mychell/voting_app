<?php
	$this->load->view('inc/admin_header');
?>

	<h1>New Entry</h1>
	<?php echo validation_errors(); ?>
	<?php echo $error;?>
	<?php print_r($error);?>
	
	<?php
	$attributes = array(
	   'id' => 'new-entry-form'
	);
	$title = array(
	   'name' => 'entry_title', 
	   'class' => 'span6', 
	   'value' => set_value('entry_title')
	);
	$contestant = array(
	   'name' => 'contestant', 
	   'class' => 'span6', 
	   'value' => set_value('contestant')
	);
    $file = array(
        'name' => 'userfile', 
        'class' => 'span12'
    );
					
	echo form_open_multipart('admin/entry/add', $attributes);
	echo form_label('Entry Title', 'entry_title');
	echo form_input($title);
	echo form_label("Contestant's Name", 'contestant');
	echo form_input($contestant);
	echo form_upload($file);
	
    foreach($categories as $category){
        echo form_label($category->cat_title, 'category[]');
        echo form_checkbox(array('name' => 'categories[]', 'value' => $category->id));
    }
	
	echo form_submit('submit', 'submit');
	echo form_close();
	?>

<?php
	$this->load->view('inc/footer');
?>