<?php
	$this->load->view('inc/header');
?>

	<h1>Entry</h1>
	<?php $data = $this->Entry_model->query_all_entries(); ?>

		<?php foreach($data as $entry){ ?>
			<div class="show-row">
				<h2><?php echo $entry->entry_title; ?></h2>
				
			</div>
		<?php } ?>

<?php
	$this->load->view('inc/footer');
?>