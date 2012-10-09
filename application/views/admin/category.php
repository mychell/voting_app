<?php
	$this->load->view('inc/header');
?>

<?php $data = $this->Category_model->query_all_categories(); ?>

	<h1>Categories</h1>
		
		<?php foreach($data as $category){ ?>
			<div class="show-row">
				<h2><?php echo $category->cat_title; ?></h2>
				<a href="/admin/cat/edit/<?php echo $category->id; ?>">edit</a>
			</div>
		<?php } ?>

<?php
	$this->load->view('inc/footer');
?>