<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 6/10/15
 * Time: 8:14 PM
 */
?>

<div class="img-overlay-2">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/red-beans-cropped.jpg'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>"></noscript>
    <div class="text-wrapper">
        <h2 class="image-text">Register</h2>
    </div>
</div>
<div style="height: 20px">

</div>

<div class="row">
    <div class="small-offset-1 small-10 columns">
        <p class="light-font-smaller">Currently, only single-origin coffees sold through direct trade or near direct trade
            channels can be featured on the Transparent Trade Coffee website.</p>
    </div>
</div>
<div style="height: 20px">

</div>

<div class="row">
    <div class="small-2 medium-2 large-2 columns">

    </div>
    <div class="small-8 medium-8 large-8 small-centered medium-centered large-centered columns light-font-smaller">
        <form id="registrationForm" action="submitRegister" method="POST" data-abide enctype="multipart/form-data">
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="firstName" class="inline">Your First Name:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="firstName" class="regInput" type="text" placeholder="Your First Name" for="firstName" id="firstName" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="lastName" class="inline">Your Last Name:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="lastName" class="regInput" type="text" placeholder="Your Last Name" for="lastName" id="lastName" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="submitEmail" class="inline">Your Email:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="submitEmail" class="regInput" type="text" placeholder="Your Email" for="submitEmail" id="submitEmail" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="roasterName" class="inline">Roaster Name:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="roasterName" class="regInput" type="text" placeholder="Roaster Name" for="roasterName" id="roasterName" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="roasterDescription" class="inline">Roaster Description:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <textarea name="roasterDescription" placeholder="Enter a short description about the roaster (Maximum of 140 characters)" maxlength="140" onKeyDown="charLimiti(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
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
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeeName" class="inline">Coffee Name:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="coffeeName" class="regInput" type="text" placeholder="Coffee Name" for="coffeeName" id="coffeeName" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeeDescription" class="inline">Coffee Description:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <textarea name="coffeeDescription" placeholder="Enter a short description about your coffee (Maximum of 140 characters)" maxlength="140" onKeyDown="charLimiti(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeePrice" class="inline">Retail Price</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="coffeePrice" class="regInput" type="text" placeholder="Retail Price" for="coffeePrice" id="coffeePrice" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeeCurrency" class="inline">Currency:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="coffeeCurrency" class="regInput" type="text" placeholder="Curency the retail price is in (USD, CDN, etc.)" for="coffeeCurrency" id="coffeeCurrency" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeeBagSize" class="inline">Coffee Bag Size (oz):</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="coffeeBagSize" class="regInput" type="text" placeholder="Coffee Bag Size (oz)" for="coffeeBagSize" id="coffeeBagSize" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeeGPPP" class="inline">Coffee Green Price Per Pound Paid:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="coffeeGPPP" class="regInput" type="text" placeholder="Amount (in USD) that farmers receive pound" for="coffeeGPPP" id="coffeeGPPP" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="coffeeWebSite" class="inline">URL:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="coffeeWebSite" class="regInput" type="text" placeholder="Website you would like to link to for this coffee" for="coffeeWebSite" id="coffeeWebSite" required>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="farmName" class="inline">Farm Name:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="farmName" class="regInput" type="text" placeholder="Farm Name" for="farmName" id="farmName" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="farmLocation" class="inline">Farm Country:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <input name="farmLocation" class="regInput" type="text" placeholder="Farm Country" for="farmLocation" id="farmLocation" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 medium-3 large-3 columns">
                    <label for="farmRegion" class="inline">Farm Region:</label>
                </div>
                <div class="small-9 medium-9 large-9 columns">
                    <select name="farmRegion" class="regInput" id="farmRegion" required>
                        <option>South America</option>
                        <option>Central America</option>
                        <option>Africa</option>
                        <option>Middle East</option>
                        <option>Pacific</option>
                        <option>Other</option>
                    </select>
                </div>
            </div><hr/>
                <div class="row">
                <div class="small-5 medium-5 large-5 columns">
                    <label for="greenPPP" class="inline">Proof of Green Price Per Pound paid to farm or cooperative</label>
                </div>
                <div class="small-7 medium-7 large-7 columns">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                    <input name="greenPPP" class="regInput" type="file" placeholder="greenPPP" for="greenPPP" id="greenPPP">
                </div>
            </div>
            <div class="small-offset-2 small-8 medium-8 large-8 columns">
                <input id="registrationSubmit" type="submit" value="Submit" class="button expand white-button">
            </div>
        </form>
    </div>
    <div class="small-2 medium-2 large-2">

    </div>
</div>
<script type="text/javascript">
    function charLimit(limitField, limitCount, limitNum) {
    if (limitField.value.length > limitNum) {
      limitField.value = limitField.value.substring(0, limitNum);
    } else {
      limitCount.value = limitNum - limitField.value.length;
       }
    }
    function CheckFileName() {
        var fileName = document.getElementById("uploadFile").value
        if (fileName == "") {
            alert("Browse to upload a valid File with png extension");
            return false;
        }
        else if (fileName.split(".")[1].toUpperCase() == "PNG")
            return true;
        else {
            alert("File with " + fileName.split(".")[1] + " is invalid. Upload a validfile with png extensions");
            return false;
        }
        return true;
    }
</script>
