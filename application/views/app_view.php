<?php
	$this->load->view('inc/header');
?>
	<img src="http://image.exct.net/lib/ff5c137976/m/1/Halloween_Invite-2012.jpg"/>
	<!--<pre>
	<?php //print_r($data);?>
	</pre>-->
	
	<?php
	   echo form_open('/app/vote');
    	foreach($data as $row){
    	
    	   $count = count($row);
        	$i = 2;
        	echo '<div class="row-fluid">';
        	echo '<h2>' . $row[0] . '</h2>';
        	echo '<ul class="thumbnails">';
        	while($i < $count){
        	   
        	   $entry = $row[$i];
        	   
        	   foreach($entry as $entry_data){
        	   
        	       $file = explode('.', $entry_data->file_name);	   
        	       
        	       $thumb = $file[0] . '_thumb.' . $file[1];
        	       
        	       echo '<li class="span3">';
            	   echo '<a href="/uploads/' . $entry_data->file_name . '" class="entry-image"><img src="/uploads/' . $thumb . '"/></a>';
            	   echo '<h3>'.$entry_data->entry_title.'</h3>';
            	   echo form_radio(array('name' => $row[1] . '[]', 'value' => $entry_data->id));
            	   echo '</li>';
               }
        	   
               $i++;
               
        	}
        	echo '</ul>';
        	echo '</div>';
        	
    	}
    	echo form_submit(array('value' => 'submit'));
    	echo form_close();
	?>
<?php
	$this->load->view('inc/footer');
?>