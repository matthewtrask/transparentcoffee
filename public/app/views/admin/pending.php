<div class='container'>
		<div class='row fullWidth'>
			<div class='small-12 medium-12 large-12 columns'>
				<h2 id='pendingReg'>Pending Registration</h2>
				<form method="POST" action="" form="enctype/multidatas" id="pendingForm">
					<table>
		 				<thead>
							<tr>
								<th>Approve</th>
								<th>Name</th>
								<th>Email</th>
								<th>Roaster Name</th>
								<th>Roaster Description</th>
								<th>Roaster Logo</th>
								<th>Coffee Name</th>
								<th>Coffee Description</th>
								<th>Retail Price</th>
								<th>Currency</th>
								<th>Bag Size(in ounces)</th>
								<th>Green PPP</th>
								<th>Website</th>
								<th>Farm Name</th>
								<th>Farm Region</th>
								<th>Farm Country</th>
								<th>GPPP Proof</th>
							</tr>
						</thead>
						<tbody>
							<tr>
							<?php 
							foreach ($data['ttcoffees'] as $ttcoffee) {
								// foreach ($ttcoffee as $key => $ttcoffee){
								echo "<tr>";
								echo "<td class='formRow'><input type='checkbox' class='approve'>";
								echo "<td class='formRow'>".$ttcoffee->first_name." ".$ttcoffee->last_name."</td>";
								echo "<td class='formRow'>".$ttcoffee->email."</td>";
								echo "<td class='formRow'>".$ttcoffee->roaster_name."</td>";
								echo "<td class='formRow'>".$ttcoffee->roaster_description."</td>";
								echo "<td class='formRow'><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcoffee->roaster_logo'/></td>";
								echo "<td class='formRow'>".$ttcoffee->coffee_name."</td>";
								echo "<td class='formRow'>".$ttcoffee->coffee_description."</td>";
								echo "<td class='formRow'>$".$ttcoffee->retail_price."</td>";
								echo "<td class='formRow'>".$ttcoffee->currency."</td>";
								echo "<td class='formRow'>".$ttcoffee->bag_size."</td>";
								echo "<td class='formRow'>$".$ttcoffee->gppp."</td>";
								echo "<td class='formRow'><a target='_blank' href=".$ttcoffee->url."/>".$ttcoffee->url."</a></td>";
								echo "<td class='formRow'>".$ttcoffee->farm_name."</td>";
								echo "<td class='formRow'>".$ttcoffee->farm_region."</td>";
								echo "<td class='formRow'>".$ttcoffee->farm_country."</td>";
								echo "<td class='formRow'>".$ttcoffee->gppp_proof."</td>";
								echo "</tr>";
								echo "</tbody>";
								
							} 
						?>
					</table>
					<!-- <input id="submitButton" type="submit" value="Submit" class="button expand white-button"> -->
				<input id="pendingReg" type="submit" value="Submit" class="button success">				
				<button id='reject' class='button alert registration'>Reject</button>
			</form>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#pendingReg').submit(function(e){
	var approval = $(".approve").checked;

	$.ajax({
			type: "POST",
			url: "http://192.168.33.10/admin/pending",
			data: {"approved": $(".approve").prop("checked") },			
			success: function(){
				$("#pendingForm").submit();
			},
			error: function(){
				console.log("failed");
			}
 		});
	});
});
</script>







