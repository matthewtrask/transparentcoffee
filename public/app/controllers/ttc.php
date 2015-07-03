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
        if ($_POST['sort'] == 'gppp') {
            $_POST['sort'] = 'Green Price Per Pound';
        }
        else if ($_POST['sort'] == 'egs') {
            $_POST['sort'] = 'Effective Grower Share';
        }
        else if ($_POST['sort'] == 'default') {
            $_POST['sort'] = 'Default';
        }
        echo '<div class="small-9 columns">';
            echo '<h3>Transparent Coffees</h3>';
        echo '</div>';
        echo '<div class="small-3 columns">';
            echo "<a class='button tiny secondary dropdown-btn' data-dropdown='hover1'
                     data-options='is_hover:true'>" . $_POST['sort'] . "</a>";
            echo '<ul id="hover1" class="f-dropdown dropdown-ul" data-dropdown-content>';
                if ($_POST['sort'] == 'Green Price Per Pound') {
                    echo '<li class="sort-dropdown"><a>Effective Grower Share</a></li>';
                    echo '<li class="sort-dropdown"><a>Default</a></li>';
                }
                else if ($_POST['sort'] == 'Effective Grower Share') {
                    echo '<li class="sort-dropdown"><a>Green Price Per Pound</a></li>';
                    echo '<li class="sort-dropdown"><a>Default</a></li>';
                }
                else {
                    echo '<li class="sort-dropdown"><a>Green Price Per Pound</a></li>';
                    echo '<li class="sort-dropdown"><a>Effective Grower Share</a></li>';
                }
            echo '</ul>';
            echo "<a id=" . $_POST['arrow'] . " class='button tiny secondary arrow-btn'><i class='fa fa-angle-" . $_POST['arrow'] . " fa-2x'></i></a>";
        echo '</div>';

        shuffle($ttcoffees);
        switch($_POST['sort']) {
            case 'Default':
                break;
            case 'Green Price Per Pound':
                if ($_POST['arrow'] == 'down') {
                    $ttcoffees = $this->quicksort($ttcoffees, 'gppp', 'down');
                }
                else {
                    $ttcoffees = $this->quicksort($ttcoffees, 'gppp', 'up');
                }
                break;
            case 'Effective Grower Share':
                if ($_POST['arrow'] == 'down') {
                    $ttcoffees = $this->quicksort($ttcoffees, 'egs', 'down');
                }
                else {
                    $ttcoffees = $this->quicksort($ttcoffees, 'egs', 'up');
                }
                break;
        }

        foreach ($ttcoffees as $key => $ttcoffee) {
            echo '<div class="ttcoffee">';
                echo "<a href='#' data-reveal-id='quick-view-$key'>";
                    echo "<div class='row'>";
                        echo "<div class='small-3 medium-3 large-3 columns logo-wrapper'>";
                            echo '<div class="text-center wrapper-parent">';
                                echo '<div class="thumbnail-wrapper">';
                                    echo "<img src='data:image/jpeg;base64, $ttcoffee->roaster_logo'/>";
                                echo '</div>';
                                echo "<i class='fa fa-search-plus'></i>";
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="small-6 medium-6 large-6 columns" id="TTCpanel">';
                            echo "<h3 class='roaster_name'>$ttcoffee->roaster_name</h3>";
                            echo "<h5 class='coffee_name'>$ttcoffee->coffee_name</h5>";
                            echo "<ul class='TTCList' style='margin-left: 0.1rem;'>";
                                echo '<li><em>Retail Price: </em>';
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
                                echo "<li><em>Green Price:</em> $" . round($ttcoffee->gppp, 2) . " per pound(f.o.b. or equivalent)</li>";
                            echo '</ul>';
                        echo '</div>';
                        echo '<div class="small-3 medium-3 large-3 columns">';
                            echo '<div class="Percent">';
                                echo '<div class="percent-abbrev rotate">EGS</div>';
                                echo "<h3>" . round($ttcoffee->egs, 1) . "%</h3>";
                            echo '</div>';
                            echo '<div class="gppp">';
                                echo '<div class="gppp-abbrev rotate">GPPP</div>';
                                echo "<h3>$" . number_format($ttcoffee->gppp, 2) . "</h3>";
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
                                echo '<li><em>Retail Price: </em>';
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
                                echo "<li><em>Green Price:</em> $" . number_format($ttcoffee->gppp, 2) . " per pound(f.o.b. or equivalent)</li>";
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
                            echo '<div class="small-offset-2 small-8 columns text-center">';
                                echo '<div class="small-6 columns">';
                                    echo "<div class='circle'>" . round($ttcoffee->egs, 1) . "%</div>";
                                echo '</div>';
                                echo '<div class="small-6 columns">';
                                    echo "<div class='square'>$" . number_format($ttcoffee->gppp, 2) . '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<a class="close-reveal-modal" aria-label="Close">&#215;</a>';
                echo '</div>';
            echo '</div>';
        }
    }

    //Quicksort algorithm. Expects either 'gppp' or 'egs' for $type, and 'up' or 'down' for sort
    public function quicksort($array, $type, $sort) {
        if(count($array) < 2) {
            return $array;
        }
        $left = $right = array();
        reset($array);
        $pivot_key  = key($array);
        $pivot  = array_shift($array);
        foreach($array as $k => $v) {
            if ($sort == 'up') {
                if ($v->$type < $pivot->$type)
                    $left[$k] = $v;
                else
                    $right[$k] = $v;
            }
            else if ($sort == 'down') {
                if ($v->$type > $pivot->$type)
                    $left[$k] = $v;
                else
                    $right[$k] = $v;
            }
        }
        return array_merge($this->quicksort($left, $type, $sort), array($pivot_key => $pivot),
                           $this->quicksort($right, $type, $sort));
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

		$mail = new \helpers\phpmailer\mail();
		$mail->setFrom($email);
		$mail->subject('A message for TTC');
		$mail->body($Name ."<br>". $Message);
		$mail->send();

		View::rendertemplate('header', $data);
		View::rendertemplate('contact', $data);
		View::rendertemplate('footer');

	}
}
