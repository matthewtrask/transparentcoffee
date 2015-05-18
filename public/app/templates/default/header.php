<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' | '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
	<link rel="stylesheet" type="text/css" href="/bower_components/foundation/css/foundation.css">

	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			//'//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
			helpers\url::template_path() . 'css/main.css',
		))
	?>

	<!-- JS -->
	<?php 
		helpers\assets::js(array(
			helpers\url::template_path() . 'jquery.js',
		))
	?>

</head>
<body>
<nav class="top-bar" data-top role="navigation" id="nav">
</nav>

<div class="container">
