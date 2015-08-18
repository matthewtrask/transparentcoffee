<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 6/10/15
 * Time: 8:14 PM
 */
?>
<div class="img-overlay-2">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/red-beans-cropped-quarter.jpg'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/red-beans-slim.jpg'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>"></noscript>
    <div class="text-wrapper">
        <h2 class="image-text">Register</h2>
    </div>
</div>
<div style="height: 20px">

</div>

<div class="row">
    <div class="small-12 medium-offset-1 medium-10 columns">
        <p class="light-font-smaller">Currently, only single-origin coffees sold through direct trade or near direct trade
            channels can be featured on the Transparent Trade Coffee website.</p>
    </div>
</div>
<div style="height: 20px">

</div>
<div class="row" id="regForm">
    <div class="small-12 medium-12 large-12 columns">

    </div>
</div>

<div class="row">

    <div class="small-12 small-centered medium-10 medium-offset-1 columns light-font-smaller">



        <form id="registrationForm" action="submitRegister" method="POST" data-abide enctype="multipart/form-data">
            <div class="row">
                <h3 class="sub-header">Roaster</h3>
                <div class="small-4 medium-3 large-3 columns">
                    <label for="firstName" class="inline">Your First Name:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <input name="firstName" class="regInput" type="text" placeholder="Your First Name" for="firstName" id="firstName" required>
                    <small class="error">Please enter a valid first name</small>
                </div>
            </div>
            <div class="row">
                <div class="small-4 medium-3 large-3 columns">
                    <label for="lastName" class="inline">Your Last Name:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <input name="lastName" class="regInput" type="text" placeholder="Your Last Name" for="lastName" id="lastName" required>
                    <small class="error">Please enter a valid last name</small>
                </div>
            </div>
            <div class="row">
                <div class="small-4 medium-3 large-3 columns">
                    <label for="submitEmail" class="inline">Your Email:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <input name="submitEmail" class="regInput" type="text" placeholder="Your Email" for="submitEmail" id="submitEmail" required pattern="email">
                    <small class="error">Please enter a valid email</small>
                </div>
            </div>
            <div class="row">
                <div class="small-4 medium-3 large-3 columns">
                    <label for="roasterName" class="inline">Roaster Name:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <input name="roasterName" class="regInput" type="text" placeholder="Roaster Name" for="roasterName" id="roasterName" required>
                    <small class="error">Please enter a valid roaster name</small>
                </div>
            </div>
            <div class="row">
                <div class="small-4 medium-3 large-3 columns">
                    <label for="roasterDescription" class="inline">Roaster Description:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <textarea name="roasterDescription" placeholder="Enter a short description about the roaster (Maximum of 140 characters)" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
                </div>
            </div>
            <div class="row">
                <div class="small-4 medium-3 large-3 columns">
                    <label for="roasterURL" class="inline">Roaster Website:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <input name="roasterURL" class="regInput" type="text" placeholder="Roaster Website Home URL" for="roasterURL" id="roasterURL">
                    <small class="error">Please enter a valid roaster website</small>
                </div>
            </div>
            <div class="row">
                <div class="small-4 medium-3 large-3 columns">
                    <label for="roasterImage" class="inline">Roaster Logo:</label>
                </div>
                <div class="small-8 medium-9 large-9 columns">
                    <input name="roasterImage" class="regInput" type="file" for="roasterImage"  id="roasterImage">
                    <small class="error">Please attach a valid roaster logo</small>
                </div>
                <div class="small-12 columns" style="margin-top: -15px;">
                    &nbsp;&nbsp;<small><i>*Note: Description, website, and logo are not required for roasters who have previously registered coffees with us.</i></small>
                </div>
            </div>
