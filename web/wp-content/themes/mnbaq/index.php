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
			} else if ($action == "create-profile" || $action == "qr") {
				include(TEMPLATEPATH . '/main.php');	
			} else if ($action == "log") {
				include(TEMPLATEPATH . '/profile/log.php');	
			} else {
				include(TEMPLATEPATH . '/list.php');
			} 
		} else {
			include(TEMPLATEPATH . '/main.php');
		}
	 ?>	
</div>

<?php
get_footer(); ?>
