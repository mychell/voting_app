<?php
	$this->load->view('inc/header');
?>

	<h1>2012 Pumpkin Vote</h1>
	<pre>
	<?php //print_r($data);?>
	</pre>
	
	<?php
    	foreach($data as $row){
    	
    	   $count = count($row);
        	$i = 1;
        	echo '<div class="row-fluid">';
        	echo '<h2>'.$row[0].'-'.$count.'</h2>';
        	
        	while($i < $count){
        	   
        	   $entry = $row[$i];
        	   
        	   foreach($entry as $entry_data){
        	       echo '<div class="span3">';
            	   echo '<h3>'.$entry_data->entry_title.'</h3>';
            	   echo '<img src="/uploads/'.$entry_data->file_name.'"/>';
            	   echo '</div>';
               }
        	   
               $i++;
        	}
        	
        	echo '</div>';
        	
    	}
	?>
<?php
	$this->load->view('inc/footer');
?>