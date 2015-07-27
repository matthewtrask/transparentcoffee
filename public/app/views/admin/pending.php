<div class='container'>
		<div class='row fullWidth'>
			<div class='small-12 medium-12 large-12 columns'>
				<h2 id='pendingReg'>Pending Registration</h2>
				<form onsubmit="myFunction(); return false;" id="pendingForm">
					<table>
		 				<thead>
							<tr>
								<th>Approve</th>
								<th>First Name</th>
                                <th>Last Name</th>
								<th>Email</th>
								<th>Roaster Name</th>
                                <th>Roaster Website</th>
								<th>Roaster Description</th>
								<th>Roaster Logo</th>
								<th>Coffee Name</th>
								<th>Coffee Description</th>
								<th>Retail Price</th>
								<th>Currency</th>
								<th>Bag Size(in ounces)</th>
								<th>GPP</th>
                                <th>EGS</th>
								<th>Coffee Website</th>
								<th>Farm Name</th>
								<th>Farm Region</th>
								<th>Farm Country</th>
								<th>GPP Proof</th>
							</tr>
						</thead>
						<?php 
							foreach ($data['ttcPending'] as $ttcPending) {
								// foreach ($ttcoffee as $key => $ttcoffee){
								echo "<tbody>";
								echo "<tr>";
								echo "<td class='formRow'><input type='checkbox' name=".$ttcPending->coffee_id." class='approve'>";
								echo "<td class='formRow'>".$ttcPending->first_name."</td>";
                                echo "<td class='formRow'>".$ttcPending->last_name."</td>";
                                echo "<td class='formRow'>".$ttcPending->email."</td>";
								echo "<td class='formRow'>".$ttcPending->roaster_name."</td>";
                                echo "<td class='formRow'><a target='_blank' href=".$ttcPending->url."/>".$ttcPending->url."</a></td>";
                                echo "<td class='formRow'>".$ttcPending->roaster_description."</td>";
								echo "<td class='formRow'><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcPending->roaster_logo'/></td>";
								echo "<td class='formRow'>".$ttcPending->coffee_name."</td>";
								echo "<td class='formRow'>".$ttcPending->description."</td>";
								echo "<td class='formRow'>$".$ttcPending->retail_price."</td>";
								echo "<td class='formRow'>".$ttcPending->currency."</td>";
								echo "<td class='formRow'>".$ttcPending->bag_size."</td>";
								echo "<td class='formRow'>$".$ttcPending->gppp."</td>";
                                echo "<td class='formRow'>".round($ttcPending->egs, 1)."%</td>";
								echo "<td class='formRow'><a target='_blank' href=".$ttcPending->url."/>".$ttcPending->url."</a></td>";
								echo "<td class='formRow'>".$ttcPending->farm_name."</td>";
								echo "<td class='formRow'>".$ttcPending->farm_region."</td>";
								echo "<td class='formRow'>".$ttcPending->farm_country."</td>";
								echo "<td class='formRow'><a href='/gppProof?id=".$ttcPending->coffee_id."'>".explode('-',$ttcPending->file_name)[1]."</a></td>";
								echo "</tr>";
								echo "</tbody>";
								
							} 
						?>
					</table>
					<!-- <input id="submitButton" type="submit" value="Submit" class="button expand white-button"> -->
				<input id="pendingReg" type="submit" value="Approve" class="button success approve">
				<input id="rejected" type="submit" value="Rejected" class="button alert">
			</form><hr />
		</div>
	</div>
	<div class="small-12 medium-12 large-12 columns">
		<h2 id="current">Active Roasters</h2>
		<form onsubmit="activeFunction(); return false;">
			<table>
				<thead>
					<tr>
						<th>Archive</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Roaster Name</th>
						<th>Roaster Website</th>
						<th>Roaster Description</th>
						<th>Roaster Logo</th>
						<th>Coffee Name</th>
						<th>Coffee Description</th>
						<th>Retail Price</th>
						<th>Currency</th>
						<th>Bag Size(in ounces)</th>
						<th>GPP</th>
						<th>EGS</th>
						<th>Coffee Website</th>
						<th>Farm Name</th>
						<th>Farm Region</th>
						<th>Farm Country</th>
						<th>GPPP Proof</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data['ttcActive'] as $ttcActive) {
						echo "<tr>";
						echo "<td class='formRow'><input type='checkbox' name=".$ttcActive->coffee_id." class='archive'>";
						echo "<td class='formRow'>".$ttcActive->first_name."</td>";
						echo "<td class='formRow'>".$ttcActive->last_name."</td>";
						echo "<td class='formRow'>".$ttcActive->email."</td>";
						echo "<td class='formRow'>".$ttcActive->roaster_name;"</td>";
                        echo "<td class='formRow'><a target='_blank' href=".$ttcActive->url."/>Here</a></td>";
                        echo "<td class='formRow'>".$ttcActive->roaster_description."</td>";
						echo "<td class='formRow'><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcActive->roaster_logo'/></td>";
						echo "<td class='formRow'>".$ttcActive->coffee_name."</td>";
						echo "<td class='formRow'>".$ttcActive->description."</td>";
						echo "<td class='formRow'>".$ttcActive->retail_price."</td>";
						echo "<td class='formRow'>".$ttcActive->currency."</td>";
						echo "<td class='formRow'>".$ttcActive->bag_size."</td>";
						echo "<td class='formRow'>".$ttcActive->gppp."</td>";
						echo "<td class='formRow'>".round($ttcActive->egs, 1)."%</td>";
						echo "<td class='formRow'><a target='_blank' href=".$ttcActive->url."/>Here</a></td>";
						echo "<td class='formRow'>".$ttcActive->farm_name."</td>";
						echo "<td class='formRow'>".$ttcActive->farm_region."</td>";
						echo "<td class='formRow'>".$ttcActive->farm_country."</td>";
						echo "<td class='formRow'><a href='/gppProof?id=".$ttcActive->coffee_id."'>".explode('-',$ttcActive->file_name)[1]."</a></td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			<input id="archiveCoffee" type="submit" value="Archive" class="button success">
		</form><hr />
	</div>

	<div class="small-12 medium-12 large-12 columns">
		<h2 id="archive">Archived Registrations</h2>
		<form onsubmit="archiveFunction(); return false;">
			<table>
				<thead>
					<tr>
						<th>Unarchive</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Roaster Name</th>
						<th>Roaster Website</th>
						<th>Roaster Description</th>
						<th>Roaster Logo</th>
						<th>Coffee Name</th>
						<th>Coffee Description</th>
						<th>Retail Price</th>
						<th>Currency</th>
						<th>Bag Size(in ounces)</th>
						<th>GPP</th>
						<th>EGS</th>
						<th>Coffee Website</th>
						<th>Farm Name</th>
						<th>Farm Region</th>
						<th>Farm Country</th>
						<th>GPPP Proof</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($data['ttcArchive'] as $ttcArchive) {
						echo "<tr>";
						echo "<td class='formRow'><input type='checkbox' name=".$ttcArchive->coffee_id." class='active'>";
						echo "<td class='formRow'>".$ttcArchive->first_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->last_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->email."</td>";
						echo "<td class='formRow'>".$ttcArchive->roaster_name."</td>";
                        echo "<td class='formRow'><a target='_blank' href=".$ttcArchive->url."/>Here</a></td>";
                        echo "<td class='formRow'>".$ttcArchive->roaster_description."</td>";
						echo "<td class='formRow'><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcArchive->roaster_logo'/></td>";
						echo "<td class='formRow'>".$ttcArchive->coffee_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->coffee_description."</td>";
						echo "<td class='formRow'>".$ttcArchive->retail_price."</td>";
						echo "<td class='formRow'>".$ttcArchive->currency."</td>";
						echo "<td class='formRow'>".$ttcArchive->bag_size."</td>";
						echo "<td class='formRow'>".$ttcArchive->gppp."</td>";
						echo "<td class='formRow'>".round($ttcArchive->egs, 1)."%</td>";
						echo "<td class='formRow'><a target='_blank' href=".$ttcArchive->url."/>Here</a></td>";
						echo "<td class='formRow'>".$ttcArchive->farm_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->farm_region."</td>";
						echo "<td class='formRow'>".$ttcArchive->farm_country."</td>";
						echo "<td class='formRow'><a href='/gppProof?id=".$ttcArchive->coffee_id."'>".explode('-',$ttcArchive->file_name)[1]."</a></td>";

						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			<input id="activeCoffee" type="submit" value="Submit" class="button success">
		</form>
	</div>
</div>
<script>
    function myFunction() {
        //do stuff
    }
</script>






