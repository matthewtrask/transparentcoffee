<?php session_start();
use helpers\url;
use helpers\assets;
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
        <!---->
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

        <iframe id="form_target" name="form_target" style="display:none"></iframe>
        <form id="my_form" action="" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
            <textarea id="my_editor"></textarea>
            <input id="image" name="image" type="file" onchange="$('#my_form').submit();this.value='';">
        </form>
        <p><input id="submit" class="button" type='submit' name='submit' value='Submit'></p>


        <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
        <!--		<script>-->
        <!--			tinymce.init({-->
        <!--				selector: '#my_editor',-->
        <!--				plugins: [-->
        <!--					"advlist autolink lists link image charmap print preview anchor",-->
        <!--					"searchreplace visualblocks code fullscreen",-->
        <!--					"insertdatetime media table contextmenu paste imagetools"-->
        <!--				],-->
        <!--				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image imageupload",-->
        <!--				content_css: [-->
        <!--					'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',-->
        <!--					'//www.tinymce.com/css/codepen.min.css'-->
        <!--				],-->
        <!--				file_browser_callback: function(field_name, url, type, win) {-->
        <!--					if(type=='image') $('#edit input').click();-->
        <!--				},-->
        <!--				relative_urls: false-->
        <!--			});-->
        <!--		</script>-->
        <!--		<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>-->
        <script>
            tinymce.init({
                selector: '.edit',
                plugins: ["image"],
                file_browser_callback: function(field_name, url, type, win) {
                    if(type=='image') $('#my_form input#image').click();
                },
                relative_urls: false,
                images_upload_url: 'postAcceptor.php'

            });

            $('input#submit').on('click', function(){
                console.log('hello');
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
