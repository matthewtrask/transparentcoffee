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
  <META NAME="DESCRIPTION" CONTENT="Working within the Social Enterprise @ Goizueta, Transparent Trade Coffee aims to bring light to how roasters are paying for coffee. Through a rigorous check, only roasters who pay their farmers more then 20% of the price sold can be featured on the site.">
  <META NAME="KEYWORDS" CONTENT="coffee, Emory University, SE@G, transparent, trade, coffee, transparent trade coffee, farmers to 40, counter culture, intelligancia, roaster, coffee farm, coffee seach, ">
  <META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <?php if (isset($data['post'])) : ?>
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@_TTcoffee">
        <meta name="twitter:title" content="<?php echo $data['post'][0]->postTitle . " | Transparent Trade Coffee";?>">
        <meta name="twitter:creator" content="@_TTcoffee">
        <meta name="twitter:description" content="testing a description">
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
  <link rel="stylesheet" type="text/css" href="/bower_components/foundation/css/foundation.css">
  <script src="/bower_components/modernizr/modernizr.js"></script>
	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			//'//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
            '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
            "//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css",
			helpers\url::template_path() . 'css/main.css',
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
<!--<div id="fb-root"></div>-->
<!--<script>-->
<!--//    window.fbAsyncInit = function() {-->
<!--//        FB.init({-->
<!--//            appId      : '140567202947112',-->
<!--//            xfbml      : true,-->
<!--//            version    : 'v2.4'-->
<!--//        });-->
<!--//    };-->
<!---->
<!--    (function(d, s, id){-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id)) {return;}-->
<!--        js = d.createElement(s); js.id = id;-->
<!--        js.src = "//connect.facebook.net/en_US/sdk.js";-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));-->
<!--</script>-->
<!--<script>-->
<!--  window.twttr = (function(d, s, id) {-->
<!--  var js, fjs = d.getElementsByTagName(s)[0],-->
<!--    t = window.twttr || {};-->
<!--  if (d.getElementById(id)) return t;-->
<!--  js = d.createElement(s);-->
<!--  js.id = id;-->
<!--  js.src = "https://platform.twitter.com/widgets.js";-->
<!--  fjs.parentNode.insertBefore(js, fjs);-->
<!---->
<!--  t._e = [];-->
<!--  t.ready = function(f) {-->
<!--    t._e.push(f);-->
<!--  };-->
<!---->
<!--  return t;-->
<!--}(document, "script", "twitter-wjs"));-->
<!--//  </script>-->
<div class="fixed">
    <nav class="top-bar" data-topbar role="navigation" id="nav">
        <ul class="title-area">
            <li class="name"><!-- Leave this empty --></li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
        <section class="top-bar-section">
            <ul>
                <li class="show-for-small-only"><a href="home"><i class="fa fa-home"></i></a></li>
                <li class="has-dropdown">
                    <a class="dropdown-link" href="#">ABOUT</a>
                    <ul id="nav-dropdown" class="dropdown">
                        <li><a href="transparency">TRANSPARENCY</a></li>
                        <li><a href="seg">SE@G</a></li>
                    </ul>
                </li>
                <li><a href="transparentcoffees">TT COFFEES</a></li>
                <li><a href="registrationinfo">REGISTER</a></li>
                <li id="li-header-logo"><a href="home"><img id="header-logo" src="<?php echo helpers\url::template_path() .
                    'img/Transparent%20Trade%20White-08-09.png'?>"/></a></li>
                <li><a href="insights">INSIGHTS</a></li>
                <li class="has-dropdown">
                    <a class="dropdown-link" href="#">SCRPI</a>
                    <ul id="nav-dropdown" class="dropdown">
                        <li><a href="scrpi">SCRPI</a></li>
                        <li><a href="roasters">INDEXED ROASTERS</a></li>
                    </ul>
                </li>
                <li><a href="contact">CONTACT</a></li>
            </ul>
        </section>
    </nav>
</div>

<div class="container">
