<?php	
	if(isset($_GET['work'])) {
		$workId = $_GET['work'];
	}
	$emotions = null;
	if(isset($_GET['emotions'])) {
		$emotions = $_GET['emotions'];
	}
	if(isset($_GET['exclude_category'])) {
		$exclude_category = $_GET['exclude_category'];
	}	
?>
<div class="row work-content">
	<div class="columns hide-for-small-only medium-3 large-2">
		<?php	
			$work = get_work($workId);
			echo '<img src="';
			echo bloginfo('template_directory');
			echo '/';
			echo $work->wrk_img;
			echo '"">';
			echo '<h6><strong>';
			echo $work->wrk_name;
			echo '</strong></h6>';
			echo '<h6>';
			echo $work->wrk_author;
			echo '</h6>';			
			if(!empty($exclude_category)) {
				echo '<button ';
				echo 'id="btn-list">Tout voir';
				echo '</button>';
			} 
			echo '<button ';
			echo 'id="btn-enter">Réagir';
			echo '</button>';
			if(isset($_GET['profile'])) {
				echo '<button id="btn-quit">Quitter</button>';	
			}
		?>		
	</div>
	<div class="columns small-12 medium-9 large-10">
		<?php	
			$emotionsList = null;
			if(!empty($emotions)) {
				$emotionsList = explode('_', $emotions);
			}
			$feedbacks = list_feedbacks($workId, $emotionsList, $exclude_category);
			foreach($feedbacks as $feedback) {
				echo '<div class="comments_box comments_';
				echo $feedback->cat_id;
				echo '">';
				if(!empty($feedback->comments)) {
					echo '<p><cite>';
					echo $feedback->comments;
					echo '</cite></p>';
				}
				echo '<p style="text-align: right">';

				$images = list_feedback_emotions($feedback->feedback_id);
				foreach($images as $image) {
					echo '<img class="img-icon small-icon" src="';
					echo bloginfo('template_directory');
					echo '/';
					echo $image->emo_img;
					echo '">';
				}
				echo '<br/>';
				echo $feedback->firstname;
				echo ' ( ';
				echo $feedback->cat_value;
				echo ' ) ';
				echo '</p>';
				echo '</div>';
			}
		?>
	</div>
</div>