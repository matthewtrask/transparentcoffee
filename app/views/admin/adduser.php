<div class="row users">
	<div class="small-12 medium-12 large-12 columns">

		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li><a href='<?php echo DIR;?>admin/users'>Users</a></li>
			<li>Add User</li>
		</ul>	

		<h4>Add User</h4>

		<?php echo \core\error::display($error); ?>

		<form action='' method='post'>

		<p>Username<br><input type="text" name="username" value="<?php if(isset($error)){ echo $_POST['username']; }?>"></p>
		<p>Password<br><input type="password" name="password" value=""></p>
		<p>Email<br><input type="text" name="email" value="<?php if(isset($error)){ echo $_POST['email']; }?>"></p>
		<p><input type="submit" name="submit" value="Add User" class="button"></p>

		</form>
	</div>
</div>