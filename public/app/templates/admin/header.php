<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
  <link rel="stylesheet" type="text/css" href="/bower_components/foundation/css/foundation.css">
	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			'//cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css',
      '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
			helpers\url::admin_template_path() . 'css/style.css',
		))
	?>
  <?php
  helpers\assets::js(array(
    helpers\url::admin_template_path() . 'js/jquery.js',
    helpers\url::admin_template_path() . "js/admin.js",
    '//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js',

  ))
  ?>

</head>
<body>

<div class="fixed">
  <nav class="top-bar" data-topbar role="navigation" id="adminNav">
    <ul class="title-area">
      <li class="name"><!-- Leave this empty --></li>
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
      <ul>
        <li class="show-for-small-only"><a href="home"><i class="fa fa-home"></i></a></li>
        <li><a href="/admin">Home</a></li>
        <li><a href="admin/posts">Posts</a></li>
        <li><a href="admin/cats">Categories</a></li>
        <li><a href="admin/users">Users</a></li>
        <li><a href="logout">Logout</a></li>
      </ul>
    </section>
  </nav>
</div>
<div class="container">