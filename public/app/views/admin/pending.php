<?php
use \helpers\phpmailer\mail;
?>

<div class='container'>
		<div class='row fullWidth'>
			<div class='small-12 medium-12 large-12 columns'>
				<h2 id='pendingReg'>Pending Coffees</h2>
				<form onsubmit="myFunction(); return false;" id="pendingForm">
					<table>
		 				<thead>
								<th>Approve</th>
								<th>Email</th>
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
								echo "<td class='formRow'><a href='' class='button tiny secondary update-btn' data-reveal-id='pending-email-".$ttcPending->coffee_id."' name='archive-".$ttcPending->coffee_id."'>Email</a></td>";
								echo "<td class='formRow'><a href='' class='button tiny secondary update-btn' data-reveal-id='pending-view-".$ttcPending->coffee_id."' name='archive-".$ttcPending->coffee_id."'>Update</a></td>";
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
				<input id="reject" type="submit" value="Reject" class="button alert">
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
						<th>Email</th>
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
						echo "<td class='formRow'><a href='' class='button tiny secondary update-btn' data-reveal-id='active-email-".$ttcActive->coffee_id."' name='active-".$ttcActive->coffee_id."'>Email</a></td>";
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
		<form onsubmit="archiveFunction(); return false;" id="activeForm" class="activeForm">
			<table>
				<thead>
					<tr>
						<th>Unarchive</th>
						<th>Email</th>
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
						echo "<td class='formRow'><a href='#' class='button tiny secondary update-btn' data-reveal-id='archive-email-".$ttcArchive->coffee_id."' name='email-".$ttcArchive->coffee_id."'>Email</a></td>";
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
		<div id="pending-email-<?php echo $ttcPending->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<h2 id="modalTitle">Emailing <?php echo $ttcPending->roaster_name?></h2>
					<form method="POST" action="/pendingEmail">
						<div class="small-10 small-offset-1 columns">
							<h2 id="modalTitle">Emailing <?php echo $ttcPending->roaster_name?></h2>
							<h4>Congratulations! Based on the information you have submitted, Transparent Trade Coffee has approved your submission and will be featured on our website.</h4>
							<p><b>Please take a minute to review the information that you have submitted so that all the details are correct!</b></p>
							<p><b>Contact Email</b>: <?php echo $ttcPending->email?></p>
							<p><b>Roaster Name</b>: <?php echo $ttcPending->roaster_name?></p>
							<p><b>Roaster Description</b>: <?php echo $ttcPending->roaster_description?></p>
							<p><b>Roaster Website</b>: <?php echo $ttcPending->roaster_url?></p>
							<p><b>Roaster Image</b>: <img style='height: 100px; width: 75px; margin: 0 auto;' src='<?php echo $ttcActive->roaster_logo ?>'/></p>
							<p><b>Coffee Name</b>: <?php echo $ttcPending->coffee_name ?></p>
							<p><b>Coffee Description</b>: <?php echo $ttcPending->description?></p>
							<p><b>Retail Price</b>: <?php echo $ttcPending->retail_price?></p>
							<p><b>Retail Currency</b>: <?php echo $ttcPending->currency?></p>
							<p><b>Bag Size (ounces)</b>: <?php echo $ttcPending->bag_size?></p>
							<p><b>Green Price Per Pound</b>: <?php echo $ttcPending->gppp?></p>">
							<p><b>EGS</b>: <?php echo round($ttcPending->egs, 1)?>%</p>
							<p><b>Coffee Website</b>: <?php echo $ttcPending->url?></p>
							<p><b>Farm Name</b>: <?php echo $ttcPending->farm_name?></p>
							<p><b>Farm Region</b>: <?php echo $ttcPending->farm_region?></p>
							<p><b>Farm Country</b>: <?php echo $ttcPending->farm_country?></p>
							<p>If everything looks right, please reply back with a simple confirm so that way we can post your coffee as soon as possible!</p>"><br>
							<input name="title" value="<h2 id="modalTitle">Emailing <?php echo $ttcPending->roaster_name?></h2>">
							<input name="line1" value="<h4>Congratulations! Based on the information you have submitted, Transparent Trade Coffee has approved your submission and will be featured on our website.</h4>">
							<input name="line2" value="<p><b>Please take a minute to review the information that you have submitted so that all the details are correct!</b></p>">
							<input name="line3" value="<p>Contact Email: <?php echo $ttcPending->email?></p>">
							<input name="line4" value="<p><b>Roaster Name</b>: <?php echo $ttcPending->roaster_name?></p>">
							<input name="line5" value="<p><b>Roaster Description</b>: <?php echo $ttcPending->roaster_description?></p>">
							<input name="line6" value="<p><b>Roaster Website</b>: <?php echo $ttcPending->roaster_url?></p>">
							<input name="line7" value="<p><b>Roaster Image</b>: <img style='height: 100px; width: 75px; margin: 0 auto;' src='<?php echo $ttcActive->roaster_logo ?>'/></p>">
							<input name="line8" value="<p><b>Coffee Name</b>: <?php echo $ttcPending->coffee_name ?></p>">
							<input name="line9" value="<p><b>Coffee Description</b>: <?php echo $ttcPending->description?></p>">
							<input name="line10" value="<p><b>Retail Price</b>: <?php echo $ttcPending->retail_price?></p>">
							<input name="line11" value="<p><b>Retail Currency</b>: <?php echo $ttcPending->currency?></p>">
							<input name="line12" value="<p><b>Bag Size (ounces)</b>: <?php echo $ttcPending->bag_size?></p>">
							<input name="line13" value="<p><b>Green Price Per Pound</b>: <?php echo $ttcPending->gppp?></p>">
							<input name="line14" value="<p><b>EGS</b>: <?php echo round($ttcPending->egs, 1)?>%</p>">
							<input name="line15" value="<p><b>Coffee Website</b>: <?php echo $ttcPending->url?></p>">
							<input name="line16" value="<p><b>Farm Name</b>: <?php echo $ttcPending->farm_name?></p>">
							<input name="line17" value="<p><b>Farm Region</b>: <?php echo $ttcPending->farm_region?></p>">
							<input name="line18" value="<p><b>Farm Country</b>: <?php echo $ttcPending->farm_country?></p>">
							<input name="line19" value="<p>If everything looks right, please reply back with a simple confirm so that way we can post your coffee as soon as possible!</p>"><br>
							<input type="submit" value="Send" name="<?php echo $ttcPending->coffee_id?>" class="button success pending-email">

						</div>
					</form>
				</div>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
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
									<div class="small-4 small-offset-4 columns">
										<a href="" class="button alert pending-roaster-btn" name="<?php echo $ttcPending->coffee_id?>">Choose Existing Roaster</a>
									</div>
								</div>
								<div id="pending-roaster-section-<?php echo $ttcPending->coffee_id?>">
									<div class="row">
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
											<textarea name="roasterDescription" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";><?php echo $ttcPending->roaster_description?></textarea>
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
										<textarea name="coffeeDescription" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";><?php echo $ttcPending->description?></textarea>
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
		<div id="archive-email-<?php echo $ttcArchive->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<form method="POST" action="/archiveEmail">
					<div class="small-10 small-offset-1 columns">
						<input name="title" value='<h2 id="modalTitle"><?php echo $ttcArchive->roaster_name?></h2>'>
						<input name="line1" value="<h4>Congratulations! Based on the information you have submitted, Transparent Trade Coffee has approved your submission and will be featured on our website.</h4>"><br>
						<input name="line2" value="<p><b>Please take a minute to review the information that you have submitted so that all the details are correct!</b></p>"><br>
						<input name="line3" value="<p><b>Contact Email</b>: <?php echo $ttcArchive->email?></p>"><br>
						<input name="line4" value="<p><b>Roaster Name</b>: <?php echo $ttcArchive->roaster_name?></p>"><br>
						<input name="line5" value="<p><b>Roaster Description</b>: <?php echo $ttcArchive->roaster_description?></p>"><br>
						<input name="line6" value="<p><b>Roaster Website</b>: <?php echo $ttcArchive->roaster_url?></p>"><br>
						<input name="line7" value="<p><b>Roaster Image</b>: <img style='height: 100px; width: 75px; margin: 0 auto;' src='<?php echo $ttcArchive->roaster_logo ?>'/></p>"><br>
						<input name="line8" value="<p><b>Coffee Name</b>: <?php echo $ttcArchive->coffee_name ?></p>"><br>
						<input name="line9" value="<p><b>Coffee Description</b>: <?php echo $ttcArchive->description?></p>"><br>
						<input name="line10" value="<p><b>Retail Price</b>: <?php echo $ttcArchive->retail_price?></p>"><br>
						<input name="line11" value="<p><b>Retail Currency</b>: <?php echo $ttcArchive->currency?></p>"><br>
						<input name="line12" value="<p><b>Bag Size (ounces)</b>: <?php echo $ttcArchive->bag_size?></p>"><br>
						<input name="line13" value="<p><b>Green Price Per Pound</b>: <?php echo $ttcArchive->gppp?></p>"><br>
						<input name="line14" value="<p><b>EGS</b>: <?php echo round($ttcArchive->egs, 1)?>%</p>"><br>
						<input name="line15" value="<p><b>Coffee Website</b>: <?php echo $ttcArchive->url?></p>"><br>
						<input name="line16" value="<p><b>Farm Name</b>: <?php echo $ttcArchive->farm_name?></p>"><br>
						<input name="line17" value="<p><b>Farm Region</b>: <?php echo $ttcArchive->farm_region?></p>"><br>
						<input name="line18" value="<p><b>Farm Country</b>: <?php echo $ttcArchive->farm_country?></p>"><br>
						<input name="line19" value="<p>If everything looks right, please reply back with a simple confirm so that way we can post your coffee as soon as possible!</p>"><br>
					</div>
					<input type="submit" value="Email" name="<?php echo $ttcArchive->coffee_id?>" class="button success archive-email">

					
				</form>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
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
									<div class="small-4 small-offset-4 columns">
										<a href="" class="button alert archive-roaster-btn" name="<?php echo $ttcArchive->coffee_id?>">Choose Existing Roaster</a>
									</div>
								</div>
								<div id="archive-roaster-section-<?php echo $ttcArchive->coffee_id?>" class="row">
									<div class="row">
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
											<textarea name="roasterDescription" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";><?php echo $ttcArchive->roaster_description?></textarea>
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
										<textarea name="coffeeDescription" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";><?php echo $ttcArchive->description?></textarea>
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
		<div id="active-email-<?php echo $ttcActive->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<form method="POST" action="/activeEmail">
						<input name="title" value='<h2 id="modalTitle">Emailing <?php echo $ttcActive->roaster_name?></h2>'>
						<input name="field1" value="<h4>Transparent Trade Coffee has now official posted your roaster and coffee information on our website.</h4>"><br>
						<input name="field2" value="<p>You can now view it at our <a href='http://transparenttradecoffee.com/ttcoffees'>website</a> today!</p>"><br>
						<input name="field3" value="<p>Feel free to tweet or share this with your network, we know we will!</p>"><br>
						<input name="field4" value="<p>Contact Email: <?php echo $ttcActive->email?></p>"><br>
						<input type="submit" value="Email" name="Email" class="button success active-email">
					</form>
				</div>
			</div>
			<a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>
		<div id="active-view-<?php echo $ttcActive->coffee_id?>" class="reveal-modal backend-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			<div class="row">
				<div class="small-10 small-offset-1 columns">
					<div class="small-10 small-offset-1 columns">
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
									<div class="small-4 small-offset-4 columns">
										<a href="" class="button alert active-roaster-btn" name="<?php echo $ttcActive->coffee_id?>">Choose Existing Roaster</a>
									</div>
								</div>
								<div id="active-roaster-section-<?php echo $ttcActive->coffee_id?>" class="row">
									<div class="row">
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
											<textarea name="roasterDescription" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";><?php echo $ttcActive->roaster_description?></textarea>
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
										<textarea name="coffeeDescription" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";><?php echo $ttcActive->description?></textarea>
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




