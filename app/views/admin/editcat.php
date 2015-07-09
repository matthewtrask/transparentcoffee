<div class="row cats">		
	<div class="small-12 medium-12 large-12 coumns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li><a href='<?php echo DIR;?>admin/cats'>Categories</a></li>
			<li>Edit Category</li>
		</ul>		

		<h1>Edit a category</h1>

		<?php echo \core\error::display($error);?>

		<form method='post' enctype='multipart/form-data'>

		<p>Title<br><input type='text' name='catTitle' value='<?php echo $data['row'][0]->catTitle;?>'></p>
		<p><input type='submit' name='submit' value='Submit' class='button'></p>
		</form>
	</div>
</div>