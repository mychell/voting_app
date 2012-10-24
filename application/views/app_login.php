<?php
	$this->load->view('inc/header');
?>
	<img src="http://image.exct.net/lib/ff5c137976/m/1/Halloween_Invite-2012.jpg"/>
	<!--<pre>
	<?php //print_r($data);?>
	</pre>-->
	<p>To vote, please enter your GA email address</p>
	<?php
    	echo $message;
	    echo form_open('/app/auth');
	    echo form_label('Email Address', 'email');
	    echo form_input(array('name'=>'email'));
    	echo form_submit(array('value' => 'submit'));
    	echo form_close();
	?>
<?php
	$this->load->view('inc/footer');
?>