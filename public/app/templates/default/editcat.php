<div class="row" id="editCat">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider">></span></li>
			<li><a href='<?php echo DIR;?>admin/cats'>Categories</a> <span class="divider">></span></li>
			<li>Edit Category</li>
		</ul>


		<?php echo \core\error::display($error);?>

		<form method='post' enctype='multipart/form-data'>

			<p>Title<br><input type='text' name='catTitle' value='<?php echo $data['row'][0]->catTitle;?>'></p>
			<p><input type='submit' name='submit' value='Submit'></p>
		</form>
	</div>
</div>
