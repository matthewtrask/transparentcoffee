<?php

namespace controllers;

use helpers\url;
use helpers\form;
use helpers\paginator;
use helpers\phpmailer\mail;
use core\view;
use core\controller;
use Core\Model;

class ttc extends \core\controller {

	private $_model;

	public function __construct(){
        $this->_model = new \models\ttc();
        $this->_modelblog = new \models\blog\blog();
	}

	public function index() {
		$data['title'] = 'Home';

        $pages = new Paginator('1','page');
        $pages->set_total(count($this->_modelblog->getpoststotal()));
        $data['posts'] = $this->_modelblog->getposts($pages->get_limit());
        $data['page_links'] = $pages->page_links();
        $data['cats'] = $this->_modelblog->getcats();

        $roasters = $this->_model->getLogos();
        $data['roasters'] = $roasters;
        View::rendertemplate('header', $data);
        View::rendertemplate('home', $data);
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

        $ttcoffees = $this->_model->getTTCoffees();
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
//        $model = new \Models\ttc();
        $ttcoffees = $this->_model->getTTCoffees();
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
            $_POST['sort'] = 'GPPP';
        }
        else if ($_POST['sort'] == 'egs') {
            $_POST['sort'] = 'EGS';
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
                if ($_POST['sort'] == 'gppp') {
                    echo '<li class="sort-dropdown"><a>Effective Grower Share</a></li>';
                    echo '<li class="sort-dropdown"><a>Default</a></li>';
                }
                else if ($_POST['sort'] == 'egs') {
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
            case 'GPPP':
                if ($_POST['arrow'] == 'down') {
                    $ttcoffees = $this->quicksort($ttcoffees, 'gppp', 'down');
                }
                else {
                    $ttcoffees = $this->quicksort($ttcoffees, 'gppp', 'up');
                }
                break;
            case 'EGS':
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
                                    echo "<img src='$ttcoffee->roaster_logo'/>";
                                echo '</div>';
                                echo "<i class='fa fa-search-plus'></i>";
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="small-5 medium-6 large-6 columns" id="TTCpanel">';
                            echo "<h3 class='roaster_name'>$ttcoffee->roaster_name</h3>";
                            echo "<h5 class='coffee_name'>$ttcoffee->coffee_name</h5>";
                            echo "<ul class='TTCList' style='margin-left: 0.1rem;'>";
                                echo "<li class='show-for-medium-up'><em>Farm:</em> " . $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country . "</li>";
                                echo '<li class="show-for-medium-up"><em>Retail Price: </em>';
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size . 'ounce bag</li>';
                                echo '<li class="show-for-small-only"><em>Retail Price: </em>';
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size . 'oz</li>';
                                echo "<li><em>Green Price:</em> $" . round($ttcoffee->gppp, 2) . " per pound</li>";
                            echo '</ul>';
                        echo '</div>';
                        echo '<div class="small-4 medium-3 large-3 columns">';
                            echo '<div class="gppp">';
                                echo '<div class="gppp-abbrev rotate">GPPP</div>';
                                echo "<h3>$" . number_format($ttcoffee->gppp, 2) . "</h3>";
                            echo '</div>';
                            echo '<div class="Percent">';
                                echo '<div class="percent-abbrev rotate">EGS</div>';
                                echo "<h3>" . round($ttcoffee->egs, 1) . "%</h3>";
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</a>';
                echo "<div id='quick-view-$key' class='reveal-modal' data-reveal aria-labelledby='modalTitle' aria-hidden='true' role='dialog'>";
                    echo '<div class="row">';
                        echo '<div class="small-12 medium-6 columns">';
                            echo "<div class='show-for-small-only'>";
                                echo "<div class='small-12 columns'><a href=" . $ttcoffee->url . "><img class='quick-view-logo' src='$ttcoffee->roaster_logo'/></a></div>";
                            echo "</div>";
                            echo "<h2 id='modalTitle'>$ttcoffee->roaster_name</h2>";
                            echo "<p class='lead'>$ttcoffee->coffee_name</p>";
                            echo '<ul class="TTCList-popup" style="margin-left: 0.1rem;">';
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
                        echo '<div class="small-12 medium-6 columns">';
                            echo '<div class="row">';
                                echo '<div class="show-for-medium-up medium-offset-2 medium-8 columns">';
                                    echo "<a href='$ttcoffee->url'>";
                                        echo "<img class='quick-view-logo' src='$ttcoffee->roaster_logo'/>";
                                    echo '</a>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="row">';
                                echo '<div class="small-offset-1 small-6 medium-offset-3 medium-5 columns text-center">';
                                    echo '<div class="row">';
                                        echo '<div class="small-2 medium-2 columns">';
                                            echo "<div class='square'>$" . number_format($ttcoffee->gppp, 2) . '</div>';
                                        echo '</div>';
                                        echo '<div class="small-2 medium-2 columns">';
                                            echo "<div class='circle'>" . round($ttcoffee->egs, 1) . "%</div>";
                                        echo '</div>';
                                    echo '</div>';
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

    public function submitRegister() {
        if($_FILES['greenPPP']['size'] > 0)
        {
            $fileName = $_FILES['greenPPP']['name'];
            $tmpName  = $_FILES['greenPPP']['tmp_name'];
            $fileSize = $_FILES['greenPPP']['size'];
            $fileType = $_FILES['greenPPP']['type'];

            $fp      = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);

            if(!get_magic_quotes_gpc())
            {
                $fileName = addslashes($fileName);
            }
        }
        else
        {
            $fileName = NULL;
            $fileSize = NULL;
            $fileType = NULL;
            $content  = NULL;
        }
        $allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
        $max_filesize = 10485760;
        $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/app/templates/default/img_tmp";

        $filename = $_FILES['roasterImage']['name'];
        $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

        if(!in_array($ext,$allowed_filetypes))
            die('The file you attempted to upload is not allowed.');

        if(filesize($_FILES['roasterImage']['tmp_name']) > $max_filesize)
            die('The file you attempted to upload is too large.');

        if(!is_writable($upload_path))
            die('You cannot upload to the specified directory, please CHMOD it to 777.');

        if(move_uploaded_file($_FILES['roasterImage']['tmp_name'],$upload_path . $filename)) {
            $data = file_get_contents($upload_path . $filename);
            $roasterImage = 'data:image/' . substr($ext, 1) . ';base64, ' . base64_encode($data);
            unlink($upload_path . $filename);
        } else {
            echo 'There was an error during the file upload.  Please try again.';
        }

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['submitEmail'];
        $roaster = $_POST['roasterName'];
        $roasterDescription = $_POST['roasterDescription'];
		$roasterURL = $_POST['roasterURL'];
        $coffeeName = $_POST['coffeeName'];
        $coffeeDescription = $_POST['coffeeDescription'];
        $coffeePrice = $_POST['coffeePrice'];
        $coffeeCurrency = $_POST['coffeeCurrency'];
        $coffeeWebsite = $_POST['coffeeWebsite'];
        $bagSize = $_POST['coffeeBagSize'];
        $coffeeGPPP = $_POST['coffeeGPPP'];
        $farmName = $_POST['farmName'];
        $farmLocation = $_POST['farmLocation'];
        $farmRegion = $_POST['farmRegion'];

        $cleanFirstName = filter_var($firstName, FILTER_SANITIZE_STRING);
        $cleanLastName = filter_var($lastName, FILTER_SANITIZE_STRING);
        $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        $cleanRoaster = filter_var($roaster, FILTER_SANITIZE_STRING);
        $cleanRoasterDesc = filter_var($roasterDescription, FILTER_SANITIZE_STRING);
		$cleanRoasterURL = filter_var($roasterURL, FILTER_SANITIZE_URL);
        $cleanCoffeeName = filter_var($coffeeName, FILTER_SANITIZE_STRING);
        $cleanCoffeeDesc = filter_var($coffeeDescription, FILTER_SANITIZE_STRING);
        $cleanCoffeePrice = filter_var($coffeePrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $cleanCoffeeCurrency = filter_var($coffeeCurrency, FILTER_SANITIZE_STRING);
        $cleanBagSize = filter_var($bagSize, FILTER_SANITIZE_NUMBER_INT);
        $cleanCoffeeGPPP = filter_var($coffeeGPPP, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
        $cleanCoffeeWebsite = filter_var($coffeeWebsite, FILTER_VALIDATE_URL);
        $cleanFarmName = filter_var($farmName, FILTER_SANITIZE_STRING);
        $cleanFarmLocation = filter_var($farmLocation, FILTER_SANITIZE_STRING);
        $cleanFarmRegion = filter_var($farmRegion, FILTER_SANITIZE_STRING);

        $contact = array(
            'first_name'   => $cleanFirstName,
            'last_name'    => $cleanLastName,
            'email'        => $cleanEmail
        );
        $this->_model->insertContact($contact);
        $contactId = $this->_model->getLastId();

        $pendingGrower = array(
            'farm_name'    => $cleanFarmName,
            'farm_country' => $cleanFarmLocation,
            'farm_region'  => $cleanFarmRegion
        );
        $this->_model->insertPendingGrower($pendingGrower);
        $growerId = $this->_model->getLastId();

        $pendingRoaster = array(
            'contact_id'          => $contactId,
            'roaster_name'        => $cleanRoaster,
            'roaster_logo'        => $roasterImage,
            'roaster_description' => $cleanRoasterDesc,
			'roasterURL'		  => $cleanRoasterURL
        );
        $this->_model->insertPendingRoaster($pendingRoaster);
        $roasterId = $this->_model->getLastId();

        $egs = $cleanCoffeeGPPP / ($cleanCoffeePrice / $cleanBagSize * 16 * .85);
        $pendingCoffee = array(
            'grower_id'         => $growerId,
            'roaster_id'        => $roasterId,
            'coffee_name'       => $cleanCoffeeName,
            'description'       => $cleanCoffeeDesc,
            'retail_price'      => $cleanCoffeePrice,
            'currency'          => $cleanCoffeeCurrency,
            'bag_size'          => $cleanBagSize,
            'gppp'              => $cleanCoffeeGPPP,
            'egs'               => $egs,
            'gppp_confirmation' => $content,
            'file_name'         => $fileName,
            'file_type'         => $fileType,
            'file_size'         => $fileSize,
            'url'               => $cleanCoffeeWebsite
        );
        $this->_model->insertPendingCoffee($pendingCoffee);

        header('Location: admin/pending');

    }

    public function thankyou() {
        $data['title'] = 'Thank You';

        View::rendertemplate('header', $data);
        View::rendertemplate('thankyou');
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

//        $model = new \Models\ttc();
        $data['roasters'] = $this->_model->getRoasters();
        View::rendertemplate('header', $data);
        View::rendertemplate('roasters', $data);
        View::rendertemplate('footer');
	}

	public function contact() {

        // FIX THIS
		$data['title'] = 'Contact';

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $cleanName = filter_var($name, FILTER_SANITIZE_STRING);
        $cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
        $cleanMsg = filter_var($message, FILTER_SANITIZE_STRING);

		$mail = new \helpers\phpmailer\mail();
		$mail->setFrom($cleanEmail);
        $mail->addAddress('bgoebel@emory.edu');
		$mail->subject('A message for TTC');
		$mail->body($cleanName ."<br>". $cleanMessage);

        if(!empty($cleanName) && !empty($cleanEmail) && !empty($cleanMsg)){
            $mail->send();
        } else {
            //echo "<div class='alert'>Sorry, there was an error, please try again in just a few minutes</div>";
        }

		View::rendertemplate('header', $data);
		View::rendertemplate('contact', $data);
		View::rendertemplate('footer');

	}
}
