<div class="row posts">		
	<div class="small-12 medium-12 large-12 columns">
		<h1>Posts</h1>

		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li>Manage Posts</li>
		</ul>	

		<?php echo \helpers\session::pull('message');?>

		<p><a href='<?php echo DIR;?>admin/posts/add' class='button'>Add Post</a></p>

		<table class='table table-striped table-hover table-bordered responsive'>
		<tr>
			<th>Title</th>
			<th>Category</th>
			<th>Date</th>
			<th>Action</th>
		</tr>
		<?php
		if($data['posts']){
			foreach($data['posts'] as $row){
				echo "<tr>";
				echo "<td>$row->postTitle</td>";
				echo "<td>$row->catTitle</td>";
				echo "<td>".date('jS M Y H:i:s', strtotime($row->postDate))."</td>";
				echo "<td>
				<a href='".DIR."admin/posts/edit/$row->postID'>Edit</a>
				<a href=\"javascript:delpost('$row->postID','$row->postTitle');\">Delete</a>
				</td>";
				echo "</tr>";
			}
		}
		?>
		</table>
	</div>

	<div class="row">
		<div class="small-10 columns">
			<?php echo $data['page_links']; ?>
		</div>
	</div>

</div>
