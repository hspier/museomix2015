<?php
	$works = list_works();
	foreach ($works as $work) {
		echo '<div class="columns small-12 medium-6 large-4">';
		echo '<a href="?action=list&work=';		
		echo $work->wrk_id;
		echo '">';
		echo '<img src="';
		echo bloginfo('template_directory');
		echo '/';
		echo $work->wrk_img;
		echo '"">';
		echo '</a>';
		echo '<p><strong>';
		echo $work->wrk_name;
		echo '</strong></p>';
		echo '<p>';
		echo $work->wrk_author;
		echo '</p>';
		echo '</div>';
	}
?>