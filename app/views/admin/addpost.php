<?php session_start();
use helpers\url;
use helpers\assets;
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link href="//cdn.quilljs.com/1.0.3/quill.snow.css" rel="stylesheet">
<link href="//cdn.quilljs.com/1.0.3/quill.bubble.css" rel="stylesheet">
<div class="row posts">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li><a href='<?php echo DIR;?>admin/posts'>Posts</a></li>
			<li>Add Post</li>
		</ul>	

		<h4>Add New Post</h4>

		<?php echo \core\error::display($error);?>


		<p>Title<br><input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
		<p>Description<br><textarea class="edit" name='postDesc' rows='2' class='medium-12'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>
		<p>Content<br><textarea class="edit" name='postCont' rows='10' class='col-md-12'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>
<!--
<!--		<p>Category<br>-->
<!--			<select name='catID'>-->
<!--				<option>Select</option>-->
<!--				--><?php //if($data['cats']){
//					foreach($data['cats'] as $crow){
//						if($_POST['catID'] == $crow->catID){
//							$sel = "selected='selected'";
//						} else {
//							$sel = null;
//						}
//						echo "<option value='$crow->catID' $sel>$crow->catTitle</option>";
//					}
//				}
//				?>
<!--			</select>-->
<!--		</p>-->
<!---->
<!--		<p><input class="button" type='submit' name='submit' value='Submit'></p>-->

<!--		<iframe id="form_target" name="form_target" style="display:none"></iframe>-->
<!--		<form id="my_form" action="" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">-->
<!--			<textarea id="my_editor"></textarea>-->
<!--			<input id="image" name="image" type="file" onchange="$('#my_form').submit();this.value='';">-->
<!--		</form>-->
<!--		<p><input id="submit" class="button" type='submit' name='submit' value='Submit'></p>-->

		<div id="toolbar">
			<!-- Add font size dropdown -->
			<select class="ql-size">
				<option value="small"></option>
				<!-- Note a missing, thus falsy value, is used to reset to default -->
				<option selected></option>
				<option value="large"></option>
				<option value="huge"></option>
			</select>
			<!-- Add a bold button -->
			<button class="ql-bold"></button>
			<!-- Add subscript and superscript buttons -->
			<button class="ql-script" value="sub"></button>
			<button class="ql-script" value="super"></button>
			<button class="ql-link" value="super"></button>
			<button class="ql-image" value="super"></button>
			<button class="ql-video" value="super"></button>
			<button class="ql-formula" value="super"></button>
		</div>
		<div id="editor"></div>


		<script src="//cdn.quilljs.com/1.0.3/quill.js" type="text/javascript"></script>
		<script src="//cdn.quilljs.com/1.0.3/quill.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			var quill = new Quill('#editor', {
				theme: 'snow',
				toolbar: '#toolbar'
			});

			var customButton = document.querySelector('#custom-button');
			customButton.addEventListener('click', function() {
				console.log('Clicked!');
			});
		</script>
			<!--		<script src="https://cdn.jsdelivr.net/g/nicedit@0.9r24(nicEdit.js+nicEdit.plugins.js)"></script>-->
<!--		<script type="text/javascript">bkLib.onDomLoaded( function() {-->
<!--				nicEditors.allTextAreas({-->
<!--				uploadURI : "/app/controllers/nicUpload.php";-->
<!--			});-->
<!--			});-->
<!---->
<!--		</script>-->
