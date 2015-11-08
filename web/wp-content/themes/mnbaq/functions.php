<?php

function create_profile() {
	if ( isset( $_POST['inscription'] ) && '1' == $_POST['inscription'] ) {		
 		$GLOBALS['wpdb']->insert('mnbaq_profile', array( 
 			'PRF_FIRSTNAME' => $_POST['firstname'],   			
 			'PRF_EMAIL' => $_POST['email'],
 			'CAT_ID' => $_POST['age']),
 		array( 
		'%s', 
		'%s', 
		'%s', 
		'%d' 
		) );
		$profile = $GLOBALS['wpdb']->get_row('select max(prf_id) as prf_id from mnbaq_profile;');
		$profileId = $profile->prf_id;
		$GLOBALS['wpdb']->insert('mnbaq_profile_event', array( 
 			'PRF_ID' => $profileId,  
 			'EVT_ID' => 1,
 			'PRF_EVENT_DATE' => current_time('mysql')),
 		array( 
		'%d', 
		'%d',
		'%s'
		) );		
		$GLOBALS['wpdb']->update('mnbaq_profile', array(
				'PRF_AUTH_ID' => ($_POST['firstname'] . $profileId), 
			), array(
				'PRF_ID' => $profileId
			), array( 
				'%s' 
			), array( 
				'%d' 
			));
		wp_redirect('?action=qr&id=' . strtolower(($_POST['firstname'] . $profileId)));
		exit;
  	} // end if

}

function log_profile() {
	if ( isset( $_POST['login'] ) && '1' == $_POST['login'] ) {		
		$workId = $_GET['work'];
		$profile = $GLOBALS['wpdb']->get_row('select prf_id from mnbaq_profile where lower(prf_auth_id)  = \'' . strtolower($_POST['id']) . '\'');
		if(empty($profile)) {
			wp_redirect('?action=list&work=' . $workId);
		} else {			
			wp_redirect('?action=create-feedback&work=' . $workId . '&profile=' . $profile->prf_id);
			exit;
		}
	}
}

function get_userprofile($profileId) {
	return $GLOBALS['wpdb']->get_row('select prf_firstname, cat_id, prf_auth_id from mnbaq_profile where prf_id = ' . $profileId);	
}

function list_emotions($workId) {
	return $GLOBALS['wpdb']->get_results('select e.emo_id, e.emo_value, e.emo_img from mnbaq_work_emotion we, mnbaq_emotion e where we.emo_id = e.emo_id and we.wrk_id = ' . $workId);
}

function create_comments() {
	if ( isset( $_POST['comment'] ) && '1' == $_POST['comment'] ) {
		//$profileId = $_GET['profile'];
		$profileId = $_GET['profile'];
		$workId = $_GET['work'];

 		$GLOBALS['wpdb']->insert('mnbaq_profile_feedback', array( 
 			'PRF_COMMENTS' => $_POST['comments'],   			
 			'PRF_ID' => $profileId,
 			'WRK_ID' => $workId),
 		array( 
		'%s', 
		'%s', 
		'%d', 
		'%d'
		) );
 		$feedbackId = $GLOBALS['wpdb']->insert_id;
 		$emotions = list_emotions($workId);
 		$selectedEmotions = array();
 		foreach($emotions as $emotion) {
 			$name = 'emotion_' . $emotion->emo_id;
 			if(isset($_POST[$name])) {
	 			$value = $_POST[$name];
	 			if($value) {
		 			$GLOBALS['wpdb']->insert('mnbaq_profile_feedback_emotion', array( 
		 			'PRF_FEEDBACK_ID' => $feedbackId,  
		 			'EMO_ID' => $emotion->emo_id ),
			 		array( 
					'%d', 
					'%d'				
					) );
					array_push($selectedEmotions, $emotion->emo_id);
				}
			}
 		}
 		$profile = get_userprofile($profileId);
 		wp_redirect('?action=list&work=' .  $workId . '&emotions=' . join('_', $selectedEmotions) . '&exclude_category=' . $profile->cat_id . "&profile=" . $profileId);
		exit;		
  	} // end if

}

function get_work($workId) {
	return $GLOBALS['wpdb']->get_row('select wrk_author, wrk_name, wrk_img from mnbaq_work where wrk_id = ' . $workId);
}

function list_categories() {
	return $GLOBALS['wpdb']->get_results('select cat_value, cat_id from mnbaq_category');
}

function list_feedbacks($workId, $emotionsList, $excludeCategoryId) {
	if(isset( $_GET['profile'])) {
		$profileId = $_GET['profile'];
	}


	$query = 'select distinct pf.prf_feedback_id as feedback_id, pf.prf_comments as comments, pf.prf_audio as audio, p.prf_firstname as firstname, p.cat_id as cat_id, c.cat_value as cat_value ' .
	 	'from mnbaq_profile_feedback pf, ' .
		'mnbaq_profile_feedback_emotion pfe, mnbaq_category c, mnbaq_profile p where ' .
		'p.prf_id = pf.prf_id and p.cat_id = c.cat_id and pf.prf_feedback_id = pfe.prf_feedback_id';
	if($workId) {
		$query = $query . ' and pf.wrk_id = ' . $workId;
	} 
	if($emotionsList) {
		$query = $query . ' and pfe.emo_id in (' . join(', ', $emotionsList) . ')';
	}
	if($excludeCategoryId) {
		$query = $query . ' and p.cat_id <> ' . $excludeCategoryId;
	}
	if($profileId) {
		$query = $query . ' and p.prf_id <> ' . $profileId;	
	}
		// where wrk_id =
	return $GLOBALS['wpdb']->get_results($query);	
}

function list_feedback_emotions($feedbackId) {
	return $GLOBALS['wpdb']->get_results('select e.emo_img as emo_img from mnbaq_profile_feedback_emotion pfe, mnbaq_emotion e where pfe.emo_id = e.emo_id and pfe.prf_feedback_id = ' . $feedbackId);
}

function list_works() {
	return $GLOBALS['wpdb']->get_results('select wrk_id, wrk_img, wrk_name, wrk_author from mnbaq_work');
}

function list_active_profiles() {
	
}

add_action('init', 'create_profile');
add_action('init', 'create_comments');
add_action('init', 'log_profile');

?>