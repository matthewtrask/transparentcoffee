<div class="row cats">	
	<div class="small-12 medium-12 large-12 columns">
		<h1>Categories</h1>

		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a></li>
			<li>Manage Categories</li>
		</ul>	

		<?php echo \helpers\session::pull('message');?>

		<p><a href='<?php echo DIR;?>admin/cats/add' class='button'>Add Category</a></p>

		<table class='table table-striped table-hover table-bordered responsive'>
		<tr>
			<th>Title</th>
			<th>Action</th>
		</tr>
		<?php
		if($data['cats']){
			foreach($data['cats'] as $row){
				echo "<tr>";
				echo "<td>$row->catTitle</td>";
				echo "<td>
				<a href='".DIR."admin/cats/edit/$row->catID'>Edit</a>
				<a href=\"javascript:delcat('$row->catID','$row->catTitle');\">Delete</a>
				</td>";
				echo "</tr>";
			}
		}
		?>
		</table>
	</div>
</div>