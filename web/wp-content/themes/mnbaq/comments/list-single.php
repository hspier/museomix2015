<?php	
	if(isset($_GET['work'])) {
		$workId = $_GET['work'];
	}
	if(isset($_GET['emotions'])) {
		$emotions = $_GET['emotions'];
	}
	if(isset($_GET['exclude_category'])) {
		$exclude_category = $_GET['exclude_category'];
	}	
?>
<div class="row">
	<div class="columns hide-for-small-only medium-3 large-2">
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
	<div class="columns small-12 medium-9 large-10">
		<?php	
			$feedbacks = list_feedbacks($workId, explode('_', $emotions), $exclude_category);
			foreach($feedbacks as $feedback) {
				echo '<div class="comments_box comments_';
				echo $feedback->cat_id;
				echo '">';
				echo '<p><cite>';
				echo $feedback->comments;
				echo '</cite></p>';
				echo '<h6 style="text-align: right">';
				echo $feedback->firstname;
				echo '</h6>';
				echo '</div>';
			}
		?>
	</div>
</div>