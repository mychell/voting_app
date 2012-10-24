<?php
	$this->load->view('inc/admin_header');
?>
	<h1>Voting Results</h1>

<?php foreach($data as $row){
    	
    	   $count = count($row);
        	$i = 2;
        	echo '<div class="row-fluid">';
        	echo '<h2>' . $row[0] . '</h2>';
        	echo '<table class="table table-striped table-bordered"><tbody>';
        	echo '<thead><tr><th>Entry Title</th><th>Votes</th></tr></thead>';
        	while($i < $count){
        	   
        	   $entry = $row[$i];
        	   echo '<tr>';
        	   echo '<td class="span2">'.$entry['entry'].'</td>';
        	   echo '<td class="span2">'.$entry['votes'].'</td>';
        	   echo '</tr>';
               $i++;
               
        	}
        	echo '</tbody>';
        	echo '</table>';
        	
    	}
?>
<?php
	$this->load->view('inc/footer');
?>