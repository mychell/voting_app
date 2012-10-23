<?php
	$this->load->view('inc/admin_header');
?>
    <?php
        $data = $this->Entry_model->query_entries_by_id($id);
        /*echo '<pre>';
        print_r($data);
        echo '</pre>';*/
        
        foreach($data as $entry){
             $title = $entry->entry_title;
             $entry_cat_serial = $entry->categories;
        }
        $entry_cat = unserialize($entry_cat_serial);
    ?>

	<h1><?php echo $title; ?></h1>
	<?php echo validation_errors(); ?>
	
	<?php
	$attributes = array('id' => 'new-entry-form');
	
	$title = array(
					'name' => 'entry_title',
					'class' => 'span6',
					'value' => $title
					);
					
	echo form_open('admin/entry/update', $attributes);
	echo form_label('Entry Title', 'entry_title');
	echo form_input($title);
	foreach($categories as $category){
	   $checked = FALSE;
	   
	   if(in_array($category->id, $entry_cat)){
    	   $checked = TRUE;
	   }
        echo form_label($category->cat_title, 'category[]');
        echo form_checkbox(array('name' => 'categories[]', 'value' => $category->id, 'checked'=>$checked));
	}
	echo form_hidden('id', $id);
	echo form_submit('submit', 'update');
	echo form_close();
	?>

<?php
	$this->load->view('inc/footer');
?>