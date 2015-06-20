<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 6/11/15
 * Time: 8:19 PM
 */
?>
<div class="img-overlay">
    <img src="<?php echo helpers\url::template_path() . 'img/Baskets_small.jpg'?>">
    <div class="text-wrapper">
        <h1 class="ttcoffee-header image-text">Transparent Coffees</h1>
    </div>
</div>
<div class="row featuredCoffees" style="margin-top: 20px">
  <div class="small-2 medium-2 large-2 columns">
  </div>
  <div class="small-8 medium-8 large-8 small-centered medium-centered large-centered columns">
    <h2 class="text-center">Featured Roaster</h2><hr />
    <div class="slick single-item autoplay" id="">
      <div class="featuredRoasters slick single-item autoplay ">
          <div class="slide slick-slide featuredRoaster"><img src="<?php echo \helpers\url::template_path() . "img/CounterCultureLogo.jpg" ?>"></div>
          <div class="slide slick-slide featuredRoaster"><img src="<?php echo \helpers\url::template_path() . "img/BirdRock.png"?>"></div>
      </div>
    </div>
  </div>
  <div class="small-2 medium-2 large-2 columns">
  </div>
</div>

<div class="row">
  <div class="small-12 medium-12 large-12 column">
    <p>The following roasters have provided the information that allows
      consumers to know exactly how much the grower was paid for his/her
      green coffee. We encourage you to consider the green prices paid
      to growers, and/or the effective grower share numbers when making
      your purchase decisions. When you are satisfied with the economic
      treatment of the coffee farmer, click on the listing to go to the
      roaster's on-line store to learn more and to make your coffee purchase.
  </div>
</div>
<div class="row" style="margin-bottom: 20px">
    <div class="small-3 medium-3 large-3 columns">
        <div id="menu" class="menu">
          <!-- menu goes here! -->
          <p class="text-center">Menu</p><hr/>
          <ul>
            <li id="company"><b>Roaster</b></li><hr />
                <?php foreach ($data['filter_roaster'] as $roaster) {
                    echo "<input type='checkbox' name='$roaster' value='$roaster'> $roaster<br>";
                }
                ?>
            <li id="regions"><b>Region</b></li><hr />
                <input id="southAmer" type="checkbox" name="southAmer" value="southAmer"> South America<br />
                <input id="centralAmer" type="checkbox" name="centralAmer" value="centralAmer"> Central America<br />
                <input id="Africa" type="checkbox" name="Africa" value="Africa"> Africa<br />
                <input id="MidEast" type="checkbox" name="MidEast" value="MidEast"> Middle East<br />
                <input id="Pacific" type="checkbox" name="Pacific" value="Pacific"> Pacific
            <li id="price"><b>Effective Grower Share</b></li><hr />
                <input id="TwentyPer" type="checkbox" name="TwentyPer" value="TwentyPer"> 20-29%<br />
                <input id="ThirtyPer" type="checkbox" name="ThirtyPer" value="ThirtyPer"> 30-39%<br />
                <input id="FourtyPer" type="checkbox" name="FourtyPer" value="FourtyPer"> 40-49%<br />
                <input id="FiftyPer" type="checkbox" name="FiftyPer" value="FiftyPer"> 50-59%<br />
                <input id="SixtyPer" type="checkbox" name="SixtyPer" value="SixtyPer"> 60% or more<br />
            <li id="price"><b>Green Price Per Pound</b></li><hr />
                <input id="TwoFiftyDlr" type="checkbox" name="TwoFiftyDlr" value="TwoFiftyDlr"> $2.50 - $3.00<br />
                <input id="ThreeDlr" type="checkbox" name="ThreeDlr" value="ThreeDlr"> $3.00 - $3.50<br />
                <input id="ThreeFiftyDlr" type="checkbox" name="ThreeFiftyDlr" value="ThreeFiftyDlr"> $3.50 - $4.00<br />
                <input id="FourDlr" type="checkbox" name="FourDlr" value="FourDlr"> $4.00 +<br />



          </ul>
        </div>
    </div>
    <div class="small-9 medium-9 large-9 columns" style="margin-top: 45px;">
        <div class="ttcoffees">
            <?php foreach ($data['ttcoffees'] as $ttcoffee): ?>
                <div class='row'>
                    <div class='small-2 medium-2 large-2 columns'>
                        <img src='data:image/jpeg;base64, <?php echo $ttcoffee->roaster_logo ?>'/>
                        <i class="fa fa-search-plus"></i>
                    </div>
                    <div class="small-8 medium-8 large-8 columns" id="TTCpanel">
                        <h3><?php echo $ttcoffee->roaster_name?></h3>
                        <h5><?php echo $ttcoffee->coffee_name?></h5>
                        <ul id="TTCList" style="margin-left: 0.1rem;">
                            <li><em>Retail Price:</em> $<?php echo round($ttcoffee->retail_price, 2) . ' per ' .
                                                        $ttcoffee->bag_size?> ounce bag</li>
                            <li><em>Green Price:</em> $<?php echo round($ttcoffee->gppp, 2)?> per pound(f.o.b. or equivalent)</li>
                        </ul>
                    </div>
                    <div class="small-2 medium-2 large-2 columns">
                        <div class="Percent">
                           <h2><?php echo round($ttcoffee->egs)?>%</h2>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
