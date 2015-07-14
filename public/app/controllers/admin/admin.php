<?php namespace controllers\admin;

use \helpers\session;
use	\helpers\url;
use \core\model;
use	\core\view;

class Admin extends \core\controller
{

	private $_adminModel;

	public function __construct()
	{
		$this->_adminModel = new \models\admin\registration();

		if (!Session::get('loggedin')) {
			Url::redirect('admin/login');
		}

	}

	public function index()
	{

		$data['title'] = 'Admin';

		//$pending = $this->_adminModel->getPending();

		View::renderadmintemplate('header', $data);
		View::render('admin/admin', $data);
		View::renderadmintemplate('footer', $data);

	}

	public function pending()
	{
		$data['title'] = 'Registration Approval';

		$ttcoffees = $this->_adminModel->getTTCoffees();
		$data['ttcoffees'] = $ttcoffees;

		foreach ($ttcoffees as $ttcoffee) {
			$filterRoaster[] = $ttcoffee->roaster_name;
		}
		$filterRoaster = array_unique($filterRoaster);
		$data['filter_roaster'] = $filterRoaster;
//		echo "<table>";
//		foreach ($ttcoffees as $key => $ttcoffee) {
//			echo "Roaster Name";
//			echo $ttcoffee->roaster_name;
//			echo "<img src='$ttcoffee->roaster_logo'/>";
//		}
		echo "<h2 id='pendingReg'>Pending Registration</h2>";
		echo "<table>";
			echo "<thead>";
				echo "<tr>";
					echo "<th>Name</th>";
					echo "<th>Email</th>";
					echo "<th>Roaster Name</th>";
					echo "<th>Roaster Description</th>";
					echo "<th>Roaster Logo</th>";
					echo "<th>Coffee Name</th>";
					echo "<th>Coffee Description</th>";
					echo "<th>Retail Price</th>";
					echo "<th>Currency</th>";
					echo "<th>Bag Size(in ounces)</th>";
					echo "<th>Green PPP</th>";
					echo "<th>Website</th>";
					echo "<th>Farm Name</th>";
					echo "<th>Farm Region</th>";
					echo "<th>Farm Country</th>";
					echo "<th>GPPP Proof</th>";
				echo "</tr>";
			echo "</thead>";
			foreach ($ttcoffees as $key => $ttcoffee) {
				echo "<tbody>";
				echo "<tr>";
				echo "<td>".$ttcoffee->first_name." ".$ttcoffee->last_name."</td>";
				echo "<td>".$ttcoffee->email."</td>";
				echo "<td>".$ttcoffee->roaster_name."</td>";
				echo "<td>".$ttcoffee->roaster_description."</td>";
				echo "<td><img style='height: 100px; width: 75px; margin: 0 auto;' src='$ttcoffee->roaster_logo'/></td>";
				echo "<td>".$ttcoffee->coffee_name."</td>";
				echo "<td>".$ttcoffee->coffee_description."</td>";
				echo "<td>$".$ttcoffee->retail_price."</td>";
				echo "<td>".$ttcoffee->currency."</td>";
				echo "<td>".$ttcoffee->bag_size."</td>";
				echo "<td>$".$ttcoffee->gppp."</td>";
				echo "<td>".$ttcoffee->url."</td>";
				echo "<td>".$ttcoffee->farm_name."</td>";
				echo "<td>".$ttcoffee->farm_region."</td>";
				echo "<td>".$ttcoffee->farm_country."</td>";
				echo "</tr>";
				echo "</tbody>";
			}
		echo "</table>";
//			echo "Roaster Name";
//			echo $ttcoffee->roaster_name;
//			echo "<img src='$ttcoffee->roaster_logo'/>";
//			echo '<div class="ttcoffee">';
//			echo "<a href='#' data-reveal-id='quick-view-$key'>";
//			echo "<div class='row'>";
//			echo "<div class='small-3 medium-3 large-3 columns logo-wrapper'>";
//			echo '<div class="text-center wrapper-parent">';
//			echo '<div class="thumbnail-wrapper">';
//			echo "<img src='$ttcoffee->roaster_logo'/>";
//			echo '</div>';
//			echo "<i class='fa fa-search-plus'></i>";
//			echo '</div>';
//			echo '</div>';
//			echo '<div class="small-5 medium-6 large-6 columns" id="TTCpanel">';
//			echo "<h3 class='roaster_name'>$ttcoffee->roaster_name</h3>";
//			echo "<h5 class='coffee_name'>$ttcoffee->coffee_name</h5>";
//			echo "<ul class='TTCList' style='margin-left: 0.1rem;'>";
//			echo "<li class='show-for-medium-up'><em>Farm:</em> " . $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country . "</li>";
//			echo '<li class="show-for-medium-up"><em>Retail Price: </em>';
//			if ($ttcoffee->currency == 'USD') {
//				echo '$' . number_format($ttcoffee->retail_price, 2);
//			} else {
//				echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
//			}
//			echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
//			echo '<li class="show-for-small-only"><em>Retail Price: </em>';
//			if ($ttcoffee->currency == 'USD') {
//				echo '$' . number_format($ttcoffee->retail_price, 2);
//			} else {
//				echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
//			}
//			echo ' per ' . $ttcoffee->bag_size . 'oz</li>';
//			echo "<li><em>Green Price:</em> $" . round($ttcoffee->gppp, 2) . " per pound</li>";
//			echo '</ul>';
//			echo '</div>';
//			echo '<div class="small-4 medium-3 large-3 columns">';
//			echo '<div class="gppp">';
//			echo '<div class="gppp-abbrev rotate">GPPP</div>';
//			echo "<h3>$" . number_format($ttcoffee->gppp, 2) . "</h3>";
//			echo '</div>';
//			echo '<div class="Percent">';
//			echo '<div class="percent-abbrev rotate">EGS</div>';
//			echo "<h3>" . round($ttcoffee->egs, 1) . "%</h3>";
//			echo '</div>';
//			echo '</div>';
//			echo '</div>';
//			echo '</a>';
//			echo "<div id='quick-view-$key' class='reveal-modal' data-reveal aria-labelledby='modalTitle' aria-hidden='true' role='dialog'>";
//			echo '<div class="row">';
//			echo '<div class="small-12 medium-6 columns">';
//			echo "<div class='show-for-small-only'>";
//			echo "<div class='small-12 columns'><a href=" . $ttcoffee->url . "><img class='quick-view-logo' src='$ttcoffee->roaster_logo'/></a></div>";
//			echo "</div>";
//			echo "<h2 id='modalTitle'>$ttcoffee->roaster_name</h2>";
//			echo "<p class='lead'>$ttcoffee->coffee_name</p>";
//			echo '<ul class="TTCList-popup" style="margin-left: 0.1rem;">';
//			echo "<li><em>Farm:</em> " . $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country . "</li>";
//			echo '<li><em>Retail Price: </em>';
//			if ($ttcoffee->currency == 'USD') {
//				echo '$' . number_format($ttcoffee->retail_price, 2);
//			} else {
//				echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
//			}
//			echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
//			echo "<li><em>Green Price:</em> $" . number_format($ttcoffee->gppp, 2) . " per pound(f.o.b. or equivalent)</li>";
//			echo '</ul>';
//			echo "<p>$ttcoffee->description</p>";
//			echo "<div class='website-link'><a href='$ttcoffee->url'>Go to website</a></div>";
//			echo '</div>';
//			echo '<div class="small-12 medium-6 columns">';
//			echo '<div class="row">';
//			echo '<div class="show-for-medium-up medium-offset-2 medium-8 columns">';
//			echo "<a href='$ttcoffee->url'>";
//			echo "<img class='quick-view-logo' src='$ttcoffee->roaster_logo'/>";
//			echo '</a>';
//			echo '</div>';
//			echo '</div>';
//			echo '<div class="row">';
//			echo '<div class="small-offset-1 small-6 medium-offset-3 medium-5 columns text-center">';
//			echo '<div class="row">';
//			echo '<div class="small-2 medium-2 columns">';
//			echo "<div class='square'>$" . number_format($ttcoffee->gppp, 2) . '</div>';
//			echo '</div>';
//			echo '<div class="small-2 medium-2 columns">';
//			echo "<div class='circle'>" . round($ttcoffee->egs, 1) . "%</div>";
//			echo '</div>';
//			echo '</div>';
//			echo '</div>';
//			echo '</div>';
//			echo '</div>';
//			echo '</div>';
////			echo '<a class="close-reveal-modal" aria-label="Close">&#215;</a>';
//			echo '</div>';
//			echo '</div>';
			View::renderadmintemplate('header', $data);
			View::render('admin/pending', $data);
			View::renderadmintemplate('footer', $data);
		//}
	}

}
