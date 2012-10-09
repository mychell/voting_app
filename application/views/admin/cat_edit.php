<?php
	$this->load->view('inc/header');
	
	$data = $this->Category_model->query_cat_by_id($id);
	
	foreach ($data as $row) {
        $title = $row->cat_title;
    }

?>

	<h1>Edit Category</h1>

	<?php echo validation_errors(); ?>
	
	<?php
	$attributes = array('id' => 'new-cat-form');
	
	$cat_title = array(
					'name' => 'cat_title',
					'class' => 'span6'
					);
					
	echo form_open('admin/cat/edit', $attributes);
	echo form_label('Category Title', 'cat_title');
	echo form_input($cat_title, $title);
	echo form_hidden('cat_id', $id);
	echo form_submit('submit', 'submit');
	echo form_close();
	?>

<?php
	$this->load->view('inc/footer');
?>