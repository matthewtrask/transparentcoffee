<?php

namespace controllers;

use helpers\url;
use helpers\form;
use helpers\phpmailer\mail;
use core\view;
use core\controller;

class ttc extends Controller {

	private $_db;

	public function __construct(){

	}

	public function index() {
		$data['title'] = 'Home';

        View::rendertemplate('header', $data);
        View::rendertemplate('home');
		View::rendertemplate('footer');
	}

	public function about() {
		$data['title'] = 'About';

	}

	public function transparency() {
		$data['title'] = 'Transparency';

		View::rendertemplate('header', $data);
		View::rendertemplate('transparency');
		View::rendertemplate('footer');
	}

	public function seg() {
		$data['title'] = 'SEG';

		View::rendertemplate('header', $data);
		View::rendertemplate('SE@G');
		View::rendertemplate('footer');

	}

	public function ttcoffees() {
		$data['title'] = 'Transparent Coffees';

        $model = new \Models\ttc();
        $ttcoffees = $model->getTTCoffees();
        $data['ttcoffees'] = $ttcoffees;

        foreach ($ttcoffees as $ttcoffee) {
            $filterRoaster[] = $ttcoffee->roaster_name;
        }
        $filterRoaster = array_unique($filterRoaster);
        $data['filter_roaster'] = $filterRoaster;
		View::rendertemplate('header', $data);
		View::rendertemplate('ttcoffees', $data);
		View::rendertemplate('footer');
	}

    public function ttcoffeesAjax() {
        $data['title'] = 'Transparent Coffees';
        $model = new \Models\ttc();
        $ttcoffees = $model->getTTCoffees();
        if (isset($_POST['roaster'])) {
            $roasters = $_POST['roaster'];
            print_r($roasters);
            foreach ($ttcoffees as $key => $ttcoffee) {
                if (!in_array($ttcoffee->roaster_name, $roasters)) {
                    unset($ttcoffees[$key]);
                }
            }
        }
        if (isset($_POST['region'])) {
            $regions = $_POST['region'];
            foreach ($ttcoffees as $key => $ttcoffee) {
                if (!in_array($ttcoffee->farm_region, $regions)) {
                    unset($ttcoffees[$key]);
                }
            }
        }
        $egsLower = $_POST['egs-lower'];
        $egsUpper = $_POST['egs-upper'];
        foreach ($ttcoffees as $key => $ttcoffee) {
            if ($egsUpper == 60) {
                if ($ttcoffee->egs < $egsLower) {
                    unset($ttcoffees[$key]);
                }
            }
            else {
                if (($ttcoffee->egs < $egsLower) || ($ttcoffee->egs > $egsUpper)) {
                    unset($ttcoffees[$key]);
                }
            }
        }
        $gpppLower = $_POST['gppp-lower'];
        $gpppUpper = $_POST['gppp-upper'];
        foreach ($ttcoffees as $key => $ttcoffee) {
            if ($gpppUpper == 4) {
                if ($ttcoffee->gppp < $gpppLower) {
                    unset($ttcoffees[$key]);
                }
            }
            else {
                if (($ttcoffee->gppp < $gpppLower) || ($ttcoffee->gppp > $gpppUpper)) {
                    unset($ttcoffees[$key]);
                }
            }
        }
        foreach ($ttcoffees as $key => $ttcoffee) {
            echo '<div class="ttcoffee">';
                echo "<a href='#' data-reveal-id='quick-view-$key>";
                    echo "<div class='row'>";
                        echo "<div class='small-3 medium-3 large-3 columns logo-wrapper'>";
                            echo '<div class="text-center">';
                                echo "<img src='data:image/jpeg;base64, $ttcoffee->roaster_logo'/>";
                                echo "<i class='fa fa-search-plus'></i>";
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="small-6 medium-6 large-6 columns" id="TTCpanel">';
                            echo "<h3>$ttcoffee->roaster_name</h3>";
                            echo "<h5>$ttcoffee->coffee_name</h5>";
                            echo "<ul class='TTCList' style='margin-left: 0.1rem;'>";
                                echo '<li><em>Retail Price:</em>';
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . round($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo round($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
                                echo "<li><em>Green Price:</em> $" . round($ttcoffee->gppp, 2) . " per pound(f.o.b. or equivalent)</li>";
                            echo '</ul>';
                        echo '</div>';
                        echo '<div class="small-3 medium-3 large-3 columns">';
                            echo '<div class="Percent">';
                                echo "<h2>" . round($ttcoffee->egs) . "%</h2>";
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</a>';
                echo "<div id='quick-view-$key' class='reveal-modal' data-reveal aria-labelledby='modalTitle' aria-hidden='true' role='dialog'>";
                    echo '<div class="row">';
                        echo '<div class="small-6 columns">';
                            echo "<h2 id='modalTitle'>$ttcoffee->roaster_name</h2>";
                            echo "<p class='lead'>$ttcoffee->coffee_name</p>";
                            echo '<ul class="TTCList" style="margin-left: 0.1rem;">';
                                echo "<li><em>Farm:</em> " . $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country . "</li>";
                                echo '<li><em>Retail Price:</em>';
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . round($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo round($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
                                echo "<li><em>Green Price:</em> $" . round($ttcoffee->gppp, 2) . " per pound(f.o.b. or equivalent)</li>";
                            echo '</ul>';
                            echo "<p>$ttcoffee->description</p>";
                            echo "<div class='website-link'><a href='$ttcoffee->url'>Go to website</a></div>";
                        echo '</div>';
                        echo '<div class="small-6 columns">';
                            echo '<div class="row">';
                                echo '<div class="small-offset-2 small-8 columns">';
                                    echo "<a href='$ttcoffee->url'>";
                                        echo "<img class='quick-view-logo' src='data:image/jpeg;base64, $ttcoffee->roaster_logo'/>";
                                    echo '</a>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="small-offset-4 small-4 columns text-center">';
                                echo "<div class='circle'>" . round($ttcoffee->egs) . "%</div>";
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '<a class="close-reveal-modal" aria-label="Close">&#215;</a>';
            echo '</div>';
        echo '</div>';
        }
    }

	public function register() {
		$data['title'] = 'Register';


		View::rendertemplate('header', $data);
		View::rendertemplate('registration');
		View::rendertemplate('footer');
	}

	public function insight() {
		$data['title'] = 'Insights';

		
	}

	public function scrpi() {
		$data['title'] = 'SCRPI';

        View::rendertemplate('header', $data);
        View::rendertemplate('scrpi');
        View::rendertemplate('footer');
	}

	public function roasters() {
		$data['title'] = 'Roasters';

        $model = new \Models\ttc();
        $data['roasters'] = $model->getRoasters();
        View::rendertemplate('header', $data);
        View::rendertemplate('roasters', $data);
        View::rendertemplate('footer');
	}

	public function contact() {


		$data['title'] = 'Contact';

		$mail = new \helpers\phpmailer\phpmailer;


		View::rendertemplate('header', $data);
		View::rendertemplate('contact', $data);
		View::rendertemplate('footer');



	}
}