<!--            <div class="row">-->
<!--                <div class="small-12 columns">-->
<!--                    <small><i>*Note: A logo is not required for roasters who have previously registered coffees with us.</i></small>-->
<!--                </div>-->
<!--            </div>-->
            <hr />
            <div id="coffee-1">
                <div class="row">
                    <h3 class="sub-header">Coffee #1</h3>
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="coffeeName" class="inline">Coffee Name:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="coffeeName" class="regInput" type="text" placeholder="Coffee Name" for="coffeeName" id="coffeeName" required>
                        <small class="error">Please enter a valid coffee name</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="coffeeDescription" class="inline">Coffee Description:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <textarea name="coffeeDescription" placeholder="Enter a short description about your coffee (Maximum of 140 characters)" maxlength="140" onKeyDown="charLimit(this.form.limitedtextarea,this.form.countdown,140)" rows="5";></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="small-2 medium-2 large-2 columns">
                        <label for="coffeePrice" class="inline">Retail Price:</label>
                    </div>
                    <div class="small-2 medium-1 columns">
                        <div class="small-offset-11 columns">
                            <label class="inline">$</label>
                        </div>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="coffeePrice" class="regInput" type="text" placeholder="Retail Price" for="coffeePrice" id="coffeePrice" required pattern="number">
                        <small class="error">Please enter a valid retail price amount without any currency signs</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="coffeeCurrency" class="inline">Currency:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="coffeeCurrency" class="regInput" type="text" placeholder="Currency the retail price is in (USD, CDN, etc.)" for="coffeeCurrency" id="coffeeCurrency" required pattern="alpha">
                        <small class="error">Please enter a valid currency type for this coffee</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="coffeeBagSize" class="inline">Coffee Bag Size (oz):</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="coffeeBagSize" class="regInput" type="text" placeholder="Coffee Bag Size (oz)" for="coffeeBagSize" id="coffeeBagSize" required pattern="number">
                        <small class="error">Please enter a valid bag size (in ounces) for this coffee</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-2 columns">
                        <label for="coffeeGPPP" class="inline">Green Price Per Pound Paid:</label>
                    </div>
                    <div class="small-2 medium-1 columns">
                        <div class="small-offset-11 columns">
                            <label class="inline">$</label>
                        </div>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="coffeeGPPP" class="regInput" type="text" placeholder="Amount (in USD) that Farmer receives per pound" for="coffeeGPPP" id="coffeeGPPP" required pattern="number">
                        <small class="error">Please enter a valid green price per pound paid for this coffee without any currency signs</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="coffeeWebsite" class="inline">Coffee Website:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="coffeeWebsite" class="regInput" type="text" placeholder="Web page address where coffee is listed for sale" for="coffeeWebsite" id="coffeeWebsite">
                        <small class="error">Please enter a website link for this coffee</small>
                    </div>
                </div>
                <div class="row">
                    <h3 class="sub-header">Farm #1</h3>
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="farmName" class="inline">Farm Name:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="farmName" class="regInput" type="text" placeholder="Farm Name" for="farmName" id="farmName" required>
                        <small class="error">Please enter a valid farm name for this coffee</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="farmLocation" class="inline">Farm Location - Country:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <input name="farmLocation" class="regInput" type="text" placeholder="Farm Location - Country" for="farmLocation" id="farmLocation" required>
                        <small class="error">Please enter a valid country that this farm is located in</small>
                    </div>
                </div>
                <div class="row">
                    <div class="small-4 medium-3 large-3 columns">
                        <label for="farmRegion" class="inline">Farm Region:</label>
                    </div>
                    <div class="small-8 medium-9 large-9 columns">
                        <select name="farmRegion" class="regInput" id="farmRegion" required>
                            <option>South America</option>
                            <option>Central America</option>
                            <option>Africa</option>
                            <option>Middle East</option>
                            <option>Pacific</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="small-5 medium-5 large-5 columns">
                        <label for="greenPPP" class="inline">Proof of Green Price Per Pound paid to farm or cooperative</label>
                    </div>
                    <div class="small-7 medium-7 large-7 columns">
                        <input name="greenPPP" class="regInput" type="file" placeholder="greenPPP" for="greenPPP" id="greenPPP">
                    </div>
                </div>
                <hr/>
            </div>
            <div id="extra-coffees">
                <div class="row" id="previous-coffee-button">
                    <div class="small-12 small-text-center columns">
                        <a name="2" id="extra-coffee" class="button flat-grey-btn tiny extra-coffee">Add Another Coffee</a>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="small-6 small-offset-3 medium-offset-4 medium-4 columns">
                <input id="registrationSubmit" type="submit" value="Submit" class="button expand flat-white-btn">
            </div>
        </form>
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
