<?php
	$this->load->view('inc/header');
?>

<?php $data = $this->Category_model->query_all_categories(); ?>

<div id="container">
	<h1>Categories</h1>
		
		<?php foreach($data as $category){ ?>
			<div class="show-row">
				<h2><?php echo $category->cat_title; ?></h2>
				<a href="edit/<?php echo $category->id; ?>">edit</a>
			</div>
		<?php } ?>
</div>

<?php
	$this->load->view('inc/footer');
?>