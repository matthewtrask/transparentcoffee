<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

  <!-- Site meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $data['title'].' | '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
  <meta name="ROBOTS" content="Index, Follow">
  <link rel="author" href="humans.txt" />
  <link rel="stylesheet" type="text/css" href="/bower_components/foundation/css/foundation.css">
  <script src="/bower_components/modernizr/modernizr.js"></script>

  <!-- CSS -->
  <?php
  helpers\assets::css(array(
    //'//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
      '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
      "h//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css",
      helpers\url::template_path() . 'css/admin.css',
  ))
  ?>
  <link rel="stylesheet" type="text/css" href="/bower_components/slick-1.5.0/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="/bower_components/slick-1.5.0/slick/slick-theme.css"/>

  <!-- JS -->
  <?php
  helpers\assets::js(array(
      helpers\url::template_path() . 'js/jquery.js',
      helpers\url::template_path() . '//cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js',
      helpers\url::template_path() . 'js/main.js'
  ))
  ?>

</head>
<body>

<div class="fixed">
  <nav class="top-bar nav" data-topbar role="navigation" id="nav">
    <ul class="title-area">
      <li class="name"><!-- Leave this empty --></li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
      <section class="top-bar-section">
        <ul>
          <li class="show-for-small-only"><a href="home"><i class="fa fa-home"></i></a></li>
          <li><a href="<?php echo DIR;?>home">Home</a></li>
          <li><a href="<?php echo DIR;?>cats">Categories</a></li>
          <li><a href="<?php echo DIR;?>posts">Posts</a></li>
          <li><a href="<?php echo DIR;?>users">Users</a></li>
        </ul>

        <ul>
          <li><a href="<?php echo DIR;?>admin/logout">Logout</a></li>
        </ul>
    </section>
  </nav>
</div>
