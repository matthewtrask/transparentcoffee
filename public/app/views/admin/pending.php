<div class='container'>
		<div class='row fullWidth'>
			<div class='small-12 medium-12 large-12 columns'>
				<h2 id='pendingReg'>Pending Coffees</h2>
				<form onsubmit="myFunction(); return false;" id="pendingForm">
					<table>
		 				<thead>
							<tr>
								<th>Approve</th>
								<th>Update</th>
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
								echo "<td class='formRow'><a href='' class='button tiny secondary update-btn' data-reveal-id='pending-view-".$ttcPending->coffee_id."' name='archive-".$ttcPending->coffee_id."'>>Update</a></td>";
								echo "<td class='formRow'>".$ttcPending->first_name."</td>";
                                echo "<td class='formRow'>".$ttcPending->last_name."</td>";
                                echo "<td class='formRow'>".$ttcPending->email."</td>";
								echo "<td class='formRow'>".$ttcPending->roaster_name."</td>";
                                echo "<td class='formRow'><a target='_blank' href=".$ttcPending->roaster_url."/>".$ttcPending->roaster_url."</a></td>";
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
		<h2 id="current">Active Coffees</h2>
		<form onsubmit="activeFunction(); return false;" id="archiveForm">
			<table>
				<thead>
					<tr>
						<th>Archive</th>
						<th>Update</th>
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
					foreach ($data['ttcActive'] as $ttcActive) :
						echo "<tr>";
						echo "<td class='formRow'><input type='checkbox' name=".$ttcActive->coffee_id." class='archive'>";
						echo "<td class='formRow'><a href='' class='button tiny secondary update-btn' data-reveal-id='active-view-".$ttcActive->coffee_id."' name='active-".$ttcActive->coffee_id."'>Update</a></td>";
						echo "<td class='formRow'>".$ttcActive->first_name."</td>";
						echo "<td class='formRow'>".$ttcActive->last_name."</td>";
						echo "<td class='formRow'>".$ttcActive->email."</td>";
						echo "<td class='formRow'>".$ttcActive->roaster_name;"</td>";
                        echo "<td class='formRow'><a target='_blank' href=".$ttcActive->roaster_url."/>$ttcActive->roaster_url</a></td>";
                        echo "<td class='formRow'>".$ttcActive->roaster_description."</td>";
						echo "<td class='formRow'><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcActive->roaster_logo'/></td>";
						echo "<td class='formRow'>".$ttcActive->coffee_name."</td>";
						echo "<td class='formRow'>".$ttcActive->description."</td>";
						echo "<td class='formRow'>".$ttcActive->retail_price."</td>";
						echo "<td class='formRow'>".$ttcActive->currency."</td>";
						echo "<td class='formRow'>".$ttcActive->bag_size."</td>";
						echo "<td class='formRow'>".$ttcActive->gppp."</td>";
						echo "<td class='formRow'>".round($ttcActive->egs, 1)."%</td>";
						echo "<td class='formRow'><a target='_blank' href=".$ttcActive->url."/>$ttcActive->url</a></td>";
						echo "<td class='formRow'>".$ttcActive->farm_name."</td>";
						echo "<td class='formRow'>".$ttcActive->farm_region."</td>";
						echo "<td class='formRow'>".$ttcActive->farm_country."</td>";
						echo "<td class='formRow'><a href='/gppProof?id=".$ttcActive->coffee_id."'>".explode('-',$ttcActive->file_name)[1]."</a></td>";
						echo "</tr>";
						?>

						<?php
					endforeach;
					?>
				</tbody>
			</table>
			<input id="archiveCoffee" type="submit" value="Archive" class="button success">
		</form><hr />
	</div>

	<div class="small-12 medium-12 large-12 columns">
		<h2 id="archive">Archived Coffees</h2>
		<form onsubmit="archiveFunction(); return false;" id="activeForm">
			<table>
				<thead>
					<tr>
						<th>Unarchive</th>
						<th>Update</th>
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
						echo "<td class='formRow'><a href='#' class='button tiny secondary update-btn' data-reveal-id='archive-view-".$ttcArchive->coffee_id."' name='archive-".$ttcArchive->coffee_id."'>Update</a></td>";
						echo "<td class='formRow'>".$ttcArchive->first_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->last_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->email."</td>";
						echo "<td class='formRow'>".$ttcArchive->roaster_name."</td>";
                        echo "<td class='formRow'><a target='_blank' href=".$ttcArchive->roaster_url."/>$ttcArchive->roaster_url</a></td>";
                        echo "<td class='formRow'>".$ttcArchive->roaster_description."</td>";
						echo "<td class='formRow'><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcArchive->roaster_logo'/></td>";
						echo "<td class='formRow'>".$ttcArchive->coffee_name."</td>";
						echo "<td class='formRow'>".$ttcArchive->description."</td>";
						echo "<td class='formRow'>".$ttcArchive->retail_price."</td>";
						echo "<td class='formRow'>".$ttcArchive->currency."</td>";
						echo "<td class='formRow'>".$ttcArchive->bag_size."</td>";
						echo "<td class='formRow'>".$ttcArchive->gppp."</td>";
						echo "<td class='formRow'>".round($ttcArchive->egs, 1)."%</td>";
						echo "<td class='formRow'><a target='_blank' href=".$ttcArchive->url."/>$ttcArchive->url</a></td>";
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
		<?php foreach($data['ttcPending'] as $ttcPending) : ?>
		<div id="pending-view-<?php echo $ttcPending->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<h2 id="modalTitle">Updating <?php echo $ttcPending->coffee_name?></h2>
					<div class="row">
						<div class="small-10 small-offset-1 small-centered columns light-font-smaller">
							<form id="pendingUpdateForm-<?php echo $ttcPending->coffee_id?>" action="/submitUpdate" method="POST" enctype="multipart/form-data">
								<input name="updateType" type="hidden" value="pending">
								<input name="coffeeId" type="hidden" value="<?php echo $ttcPending->coffee_id?>">
								<div class="row">
									<h3 class="sub-header">Contact</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="firstName" class="inline">Your First Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="firstName" class="regInput" type="text" value="<?php echo $ttcPending->first_name?>" for="firstName" id="firstName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="lastName" class="inline">Your Last Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="lastName" class="regInput" type="text" value="<?php echo $ttcPending->last_name?>" for="lastName" id="lastName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="submitEmail" class="inline">Your Email:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="submitEmail" class="regInput" type="text" value="<?php echo $ttcPending->email?>" for="submitEmail" id="submitEmail">
									</div>
								</div>
								<div class="row">
									<h3 class="sub-header">Roaster</h3>
									<div class="row">
										<div class="small-4 small-offset-4 columns">
											<a href="" class="button alert">Choose Existing Roaster</a>
										</div>
									</div>
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterName" class="inline">Roaster Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterName" class="regInput" type="text" value="<?php echo $ttcPending->roaster_name?>" for="roasterName" id="roasterName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterDescription" class="inline">Roaster Description:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<textarea name="roasterDescription" value="<?php echo $ttcPending->roaster_description?>" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterURL" class="inline">Roaster Website:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterURL" class="regInput" type="text" value="<?php echo $ttcPending->roaster_url?>" for="roasterURL" id="roasterURL">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterImage" class="inline">Roaster Logo:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterImage" class="regInput" type="file" for="roasterImage"  id="roasterImage">
									</div>
								</div><hr />
								<div class="row">
									<h3 class="sub-header">Coffee #1</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeName" class="inline">Coffee Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeName" class="regInput" type="text" value="<?php echo $ttcPending->coffee_name?>" for="coffeeName" id="coffeeName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeDescription" class="inline">Coffee Description:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<textarea name="coffeeDescription" value="<?php echo $ttcPending->description?>" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeePrice" class="inline">Retail Price:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeePrice" class="regInput" type="text" value="<?php echo $ttcPending->retail_price?>" for="coffeePrice" id="coffeePrice">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeCurrency" class="inline">Currency:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeCurrency" class="regInput" type="text" value="<?php echo $ttcPending->currency?>" for="coffeeCurrency" id="coffeeCurrency">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeBagSize" class="inline">Coffee Bag Size (oz):</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeBagSize" class="regInput" type="text" value="<?php echo $ttcPending->bag_size?>" for="coffeeBagSize" id="coffeeBagSize">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeGPPP" class="inline">Coffee Green Price Per Pound Paid:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeGPPP" class="regInput" type="text" value="<?php echo $ttcPending->gppp?>" for="coffeeGPPP" id="coffeeGPPP">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeEGS" class="inline">Effective Grower Share (0-100, without % sign)</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeEGS" class="regInput" type="text" value="<?php echo $ttcPending->egs?>%" for="coffeeEGS" id="coffeeEGS">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeWebsite" class="inline">Coffee Website:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeWebsite" class="regInput" type="text" value="<?php echo $ttcPending->url?>" for="coffeeWebsite" id="coffeeWebsite">
									</div>
								</div>
								<div class="row">
									<h3 class="sub-header">Farm #1</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmName" class="inline">Farm Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="farmName" class="regInput" type="text" value="<?php echo $ttcPending->farm_name?>" for="farmName" id="farmName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmLocation" class="inline">Farm Location - Country:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="farmLocation" class="regInput" type="text" value="<?php echo $ttcPending->farm_country?>" for="farmLocation" id="farmLocation">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmRegion" class="inline">Farm Region:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<select name="farmRegion" class="regInput" id="farmRegion">
											<option <?php echo ($ttcPending->farm_region == 'South America')?("selected"):('');?> >South America</option>
											<option <?php echo ($ttcPending->farm_region == 'Central America')?("selected"):('');?> >Central America</option>
											<option <?php echo ($ttcPending->farm_region == 'Africa')?("selected"):('');?> >Africa</option>
											<option <?php echo ($ttcPending->farm_region == 'Middle East')?("selected"):('');?> >Middle East</option>
											<option <?php echo ($ttcPending->farm_region == 'Pacific')?("selected"):('');?> >Pacific</option>
											<option <?php echo ($ttcPending->farm_region == 'Other')?("selected"):('');?> >Other</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="small-5 medium-5 large-5 columns">
										<label for="greenPPP" class="inline">Proof of Green Price Per Pound paid to farm or cooperative</label>
									</div>
									<div class="small-7 medium-7 large-7 columns">
										<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
										<input name="greenPPP" class="regInput" type="file" value="greenPPP" for="greenPPP" id="greenPPP">
									</div>
								</div>

								<div class="small-offset-5 small-2 columns">
									<input type="submit" value="Save" name="<?php echo $ttcPending->coffee_id?>" class="button success pending-submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
		<?php endforeach; ?>
		<?php foreach($data['ttcArchive'] as $ttcArchive) : ?>
		<div id="archive-view-<?php echo $ttcArchive->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<h2 id="modalTitle">Updating <?php echo $ttcArchive->coffee_name?></h2>
					<div class="row">
						<div class="small-10 small-offset-1 small-centered columns light-font-smaller">
							<form id="archiveUpdateForm-<?php echo $ttcArchive->coffee_id?>" action="/submitUpdate" method="POST" enctype="multipart/form-data">
								<input name="updateType" type="hidden" value="archive">
								<input name="coffeeId" type="hidden" value="<?php echo $ttcArchive->coffee_id?>">
								<div class="row">
									<h3 class="sub-header">Contact</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="firstName" class="inline">Your First Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="firstName" class="regInput" type="text" value="<?php echo $ttcArchive->first_name?>" for="firstName" id="firstName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="lastName" class="inline">Your Last Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="lastName" class="regInput" type="text" value="<?php echo $ttcArchive->last_name?>" for="lastName" id="lastName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="submitEmail" class="inline">Your Email:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="submitEmail" class="regInput" type="text" value="<?php echo $ttcArchive->email?>" for="submitEmail" id="submitEmail">
									</div>
								</div>
								<div class="row">
									<h3 class="sub-header">Roaster</h3>
									<div class="row">
										<div class="small-4 small-offset-4 columns">
											<a href="" class="button alert">Choose Existing Roaster</a>
										</div>
									</div>
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterName" class="inline">Roaster Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterName" class="regInput" type="text" value="<?php echo $ttcArchive->roaster_name?>" for="roasterName" id="roasterName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterDescription" class="inline">Roaster Description:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<textarea name="roasterDescription" value="<?php echo $ttcArchive->roaster_description?>" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterURL" class="inline">Roaster Website:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterURL" class="regInput" type="text" value="<?php echo $ttcArchive->roaster_url?>" for="roasterURL" id="roasterURL">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterImage" class="inline">Roaster Logo:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterImage" class="regInput" type="file" for="roasterImage"  id="roasterImage">
									</div>
								</div><hr />
								<div class="row">
									<h3 class="sub-header">Coffee #1</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeName" class="inline">Coffee Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeName" class="regInput" type="text" value="<?php echo $ttcArchive->coffee_name?>" for="coffeeName" id="coffeeName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeDescription" class="inline">Coffee Description:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<textarea name="coffeeDescription" value="<?php echo $ttcArchive->description?>" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeePrice" class="inline">Retail Price:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeePrice" class="regInput" type="text" value="<?php echo $ttcArchive->retail_price?>" for="coffeePrice" id="coffeePrice">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeCurrency" class="inline">Currency:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeCurrency" class="regInput" type="text" value="<?php echo $ttcArchive->currency?>" for="coffeeCurrency" id="coffeeCurrency">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeBagSize" class="inline">Coffee Bag Size (oz):</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeBagSize" class="regInput" type="text" value="<?php echo $ttcArchive->bag_size?>" for="coffeeBagSize" id="coffeeBagSize">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeGPPP" class="inline">Coffee Green Price Per Pound Paid:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeGPPP" class="regInput" type="text" value="<?php echo $ttcArchive->gppp?>" for="coffeeGPPP" id="coffeeGPPP">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeEGS" class="inline">Effective Grower Share (0-100)</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeEGS" class="regInput" type="text" value="<?php echo $ttcArchive->egs?>%" for="coffeeEGS" id="coffeeEGS">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeWebsite" class="inline">Coffee Website:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeWebsite" class="regInput" type="text" value="<?php echo $ttcArchive->url?>" for="coffeeWebsite" id="coffeeWebsite">
									</div>
								</div>
								<div class="row">
									<h3 class="sub-header">Farm #1</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmName" class="inline">Farm Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="farmName" class="regInput" type="text" value="<?php echo $ttcArchive->farm_name?>" for="farmName" id="farmName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmLocation" class="inline">Farm Location - Country:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="farmLocation" class="regInput" type="text" value="<?php echo $ttcArchive->farm_country?>" for="farmLocation" id="farmLocation">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmRegion" class="inline">Farm Region:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<select name="farmRegion" class="regInput" id="farmRegion">
											<option <?php echo ($ttcArchive->farm_region == 'South America')?("selected"):('');?> >South America</option>
											<option <?php echo ($ttcArchive->farm_region == 'Central America')?("selected"):('');?> >Central America</option>
											<option <?php echo ($ttcArchive->farm_region == 'Africa')?("selected"):('');?> >Africa</option>
											<option <?php echo ($ttcArchive->farm_region == 'Middle East')?("selected"):('');?> >Middle East</option>
											<option <?php echo ($ttcArchive->farm_region == 'Pacific')?("selected"):('');?> >Pacific</option>
											<option <?php echo ($ttcArchive->farm_region == 'Other')?("selected"):('');?> >Other</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="small-5 medium-5 large-5 columns">
										<label for="greenPPP" class="inline">Proof of Green Price Per Pound paid to farm or cooperative</label>
									</div>
									<div class="small-7 medium-7 large-7 columns">
										<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
										<input name="greenPPP" class="regInput" type="file" value="greenPPP" for="greenPPP" id="greenPPP">
									</div>
								</div>

								<div class="small-offset-5 small-2 columns">
									<input type="submit" value="Save" name="<?php echo $ttcArchive->coffee_id?>" class="button success archive-submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
		<?php endforeach; ?>
		<?php foreach($data['ttcActive'] as $ttcActive) : ?>
		<div id="active-view-<?php echo $ttcActive->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<h2 id="modalTitle">Updating <?php echo $ttcActive->coffee_name?></h2>
					<div class="row">
						<div class="small-10 small-offset-1 small-centered columns light-font-smaller">
							<form id="activeUpdateForm-<?php echo $ttcActive->coffee_id?>" action="/submitUpdate" method="POST" enctype="multipart/form-data">
								<input name="updateType" type="hidden" value="active">
								<input name="coffeeId" type="hidden" value="<?php echo $ttcActive->coffee_id?>">
								<div class="row">
									<h3 class="sub-header">Contact</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="firstName" class="inline">Your First Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="firstName" class="regInput" type="text" value="<?php echo $ttcActive->first_name?>" for="firstName" id="firstName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="lastName" class="inline">Your Last Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="lastName" class="regInput" type="text" value="<?php echo $ttcActive->last_name?>" for="lastName" id="lastName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="submitEmail" class="inline">Your Email:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="submitEmail" class="regInput" type="text" value="<?php echo $ttcActive->email?>" for="submitEmail" id="submitEmail">
									</div>
								</div>
								<div class="row">
									<h3 class="sub-header">Roaster</h3>
									<div class="row">
										<div class="small-4 small-offset-4 columns">
											<a href="" class="button alert">Choose Existing Roaster</a>
										</div>
									</div>
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterName" class="inline">Roaster Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterName" class="regInput" type="text" value="<?php echo $ttcActive->roaster_name?>" for="roasterName" id="roasterName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterDescription" class="inline">Roaster Description:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<textarea name="roasterDescription" value="<?php echo $ttcActive->roaster_description?>" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterURL" class="inline">Roaster Website:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterURL" class="regInput" type="text" value="<?php echo $ttcActive->roaster_url?>" for="roasterURL" id="roasterURL">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="roasterImage" class="inline">Roaster Logo:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="roasterImage" class="regInput" type="file" for="roasterImage"  id="roasterImage">
									</div>
								</div><hr />
								<div class="row">
									<h3 class="sub-header">Coffee #1</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeName" class="inline">Coffee Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeName" class="regInput" type="text" value="<?php echo $ttcActive->coffee_name?>" for="coffeeName" id="coffeeName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeDescription" class="inline">Coffee Description:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<textarea name="coffeeDescription" value="<?php echo $ttcActive->description?>" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeePrice" class="inline">Retail Price:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeePrice" class="regInput" type="text" value="<?php echo $ttcActive->retail_price?>" for="coffeePrice" id="coffeePrice">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeCurrency" class="inline">Currency:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeCurrency" class="regInput" type="text" value="<?php echo $ttcActive->currency?>" for="coffeeCurrency" id="coffeeCurrency">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeBagSize" class="inline">Coffee Bag Size (oz):</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeBagSize" class="regInput" type="text" value="<?php echo $ttcActive->bag_size?>" for="coffeeBagSize" id="coffeeBagSize">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeGPPP" class="inline">Coffee Green Price Per Pound Paid:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeGPPP" class="regInput" type="text" value="<?php echo $ttcActive->gppp?>" for="coffeeGPPP" id="coffeeGPPP">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeEGS" class="inline">Effective Grower Share (0-100, without % sign)</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeEGS" class="regInput" type="text" value="<?php echo $ttcActive->egs?>%" for="coffeeEGS" id="coffeeEGS">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="coffeeWebsite" class="inline">Coffee Website:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="coffeeWebsite" class="regInput" type="text" value="<?php echo $ttcActive->url?>" for="coffeeWebsite" id="coffeeWebsite">
									</div>
								</div>
								<div class="row">
									<h3 class="sub-header">Farm #1</h3>
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmName" class="inline">Farm Name:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="farmName" class="regInput" type="text" value="<?php echo $ttcActive->farm_name?>" for="farmName" id="farmName">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmLocation" class="inline">Farm Location - Country:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<input name="farmLocation" class="regInput" type="text" value="<?php echo $ttcActive->farm_country?>" for="farmLocation" id="farmLocation">
									</div>
								</div>
								<div class="row">
									<div class="small-3 medium-3 large-3 columns">
										<label for="farmRegion" class="inline">Farm Region:</label>
									</div>
									<div class="small-9 medium-9 large-9 columns">
										<select name="farmRegion" class="regInput" id="farmRegion">
											<option <?php echo ($ttcActive->farm_region == 'South America')?("selected"):('');?> >South America</option>
											<option <?php echo ($ttcActive->farm_region == 'Central America')?("selected"):('');?> >Central America</option>
											<option <?php echo ($ttcActive->farm_region == 'Africa')?("selected"):('');?> >Africa</option>
											<option <?php echo ($ttcActive->farm_region == 'Middle East')?("selected"):('');?> >Middle East</option>
											<option <?php echo ($ttcActive->farm_region == 'Pacific')?("selected"):('');?> >Pacific</option>
											<option <?php echo ($ttcActive->farm_region == 'Other')?("selected"):('');?> >Other</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="small-5 medium-5 large-5 columns">
										<label for="greenPPP" class="inline">Proof of Green Price Per Pound paid to farm or cooperative</label>
									</div>
									<div class="small-7 medium-7 large-7 columns">
										<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
										<input name="greenPPP" class="regInput" type="file" value="greenPPP" for="greenPPP" id="greenPPP">
									</div>
								</div>

								<div class="small-offset-5 small-2 columns">
									<input type="submit" value="Save" name="<?php echo $ttcActive->coffee_id?>" class="button success active-submit">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
<script>
    function myFunction() {
    }
	function activeFunction() {
	}
	function archiveFunction() {
	}
</script>






