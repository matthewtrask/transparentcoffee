<div class="row users">
	<div class="small-12 medium-12 large-12 columns">

		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li><a href='<?php echo DIR;?>admin/users'>Users</a></li>
			<li>Edit User</li>
		</ul>	

		<?php echo \core\error::display($error); ?>

		<h4>Edit User</h4>

		<form action='' method='post'>

		<p>Username<br><input type="text" name="username" value="<?php echo $data['row'][0]->username; ?>"></p>
		<p>Password<br><input type="password" name="password" value=""></p>
		<p>Email<br><input type="text" name="email" value="<?php echo $data['row'][0]->email;?>"></p>
		<p><input type="submit" name="submit" value="Update"></p>

		</form>
	</div>
</div>