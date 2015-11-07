<?php
	$works = list_works();
	foreach ($works as $work) {
		echo '<div class="columns small-12 medium-6 large-4">';
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
		echo '</div>';
	}
?>