<div class="row cats">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li><a href='<?php echo DIR;?>admin/cats'>Categories</a></li>
			<li>Add Category</li>
		</ul>	

		<h4>Add a category</h4>

		<?php echo \core\error::display($error);?>

		<form method='post' enctype='multipart/form-data'>
		<p>Title<br><input type='text' name='catTitle' value='<?php if(isset($error)){ echo $_POST['catTitle'];}?>'></p>
		<p><input type='submit' name='submit' value='Submit' class='button'></p>
		</form>
	</div>
</div>