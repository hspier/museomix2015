<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/jsKeyboard.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" />
	<title>Générateur d'émotions</title>		
	<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body>

	<?php 
		error_reporting( error_reporting() & ~E_NOTICE )
	?>
	