<?php namespace controllers\admin;

use \helpers\session;
use \helpers\form;
use	\helpers\url;
use \helpers\phpmailer\mail;
use \core\model;
use	\core\view;

class Admin extends \core\controller
{

	private $_adminModel;
    private $_ttcModel;

	public function __construct()
	{
		$this->_adminModel = new \models\admin\registration();
        $this->_ttcModel   = new \models\ttc();

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

		$ttcPending = $this->_adminModel->getTTCoffees();
		$ttcArchive = $this->_adminModel->getArchiveTTCoffees();
		$ttcActive = $this->_adminModel->getActiveTTCoffees();
		$data['ttcPending'] = $ttcPending;
		$data['ttcActive'] = $ttcActive;
		$data['ttcArchive'] = $ttcArchive;
		
		View::renderadmintemplate('header', $data);
		View::render('admin/pending', $data);
		View::renderadmintemplate('footer', $data);
	
	}

    public function pendingAjax()
	{

        foreach ($_POST as $approvedCoffeeId) {
            $this->_ttcModel->approveCoffee($approvedCoffeeId);
        }


        header('Location: /admin/pending');
    }

	public function rejectAjax()
	{

		foreach ($_POST as $rejectedCoffeeId) {
			$this->_ttcModel->rejectCoffee($rejectedCoffeeId);
		}


		header('Location: /admin/pending');
	}

	public function archiveAjax(){

		foreach($_POST as $archivedCoffeeId){
			$this->_ttcModel->archiveCoffee($archivedCoffeeId);
		}

		header('Location: /admin/pending');
	}

	public function activeAjax(){

		foreach($_POST as $activeCoffeeId){
			$this->_ttcModel->activeCoffee($activeCoffeeId);
		}

		header('Location: /admin/pending');
	}

