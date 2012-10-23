<?php
	$this->load->view('inc/admin_header');
?>

<?php $data = $this->Category_model->query_all_categories(); ?>

	<h1>Categories</h1>
		
		<?php foreach($data as $category){ ?>
			<div class="show-row">
				<h2><?php echo $category->cat_title; ?></h2>
				<a href="/admin/cat/edit/<?php echo $category->id; ?>">edit</a> | 
				<a href="/admin/cat/delete/<?php echo $category->id; ?>">delete</a>
			</div>
		<?php } ?>

<?php
	$this->load->view('inc/footer');
?>