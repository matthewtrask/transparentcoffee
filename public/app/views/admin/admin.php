
	<div class="row admin">		
		<div class="small-12 medium-12 large-12 columns">
			<?php use \helpers\form;?>

			<div class='row'>
				<div class='col-md-2'>
					<h1>Admin</h1>
					<ul>
						<li><a href='<?php echo DIR;?>admin/cats' class='button'>Categories</a></li>
						<li><a href='<?php echo DIR;?>admin/posts' class='button'>Posts</a></li>
						<li><a href='<?php echo DIR;?>admin/users' class='button'>Users</a></li> 
						<li><a href='<?php echo DIR;?>admin/pending' class="button">Coffees</a></li>
					</ul>
				</div>

			</div>
			<div class="row">
				<div class="col-md-2">
					<h4>Export to Excel</h4>
					<input type="checkbox" for="export"><label>Export To Excel</label>
					<p id='alertCSV' data-alert class="alert-box alert round"><em>As of right now, this is a total dump of the database. Later will be added date range functionality</em></p>
				</div>
				<div class="col-md-2">
					<h4>Number of registered companies</h4>
					<table>
						<thead>
							<th>Total</th>
							<th>Year To Date</th>
							<th>Last Month</th>
							<th>Pending</th>
							<th>Approved</th>
							<th>Rejected</th>
						</thead>
						<tbody>
							<tr>
								<td>12</td>
								<td>12</td>
								<td>5</td>
								<td>6</td>
								<td>5</td>
								<td>2</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>  

	
            