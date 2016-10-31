<?php session_start(); ?>
<div class="row posts">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li><a href='<?php echo DIR;?>admin/posts'>Posts</a></li>
			<li>Add Post</li>
		</ul>	

		<h4>Add New Post</h4>

		<?php echo \core\error::display($error);?>

		<form method='post' enctype='multipart/form-data'>

		<p>Title<br><input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
		<p>Description<br><textarea name='postDesc' rows='10' class='col-md-12'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>
		<p>Content<br><textarea name='postCont' rows='10' class='col-md-12'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p>Category<br>
			<select name='catID'>
				<option>Select</option>
				<?php if($data['cats']){
					foreach($data['cats'] as $crow){
						if($_POST['catID'] == $crow->catID){
							$sel = "selected='selected'";
						} else {
							$sel = null;
						}
						echo "<option value='$crow->catID' $sel>$crow->catTitle</option>";
					}
				}
				?>
			</select>
		</p>

		<p><input class="button" type='submit' name='submit' value='Submit'></p>
		</form>

		<script>
			$(document).ready(function() {
				$('textarea').summernote();
			});
		</script>