<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data['title'].' | '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
  <meta name="ROBOTS" content="Index, Follow">
  <link rel="me" href="https://twitter.com/_TTCoffee">
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
  <META NAME="DESCRIPTION" CONTENT="Where specialty coffee consumers and direct trade roasters come together to share information and insights about the economic treatment of coffee producers.">
  <META NAME="KEYWORDS" CONTENT="coffee, Emory University, SE@G, transparent, trade, coffee, transparent trade coffee, farmers to 40, counter culture, intelligancia, roaster, coffee farm, coffee search, coffee farmer, coffee farmers">
  <META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
    <link rel="apple-touch-icon" sizes="57x57" href="favicons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="favicons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php if (isset($data['post'])) : ?>
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@_TTcoffee">
        <meta name="twitter:title" content="<?php echo $data['post'][0]->postTitle . " | Transparent Trade Coffee";?>">
        <meta name="twitter:creator" content="@_TTcoffee">
        <meta name="twitter:description" content="Where specialty coffee consumers and direct trade roasters come together to share information and insights about the economic treatment of coffee growers.">
        <meta name="twitter:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/app/uploads/blog/' . $data['post'][0]->postImg; ?>">

        <meta property="og:title" content="<?php echo $data['post'][0]->postTitle;?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/app/uploads/blog/' . $data['post'][0]->postImg; ?>" />
        <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
        <!--  <meta property="og:description" content="" />-->
    <?php endif; ?>
    <?php if(!isset($data['post'])) :?>
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="@_TTcoffee">
        <meta name="twitter:title" content="Transparent Trade Coffee">
        <meta name="twitter:creator" content="@_TTcoffee">
        <meta name="twitter:description" content="Where specialty coffee consumers and direct trade roasters come together to share information and insights about the economic treatment of coffee growers.">
        <meta name="twitter:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/app/templates/default/img/apple-touch-icon-180x180.png';?>">

        <meta property="og:title" content="Transparent Trade Coffee" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="Where specialty coffee consumers and direct trade roasters come together to share information and insights about the economic treatment of coffee growers."/>
        <meta property="og:image" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/app/templates/default/img/apple-touch-icon-180x180.png';?>" />
        <meta property="og:url" content="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <?php endif;?>
  <link rel="author" href="humans.txt" />
  <link rel="stylesheet" type="text/css" href="/bower_components/foundation/css/foundation.min.css">
    <!-- CSS -->
    <?php
    helpers\assets::css(array(
        //'//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
        helpers\url::template_path() . 'css/main.min.css',
        helpers\url::template_path() . 'css/jquery.nouislider.min.css'
    ))
    ?>
    <link rel="stylesheet" type="text/css" href="/bower_components/slick-1.5.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="/bower_components/slick-1.5.0/slick/slick-theme.css"/>


</head><?php
    if ($data['title'] == 'Transparent Coffees') {
        echo "<body>";
    }
    else {
        echo '<body class="overflow-body">';
    }
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-66863374-1', 'auto');
  ga('send', 'pageview');

</script>
<div class="fixed">
    <nav class="top-bar" data-topbar role="navigation" id="nav">
        <ul class="title-area">
            <li class="name"><!-- Leave this empty --></li>
            <li class="toggle-topbar menu-icon"><a href="home"><span><img id="header-logo-mobile" src="/apple-touch-icon-180x180.png"/></span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul>
                <li class="show-for-small-only"><a href="/home">HOME</a></li>
                <li class="has-dropdown">
                    <a class="dropdown-link" href="">ABOUT</a>
                    <ul id="nav-dropdown" class="dropdown">
                        <li><a href="/transparency">TRANSPARENCY</a></li>
                        <li><a href="/seg">SE@G</a></li>
                    </ul>
                </li>
                <li><a href="/transparentcoffees">TT COFFEES</a></li>
                <li><a href="/registrationinfo">REGISTER</a></li>
                <li id="li-header-logo"><a href="/home"><img id="header-logo" src="<?php echo helpers\url::template_path() .
                    'img/ttc-header-logo.png'?>"/></a></li>
                <li><a href="/insights">INSIGHTS</a></li>
                <li class="has-dropdown">
                    <a class="dropdown-link" href="/scrpi">SCRPI</a>
                    <ul id="nav-dropdown" class="dropdown">
                        <li class="hide-for-small-only"><a href="/scrpi">SCRPI</a></li>
                        <li><a href="/roasters">INDEXED ROASTERS</a></li>
                    </ul>
                </li>
                <li><a href="/contact">CONTACT</a></li>
            </ul>
        </section>
    </nav>
</div>

<div class="container">
