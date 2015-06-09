<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' | '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
	<link rel="stylesheet" type="text/css" href="/bower_components/foundation/css/foundation.css">
    <script src="/bower_components/modernizr/modernizr.js"></script>

	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			//'//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
            '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
			helpers\url::template_path() . 'css/main.css',
		))
	?>
    <link rel="stylesheet" type="text/css" href="/bower_components/slick-1.5.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/bower_components/slick-1.5.0/slick/slick-theme.css"/>

	<!-- JS -->
	<?php
		helpers\assets::js(array(
			helpers\url::template_path() . 'js/jquery.js',
			helpers\url::template_path() . 'js/main.js'
		))
	?>
</head>
<body>
<div class="fixed">
    <nav class="top-bar" data-topbar role="navigation" id="nav">
        <ul class="title-area">
            <li class="name"><!-- Leave this empty --></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul>
                <li class="has-dropdown">
                    <a class="dropdown-link" href="#">ABOUT</a>
                    <ul id="nav-dropdown" class="dropdown">
                        <li><a href="#">Transparency</a></li>
                        <li><a href="#">SE@G</a></li>
                    </ul>
                </li>
                <li><a href="#">TT COFFEES</a></li>
                <li><a href="#">REGISTER</a></li>
                <li id="li-header-logo"><a href="#"><img id="header-logo" src="<?php echo helpers\url::template_path() .
                    'img/Transparent%20Trade%20White-08-09.png'?>"/></a></li>
                <li><a href="#">INSIGHTS</a></li>
                <li class="has-dropdown">
                    <a class="dropdown-link" href="#">SCRPI</a>
                    <ul id="nav-dropdown" class="dropdown">
                        <li><a href="#">SCRPI</a></li>
                        <li><a href="#">Roasters</a></li>
                    </ul>
                </li>
                <li><a href="#">Contact</a></li>
            </ul>
        </section>
    </nav>
</div>

<div class="container">
