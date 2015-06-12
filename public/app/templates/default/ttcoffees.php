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
        <li id="company"><b>Company</b></li><hr />
            <input type="checkbox" name="CounterCul" value="counterCul"> Counter Culture<br />
            <input type="checkbox" name="BirdRock" value="BirdRock"> Bird Rock<br />
            <input type="checkbox" name="FarmTo40" value="FarmTo40"> Farmers to 40<br />
        <li id="regions"><b>Regions</b></li><hr />
            <input id="southAmer" type="checkbox" name="southAmer" value="southAmer"> South America<br />
            <input id="centralAmer" type="checkbox" name="centralAmer" value="centralAmer"> Central America<br />
            <input id="Africa" type="checkbox" name="Africa" value="Africa"> Africa<br />
            <input id="MidEast" type="checkbox" name="MidEast" value="MidEast"> Middle East<br />
            <input id="Pacific" type="checkbox" name="Pacific" value="Pacific"> Pacific
        <li id="price"><b>Green Price</b></li><hr />
            <input id="TwentyPer" type="checkbox" name="TwentyPer" value="TwentyPer"> 20-29%<br />
            <input id="ThirtyPer" type="checkbox" name="ThirtyPer" value="ThirtyPer"> 30-39%<br />
            <input id="FourtyPer" type="checkbox" name="FourtyPer" value="FourtyPer"> 40-49%<br />
            <input id="FiftyPer" type="checkbox" name="FiftyPer" value="FiftyPer"> 50-59%<br />
            <input id="SixtyPer" type="checkbox" name="SixtyPer" value="SixtyPer"> 60% or more<br />
      </ul>
    </div>
  </div>
  <div class="small-9 medium-9 large-9 columns" style="margin-top: 45px;">
    <div class="ttcoffees">
      <div class="rows">
        <div class="small-2 medium-2 large-2 columns">
          <img src="<?php echo helpers\url::template_path() . "img/CounterCultureLogo.jpg";?>">
        </div>
        <div class="small-8 medium-8 large-8 columns" id="TTCpanel">
          <h3>Counter Culture</h3>
          <h5>Idido</h5>
          <ul id="TTCList" style="margin-left: 0.1rem;">
            <li><em>Farm:</em> Idido, Ethiopia</li>
            <li><em>Retail Price:</em> $18.00 per 12 ounce bag</li>
            <li><em>Green Price:</em> $4.40 per pound(f.o.b. or equivalent)</li>
          </ul>
        </div>
        <div class="small-2 medium-2 large-2 columns">
          <div class="Percent">
            <h2>21%</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
