<?php
	$this->load->view('inc/admin_header');
?>

	<h1>Entries</h1>
	<?php $data = $this->Entry_model->query_all_entries(); ?>

		<?php foreach($data as $entry){ ?>
			<div class="show-row">
				<h2><?php echo $entry->entry_title; ?></h2>
				<a href="/admin/entry/edit/<?php echo $entry->id; ?>">edit</a> | 
				<a href="/admin/entry/delete/<?php echo $entry->id; ?>">delete</a>
			</div>
		<?php } ?>

<?php
	$this->load->view('inc/footer');
?>