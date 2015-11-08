<?php
get_header(); ?>

<div id="main-content" class="main-content row">	
	<?php 
		if(isset($_GET['action'])) {
			$action = $_GET['action'];
			if($action == "create-feedback") {
				include(TEMPLATEPATH . '/comments/create.php');	
			} else if ($action == "list") {
				include(TEMPLATEPATH . '/comments/list.php');	
			} else if ($action == "create-profile") {
				include(TEMPLATEPATH . '/profile/create.php');	
			} else if ($action == "qr") {
				include(TEMPLATEPATH . '/profile/qr.php');	
			} else if ($action == "log") {
				include(TEMPLATEPATH . '/profile/log.php');	
			} else {
				include(TEMPLATEPATH . '/debug.php');
			} 
		} else {
			include(TEMPLATEPATH . '/debug.php');
		}
	 ?>	
</div>

<?php
get_footer(); ?>