	public function submitUpdate() {
		if($_FILES['greenPPP']['size'] > 0)
		{
			$fileName = rand(1000,100000)."-".$_FILES['greenPPP']['name'];
			$tmpName  = $_FILES['greenPPP']['tmp_name'];
			$fileSize = $_FILES['greenPPP']['size'];
			$fileType = $_FILES['greenPPP']['type'];
			$fileUploadPath = $_SERVER['DOCUMENT_ROOT'] . "/app/uploads/";

			move_uploaded_file($tmpName, $fileUploadPath.$fileName);

			$fileName = addslashes($fileName);
		}
		else
		{
			$fileName = NULL;
			$fileSize = NULL;
			$fileType = NULL;
		}
		if (($_FILES['roasterImage']['name'] != '')&&(isset($_FILES['roasterImage']['name']))) {
			$allowed_filetypes = array('.jpg', '.jpeg', '.png', '.gif');
			$max_filesize = 10485760;
			$upload_path = $_SERVER['DOCUMENT_ROOT'] . "/app/templates/default/img_tmp";

			$imageName = $_FILES['roasterImage']['name'];
			$ext = substr($imageName, strpos($imageName, '.'), strlen($imageName) - 1);

			if (!in_array($ext, $allowed_filetypes))
				die('The file you attempted to upload is not allowed.');

			if (filesize($_FILES['roasterImage']['tmp_name']) > $max_filesize)
				die('The file you attempted to upload is too large.');

			if (!is_writable($upload_path))
				die('You cannot upload to the specified directory, please CHMOD it to 777.');

			if (move_uploaded_file($_FILES['roasterImage']['tmp_name'], $upload_path . '/' . $imageName)) {
				$data = file_get_contents($upload_path . '/' . $imageName);
				$roasterImage = 'data:image/' . substr($ext, 1) . ';base64, ' . base64_encode($data);
				unlink($upload_path . '/' . $imageName);
			} else {
				echo 'There was an error during the file upload.  Please try again.';
			}
		}
		else {
			$roasterImage = NULL;
		}

		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
		$email = $_POST['submitEmail'];
        if ($_POST['roasterName']) {
            $roaster = $_POST['roasterName'];
            $roasterDescription = $_POST['roasterDescription'];
            if ($parts = parse_url($_POST["roasterWebsite"])) {
                if (!isset($parts["scheme"])) {
                    $_POST["roasterWebsite"] = "http://" . $_POST["roasterWebsite"];
                }
            }
            $roasterURL = $_POST['roasterURL'];
            $existingRoaster = NULL;
        }
        else {
            $existingRoaster = $_POST['existingRoaster'];
        }
		$coffeeName = $_POST['coffeeName'];
		$coffeeDescription = $_POST['coffeeDescription'];
		$coffeePrice = $_POST['coffeePrice'];
		$coffeeCurrency = $_POST['coffeeCurrency'];
		if ( $parts = parse_url($_POST["coffeeWebsite"]) ) {
			if ( !isset($parts["scheme"]) )
			{
				$_POST["coffeeWebsite"] = "http://" . $_POST["coffeeWebsite"];
			}
		}
		$coffeeWebsite = $_POST['coffeeWebsite'];
		$bagSize = $_POST['coffeeBagSize'];
		$coffeeGPPP = $_POST['coffeeGPPP'];
        $coffeeEGS = $_POST['coffeeEGS'];
		$farmName = $_POST['farmName'];
		$farmLocation = $_POST['farmLocation'];
		$farmRegion = $_POST['farmRegion'];

		$contact = array (
			'first_name' => filter_var($firstName, FILTER_SANITIZE_STRING),
			'last_name'  => filter_var($lastName, FILTER_SANITIZE_STRING),
			'email'      => filter_var($email, FILTER_SANITIZE_EMAIL)
		);
        if (!isset($existingRoaster)) {
            $roaster = array(
                'roaster_name' => filter_var($roaster, FILTER_SANITIZE_STRING),
                'roaster_description' => filter_var($roasterDescription, FILTER_SANITIZE_STRING),
                'roaster_url' => filter_var($roasterURL, FILTER_SANITIZE_URL)
            );
            if (isset($roasterImage)) {
                $roaster['roaster_logo'] = $roasterImage;
            }
        }
        else {
            $roaster = NULL;
        }

		$coffee = array (
			'coffee_name'  => filter_var($coffeeName, FILTER_SANITIZE_STRING),
			'description'  => filter_var($coffeeDescription, FILTER_SANITIZE_STRING),
			'retail_price' => filter_var($coffeePrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
			'currency' 	   => filter_var($coffeeCurrency, FILTER_SANITIZE_STRING),
			'bag_size' 	   => filter_var($bagSize, FILTER_SANITIZE_NUMBER_INT),
			'gppp'         => filter_var($coffeeGPPP, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ),
            'egs'          => filter_var($coffeeEGS, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ),
			'url'          => filter_var($coffeeWebsite, FILTER_VALIDATE_URL),
		);
        if (isset($fileName)) {
            $coffee['file_name'] = $fileName;
            $coffee['file_type'] = $fileType;
            $coffee['file_size'] = $fileSize;
        }
        if (isset($existingRoaster)) {
            $oldRoasterId = $coffee['roaster_id'];
            $coffee['roaster_id'] = $existingRoaster;
        }

		$grower = array (
			'farm_name'    => filter_var($farmName, FILTER_SANITIZE_STRING),
			'farm_country' => filter_var($farmLocation, FILTER_SANITIZE_STRING),
			'farm_region'  => filter_var($farmRegion, FILTER_SANITIZE_STRING)
		);
        if ($_POST['updateType'] == 'pending') {
            if (isset($existingRoaster)) {
                $newRoasterId = $this->_adminModel->copyPendingRoaster($existingRoaster, 'pending');
                if ($newRoasterId) {
                    $coffee['roaster_id'] = $newRoasterId;
                }
                else {
                    $roasterName = $this->_ttcModel->getRoasterName($existingRoaster);
                    $coffee['roaster_id'] = $this->_ttcModel->getPendingRoasterId($roasterName);
                }
            }
            $this->_ttcModel->pendingUpdate($_POST['coffeeId'], $contact, $roaster, $coffee, $grower);
            if (isset($existingRoaster)) {
                $this->_adminModel->removePendingRoaster($oldRoasterId);
            }
        }
        else if ($_POST['updateType'] == 'active') {
            if (isset($existingRoaster)) {
                $this->_adminModel->copyPendingRoaster($existingRoaster, 'active');
            }
            $this->_ttcModel->activeUpdate($_POST['coffeeId'], $contact, $roaster, $coffee, $grower);
        }
        else if ($_POST['updateType'] == 'archive') {
            if (isset($existingRoaster)) {
                $this->_adminModel->copyPendingRoaster($existingRoaster, 'archive');
            }
            $this->_ttcModel->archiveUpdate($_POST['coffeeId'], $contact, $roaster, $coffee, $grower);
        }

        header('Location: admin/pending');
    }

    public function roasterAjax() {
        $roasters = $this->_adminModel->getAllRoasters();
        ?>
        <div class="row">
            <div class="small-3 medium-3 large-3 columns">
                <label for="existingRoaster" class="inline">Existing Roaster:</label>
            </div>
            <div class="small-9 medium-9 large-9 columns">
                <select name="existingRoaster" class="regInput" id="existingRoaster" required>
                    <?php foreach ($roasters as $roaster) {
                        echo '<option value="'. $roaster->roaster_id . '">' . $roaster->roaster_name . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }

	public function pendingEmail(){
//		$title = $_POST['title'];
		$html    = $_POST['html'];
		$address = $_POST['address'];
		$coffee  = $_POST['coffee'];
//		$line1 = $_POST['line1'];
//		$line2 = $_POST['line2'];
//		$line3 = $_POST['line3'];
//		$line4 = $_POST['line4'];
//		$line5 = $_POST['line5'];
//		$line6 = $_POST['line6'];
//		$line7 = $_POST['line7'];
//		$line8 = $_POST['line8'];
//		$line9 = $_POST['line9'];
//		$line10 = $_POST['line10'];
//		$line11 = $_POST['line11'];
//		$line12 = $_POST['line12'];
//		$line13 = $_POST['line13'];
//		$line14 = $_POST['line14'];
//		$line15 = $_POST['line15'];
//		$line16 = $_POST['line16'];
//		$line17 = $_POST['line17'];
//		$line18 = $_POST['line18'];
//		$line19 = $_POST['line19'];

		$mail = new \helpers\phpmailer\mail();
		$mail->setFrom('team@transparenttradecoffee.com');
		$mail->addAddress($address);
		$mail->addReplyTo('team@transparenttradecoffee.com', 'Transparent Trade Coffee');
		$mail->isHTML(true);
		$mail->subject("Registration Received > Please Confirm Details for $coffee");
//		$mail->body($title."<br>".$line1."<br>".$line2."<br>".$line4."<br>".$line5."<br>".$line6."<br>".$line7."<br>".$line8."<br>".$line9."<br>".$line10."<br>".$line11."<br>".$line12."<br>".$line13."<br>".$line14."<br>".$line15."<br>".$line16."<br>".$line17."<br>".$line18."<br>".$line19);
		$mail->body($html);
		$mail->send();

		header('Location: /admin/pending');

	}

	public function activeEmail(){
		$html    = $_POST['html'];
		$address = $_POST['address'];
		$coffee  = $_POST['coffee'];
//		$title = $_POST['title'];
//		$address = $_POST['address'];
//		$line1 = $_POST['field1'];
//		$line2 = $_POST['field2'];
//		$line3 = $_POST['field3'];
//		$line4 = $_POST['field4'];

		$mail = new \helpers\phpmailer\mail();
		$mail->setFrom('team@transparenttradecoffee.com');
		$mail->addAddress($address);
		$mail->addReplyTo('team@transparenttradecoffee.com', 'Transparent Trade Coffee');
		$mail->isHTML(true);
		$mail->subject("Registration Posted > Congrats $coffee Now Online");
//		$mail->body($title."<br>".$line1."<br>".$line2."<br>".$line3);
		$mail->body($html);
		$mail->send();


		header('Location: /admin/pending');

	}

	public function archiveEmail(){
		$html    = $_POST['html'];
		$address = $_POST['address'];
		$coffee  = $_POST['coffee'];
//		$title = $_POST['title'];
//		$address = $_POST['address'];
//		$line1 = $_POST['line1'];
//		$line2 = $_POST['line2'];
//		$line3 = $_POST['line3'];
//		$line4 = $_POST['line4'];
//		$line5 = $_POST['line5'];
//		$line6 = $_POST['line6'];
//		$line7 = $_POST['line7'];
//		$line8 = $_POST['line8'];
//		$line9 = $_POST['line9'];
//		$line10 = $_POST['line10'];
//		$line11 = $_POST['line11'];
//		$line12 = $_POST['line12'];
//		$line13 = $_POST['line13'];
//		$line14 = $_POST['line14'];
//		$line15 = $_POST['line15'];
//		$line16 = $_POST['line16'];
//		$line17 = $_POST['line17'];
//		$line18 = $_POST['line18'];
//		$line19 = $_POST['line19'];

		$mail = new \helpers\phpmailer\mail();
		echo "<pre>";
		var_dump($mail);
//		$mail->isSMTP();
//		$mail->SMTPAuth   = true;

//		$mail->Host = 'smtp.gmail.com';
//		$mail->Port = 587;
//		$mail->Username = "jrector15@gmail.com";
//		$mail->Password   = "200145942";
//		$mail->SMTPSecure = 'tls';
		$mail->setFrom("team@transparenttradecoffee.com");
		$mail->addAddress($address);
		$mail->addReplyTo('team@transparenttradecoffee.com', 'Transparent Trade Coffee');
//		$mail->addReplyTo("jrector15@gmail.com");
		$mail->isHTML(true);
		$mail->subject("Coffee Archived > $coffee Removed from Site");
//		$mail->body($title."<br>".$line1."<br>".$line2."<br>".$line4."<br>".$line5."<br>".$line6."<br>".$line7."<br>".$line8."<br>".$line9."<br>".$line10."<br>".$line11."<br>".$line12."<br>".$line13."<br>".$line14."<br>".$line15."<br>".$line16."<br>".$line17."<br>".$line18."<br>".$line19);
		$mail->body($html);
		var_dump($mail);
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
		else {
			echo '1';
		}
		exit();

		header('Location: /admin/pending');

	}

	

    public function gppProof()
    {
		if(isset($_GET['id']))
        {
            // if id is set then get the file with the id from database

            $id    = $_GET['id'];

            $result   = $this->_adminModel->getPendingFileInfo($id);
            $fileSize = $result->file_size;
            $fileType = $result->file_type;
            $fileName = $result->file_name;
			$fileUrl = $_SERVER['DOCUMENT_ROOT'] . '/app/uploads/' . $fileName;

			header("Content-Description: File Transfer");
			header("Content-Type: $fileType");
			header("Content-Disposition: attachment; filename=\"".explode('-',$fileName)[1]."\";");
			header("Content-Transfer-Encoding: binary");
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header("Content-Length: $fileSize");
			ob_clean();
			flush();
            readfile(urldecode($fileUrl));
			exit;
        }
    }



}
