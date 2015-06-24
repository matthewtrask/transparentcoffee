
<div class="row" id="cats">
	<div class="small-12 medium-12 large-12 columns">
		<h1>Categories</h1>
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>admin'>Admin</a> <span class="divider"></span></li>
			<li>Manage Categories</li>
		</ul>
		<p><a href='<?php echo DIR;?>addcat' class='button info'>Add Category</a></p>
		<table>
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
					<a href='".DIR."cats/edit/$row->catID'>Edit</a>
					<a href=\"javascript:delcat('$row->catID','$row->catTitle');\">Delete</a>
					</td>";
					echo "</tr>";
				}
			}
			?>
		</table>
	</div>
</div>
