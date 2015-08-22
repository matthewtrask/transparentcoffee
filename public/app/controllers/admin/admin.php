<?php namespace controllers\admin;

use \helpers\session;
use \helpers\form;
use	\helpers\url;
use \core\model;
use	\core\view;
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

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
		$allCoffee = $this->_adminModel->getCoffeeCount();
		$approvedCoffee = $this->_adminModel->getApprovedCoffee();
		$pendingCoffee = $this->_adminModel->getPendingCoffee();
		$archivedCoffee = $this->_adminModel->getArchiveCoffee();

		$data['allCoffee'] = $allCoffee;
		$data['approvedCoffee'] = $approvedCoffee;
		$data['pendingCoffee'] = $pendingCoffee;
		$data['archivedCoffee'] = $archivedCoffee;

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
			$allowed_filetypes = array('jpg', 'jpeg', 'png', 'gif');
			$max_filesize = 10485760;
			$upload_path = $_SERVER['DOCUMENT_ROOT'] . "/app/templates/default/img_tmp";

			$imageName = $_FILES['roasterImage']['name'];
			$ext = pathinfo($imageName, PATHINFO_EXTENSION);

			if (!in_array($ext, $allowed_filetypes))
				die('The file you attempted to upload is not allowed.');

//			if (filesize($_FILES['roasterImage']['tmp_name']) > $max_filesize)
//				die('The file you attempted to upload is too large.');

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
			if (isset($_POST['roasterDescription'])) {
				$roasterDescription = $_POST['roasterDescription'];
			} else { $roasterDescription = NULL;}
            if ($parts = parse_url($_POST["roasterWebsite"])) {
                if (!isset($parts["scheme"])) {
					$roasterURL = "http://" . $_POST["roasterWebsite"];
                }
            }
			if (isset($roasterURL)) {
				$roasterURL = $_POST['roasterURL'];
			} else {$roasterURL = NULL;}
            $existingRoaster = NULL;
        }
        else {
            $existingRoaster = $_POST['existingRoaster'];
        }
		$coffeeName = $_POST['coffeeName'];
		if (isset($_POST['coffeeDescription'])) {
			$coffeeDescription = $_POST['coffeeDescription'];
		} else {$coffeeDescription = NULL;}
		$coffeePrice = $_POST['coffeePrice'];
		$coffeeCurrency = $_POST['coffeeCurrency'];
		if (isset($_POST["coffeeWebsite"])) {
			if ($parts = parse_url($_POST["coffeeWebsite"])) {
				if (!isset($parts["scheme"])) {
					$_POST["coffeeWebsite"] = "http://" . $_POST["coffeeWebsite"];
				}
			}
			$coffeeWebsite = $_POST['coffeeWebsite'];
		} else {$coffeeWebsite = NULL;}
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
                'roaster_description' => filter_var($roasterDescription, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE),
                'roaster_url' => filter_var($roasterURL, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE)
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
			'description'  => filter_var($coffeeDescription, FILTER_SANITIZE_STRING, FILTER_NULL_ON_FAILURE ),
			'retail_price' => filter_var($coffeePrice, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION),
			'currency' 	   => filter_var($coffeeCurrency, FILTER_SANITIZE_STRING),
			'bag_size' 	   => filter_var($bagSize, FILTER_SANITIZE_NUMBER_INT),
			'gppp'         => filter_var($coffeeGPPP, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ),
            'egs'          => filter_var($coffeeEGS, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION ),
			'url'          => filter_var($coffeeWebsite, FILTER_VALIDATE_URL, FILTER_NULL_ON_FAILURE),
		);
        if (isset($fileName)) {
            $coffee['file_name'] = $fileName;
            $coffee['file_type'] = $fileType;
            $coffee['file_size'] = $fileSize;
        }
        if (isset($existingRoaster)) {
			$oldRoasterId = $this->_ttcModel->getPendingRoasterIdFromCoffeeId($_POST['coffeeId']);
            $coffee['roaster_id'] = $existingRoaster;
        }

		$grower = array (
			'farm_name'    => filter_var($farmName, FILTER_SANITIZE_STRING),
			'farm_country' => filter_var($farmLocation, FILTER_SANITIZE_STRING),
			'farm_region'  => filter_var($farmRegion, FILTER_SANITIZE_STRING)
		);
        if ($_POST['updateType'] == 'pending') {
            if (isset($existingRoaster)) {
				$pendingCoffeesWithSameRoaster = $this->_adminModel->getPendingRoasterCount($oldRoasterId);
				$this->_adminModel->removePendingRoaster($oldRoasterId);
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
			//updates all coffees to have the newly switched to roaster
			if ($existingRoaster) {
				foreach ($pendingCoffeesWithSameRoaster as $pendingCoffee) {
					$this->_ttcModel->updateRoasterIdForCoffee($pendingCoffee->coffee_id, $coffee['roaster_id'], 'pending');
				}
			}
        }
        else if ($_POST['updateType'] == 'active') {
            if (isset($existingRoaster)) {
				$oldRoasterId = $this->_ttcModel->getActiveRoasterIdFromCoffeeId($_POST['coffeeId']);
				$activeCoffeesWithSameRoaster = $this->_adminModel->getActiveRoasterCount($oldRoasterId);
				$this->_adminModel->removeActiveRoaster($oldRoasterId);
				$this->_adminModel->copyPendingRoaster($existingRoaster, 'active');
            }
            $this->_ttcModel->activeUpdate($_POST['coffeeId'], $contact, $roaster, $coffee, $grower);
			if ($existingRoaster) {
				foreach ($activeCoffeesWithSameRoaster as $pendingCoffee) {
					$this->_ttcModel->updateRoasterIdForCoffee($pendingCoffee->coffee_id, $coffee['roaster_id'], 'active');
				}
			}
        }
        else if ($_POST['updateType'] == 'archive') {
            if (isset($existingRoaster)) {
				$oldRoasterId = $this->_ttcModel->getArchiveRoasterIdFromCoffeeId($_POST['coffeeId']);
				$archiveCoffeesWithSameRoaster = $this->_adminModel->getArchiveRoasterCount($oldRoasterId);
				$this->_adminModel->removeArchiveRoaster($oldRoasterId);
				$this->_adminModel->copyPendingRoaster($existingRoaster, 'archive');
            }
            $this->_ttcModel->archiveUpdate($_POST['coffeeId'], $contact, $roaster, $coffee, $grower);
			if ($existingRoaster) {
				foreach ($archiveCoffeesWithSameRoaster as $pendingCoffee) {
					$this->_ttcModel->updateRoasterIdForCoffee($pendingCoffee->coffee_id, $coffee['roaster_id'], 'archive');
				}
			}
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
		$html    = $_POST['html'];
		$address = $_POST['address'];
		$coffee  = $_POST['coffee'];
		$roasterImage = $_POST['roaster_image'];
		$pos = strpos($roasterImage, ';');
		$type = explode(':', substr($roasterImage, 0, $pos))[1];
		$img = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $roasterImage));

		$mail = new \PHPMailer(true);
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->Username = "team@transparenttradecoffee.org";
		$mail->Password = "Emory2015";

		$mail->From = "team@transparenttradecoffee.com";
		$mail->FromName = "TT Coffee Team";
		$mail->addAddress($address);
		$mail->addReplyTo("team@transparenttradecoffee.org", 'Transparent Trade Coffee');
		$mail->isHTML(true);
		$mail->Body = $html;
		$mail->AltBody = 'Please use an HTML viewer for this email';
		$mail->Subject = "TT Coffee Registration Received > Please Confirm Details for $coffee";
		$mail->addStringEmbeddedImage($img, 'roaster_logo', '', 'base64', $type);
		if (!$mail->send()) {
			echo "There was a problem with sending this email";
		}

		header('Location: /admin/pending');

	}

	public function activeEmail(){
		$html    = $_POST['html'];
		$address = $_POST['address'];
		$coffee  = $_POST['coffee'];

		$mail = new \PHPMailer(true);
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->Username = "team@transparenttradecoffee.org";
		$mail->Password = "Emory2015";

		$mail->From = "team@transparenttradecoffee.org";
		$mail->FromName = "TT Coffee Team";
		$mail->addAddress($address);
		$mail->addReplyTo("team@transparenttradecoffee.org", 'Transparent Trade Coffee');
		$mail->isHTML(true);
		$mail->Body = $html;
		$mail->AltBody = 'Please use an HTML viewer for this email';
		$mail->Subject = "TT Coffee Registration Posted > Congrats $coffee Now Online";
		if (!$mail->send()) {
			echo "There was a problem with sending this email";
		}

		header('Location: /admin/pending');

	}

	public function archiveEmail(){
		$html    = $_POST['html'];
		$address = $_POST['address'];
		$coffee  = $_POST['coffee'];

		$mail = new \PHPMailer(true);
		$mail->IsSMTP();
		$mail->SMTPSecure = 'ssl';
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;
		$mail->Port = 465;
		$mail->Username = "team@transparenttradecoffee.org";
		$mail->Password = "Emory2015";

		$mail->From = "team@transparenttradecoffee.com";
		$mail->FromName = "TT Coffee Team";
		$mail->addAddress($address);
		$mail->addReplyTo("team@transparenttradecoffee.org", 'Transparent Trade Coffee');
		$mail->isHTML(true);
		$mail->Body = $html;
		$mail->AltBody = 'Please use an HTML viewer for this email';
		$mail->Subject = "TT Coffee Archived > $coffee Removed from Site";
		if (!$mail->send()) {
			echo "There was a problem with sending this email";
		}

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
