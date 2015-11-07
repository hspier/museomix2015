<?php
	$work = $_GET['work'];
	if($work) {
		include(TEMPLATEPATH . '/comments/list-single.php');	
	} else {
		include(TEMPLATEPATH . '/comments/list-multiple.php');	
	}
?>