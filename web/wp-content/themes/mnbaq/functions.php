<?php

function create_profile() {
	if ( isset( $_POST['inscription'] ) && '1' == $_POST['inscription'] ) {		
 		$GLOBALS['wpdb']->insert('mnbaq_profile', array( 
 			'PRF_FIRSTNAME' => $_POST['firstname'],  
 			'PRF_LASTNAME' => $_POST['lastname'],
 			'PRF_EMAIL' => $_POST['email'],
 			'CAT_ID' => $_POST['age']),
 		array( 
		'%s', 
		'%s', 
		'%s', 
		'%d' 
		) );
		$GLOBALS['wpdb']->insert('mnbaq_profile_event', array( 
 			'PRF_ID' => $_POST['firstname'],  
 			'EVT_ID' => 1),
 		array( 
		'%s', 
		'%d' 
		) );
  	} // end if

}

function list_emotions($workId) {
	$query = 'select e.emo_id, e.emo_value, e.emo_img from mnbaq_work_emotion we, mnbaq_emotion e where we.emo_id = e.emo_id and we.wrk_id = ' . $workId;
	return $GLOBALS['wpdb']->get_results($query);
}

function create_comments() {
	if ( isset( $_POST['comment'] ) && '1' == $_POST['comment'] ) {
		$profileId = $_GET['profile'];
		$workId = $_GET['work'];

 		$GLOBALS['wpdb']->insert('mnbaq_profile_feedback', array( 
 			'PRF_COMMENTS' => $_POST['firstname'],  
 			'PRF_AUDIO' => $_POST['lastname'],
 			'PRF_ID' => $profId),
 		array( 
		'%s', 
		'%s', 
		'%d' 
		) );
 		$feedbackId = $wpdb->insert_id;
 		$emotions = list_emotions($workId);
 		foreach($emotions as $emotion) {
 			$name = 'emotion_' . $emotion->$emo_id;
 			$value = $_POST[$name];
 			if($value) {
	 			$GLOBALS['wpdb']->insert('mnbaq_profile_feedback_emotion', array( 
	 			'PRF_FEEDBACK_ID' => $feedbackId,  
	 			'EMO_ID' => $emotion->$emo_id ),
		 		array( 
				'%d', 
				'%d'				
				) );
			}
 		}
 		
		
  	} // end if

}

function get_work($workId) {
	return $GLOBALS['wpdb']->get_row('select wrk_author, wrk_name, wrk_img from mnbaq_work where wrk_id = ' . $workId);
}

function list_categories() {
	return $GLOBALS['wpdb']->get_results('select cat_value, cat_id from mnbaq_category');
}

function list_feedbacks($workId, $emotions, $excludeCategoryId) {
	$query = 'select pf.prf_comments, pf.prf_audio, from mnbaq_profile_feedback pf, 
		mnbaq_profile_feedback_emotion pfe, mnbaq_category c, mnbaq_profile p where 
		p.prf_id = pf.prd_id and p.cat_id = c.cat_id and pf.prf_feedback_id = pfe.prf_feedback_id';
	if($workId) {
		$query = $query . ' and pf.wrk_id = ' . $workId;
	} 
	if($emotions) {
		$query = $query . ' and pfe.emo_id in (' . join(', ', $emotions) . ');';
	}
	if($excludeCategoryId) {
		$query = $query . ' and p.cat_id <> ' . $excludeCategoryId;
	}
		// where wrk_id =
	return $GLOBALS['wpdb']->get_results($query);	
}

function list_works() {
	return $GLOBALS['wpdb']->get_results('select wrk_id, wrk_img, wrk_name, wrk_author from mnbaq_work');
}

function list_active_profiles() {
	
}

add_action('init', 'create_profile');
add_action('init', 'create_comments');

?>