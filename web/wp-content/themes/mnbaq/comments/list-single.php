<?php
	$workId = $_GET['work'];
	$emotions = $_GET['emotions'];
	$exclude_category = $_GET['exclude_category'];	
?>
<div class="row">
	<div class="hide-for-small-only medium-3 large-2">
		<?php	
			$work = get_work($workId);
			echo '<img src="';
			echo bloginfo('template_directory');
			echo '/';
			echo $work->wrk_img;
			echo '"">';
			echo '<p><strong>';
			echo $work->wrk_name;
			echo '</strong></p>';
			echo '<p>';
			echo $work->wrk_author;
			echo '</p>';
		?>
	</div>
	<div class="small-12 medium-9 large-10">
		
	</div>
</div>