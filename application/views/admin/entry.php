<?php
	$this->load->view('inc/header');
?>

<div id="container">
	<h1>Entry</h1>
	<?php $data = $this->Entry_model->query_all_entries(); ?>

		<?php foreach($data as $entry){ ?>
			<div class="show-row">
				<h2><?php echo $entry->entry_title; ?></h2>
				
			</div>
		<?php } ?>
</div>

<?php
	$this->load->view('inc/footer');
?>