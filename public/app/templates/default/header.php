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
<nav class="top-bar" data-topbar role="navigation" id="nav">
    <ul class="title-area">
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
        <ul class="center">
            <li class="has-dropdown">
                <a href="#">ABOUT</a>
                <ul class="dropdown">
                    <li><a href="#">Transparency</a></li>
                    <li><a href="#">SE@G</a></li>
                </ul>
            </li>
            <li><a href="#">TT COFFEES</a></li>
            <li><a href="#">REGISTER</a></li>
            <!-- icon -->
            <li><a href="#">INSIGHTS</a></li>
            <li class="has-dropdown">
                <a href="#">SCRPI</a>
                <ul class="dropdown">
                    <li><a href="#">SCRPI</a></li>
                    <li><a href="#">Roasters</a></li>
                </ul>
            </li>
            <li><a href="#">Contact</a></li>
        </ul>
    </section>
</nav>

<div class="container">
