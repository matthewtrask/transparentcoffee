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
    <div class="show-for-small-only text-center">
        <dl class="accordion" data-accordion>
            <dd class="accordion-navigation">
                <a href="#panel1"><b>Roaster</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel1" class="content">
                    <?php foreach ($data['filter_roaster'] as $roaster) {
                        echo "<input type='checkbox' name='$roaster' value='$roaster'> $roaster<br>";
                    }
                    ?>
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a href="#panel2"><b>Region</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel2" class="content">
                    <input id="southAmer" type="checkbox" name="southAmer" value="southAmer"> South America<br />
                    <input id="centralAmer" type="checkbox" name="centralAmer" value="centralAmer"> Central America<br />
                    <input id="Africa" type="checkbox" name="Africa" value="Africa"> Africa<br />
                    <input id="MidEast" type="checkbox" name="MidEast" value="MidEast"> Middle East<br />
                    <input id="Pacific" type="checkbox" name="Pacific" value="Pacific"> Pacific
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a href="#panel3"><b>Effective Grower Share</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel3" class="content">
                    <input id="TwentyPer" type="checkbox" name="TwentyPer" value="TwentyPer"> 20-29%<br />
                    <input id="ThirtyPer" type="checkbox" name="ThirtyPer" value="ThirtyPer"> 30-39%<br />
                    <input id="FourtyPer" type="checkbox" name="FourtyPer" value="FourtyPer"> 40-49%<br />
                    <input id="FiftyPer" type="checkbox" name="FiftyPer" value="FiftyPer"> 50-59%<br />
                    <input id="SixtyPer" type="checkbox" name="SixtyPer" value="SixtyPer"> 60% or more<br />
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a href="#panel4"><b>Green Price Per Pound</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel4" class="content">
                    <input id="TwoFiftyDlr" type="checkbox" name="TwoFiftyDlr" value="TwoFiftyDlr"> $2.50 - $3.00<br />
                    <input id="ThreeDlr" type="checkbox" name="ThreeDlr" value="ThreeDlr"> $3.00 - $3.50<br />
                    <input id="ThreeFiftyDlr" type="checkbox" name="ThreeFiftyDlr" value="ThreeFiftyDlr"> $3.50 - $4.00<br />
                    <input id="FourDlr" type="checkbox" name="FourDlr" value="FourDlr"> $4.00 +<br />
                </div>
            </dd>
        </dl>
    </div>
<div class="row" style="margin-bottom: 20px">
    <div class="hidden-for-small-only medium-3 large-3 columns">
        <div id="menu" class="menu">
          <p class="text-center">Menu</p><hr/>
          <ul>
            <li id="roaster"><b>Roaster</b></li><hr />
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
    <div class="small-12 medium-9 large-9 columns" style="margin-top: 45px;">
        <?php foreach ($data['ttcoffees'] as $key => $ttcoffee): ?>
            <div class="ttcoffees">
                <a href="#" data-reveal-id="quick-view-<?php echo $key?>">
                    <div class='row'>
                        <div class='small-3 medium-3 large-3 columns logo-wrapper'>
                            <div class="text-center">
                                <img src='data:image/jpeg;base64, <?php echo $ttcoffee->roaster_logo ?>'/>
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="small-6 medium-6 large-6 columns" id="TTCpanel">
                            <h3><?php echo $ttcoffee->roaster_name?></h3>
                            <h5><?php echo $ttcoffee->coffee_name?></h5>
                            <ul class="TTCList" style="margin-left: 0.1rem;">
                                <li><em>Retail Price:</em> <?php
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . round($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo round($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size?> ounce bag</li>
                                <li><em>Green Price:</em> $<?php echo round($ttcoffee->gppp, 2)?> per pound(f.o.b. or equivalent)</li>
                            </ul>
                        </div>
                        <div class="small-3 medium-3 large-3 columns">
                            <div class="Percent">
                               <h2><?php echo round($ttcoffee->egs)?>%</h2>
                            </div>
                        </div>
                    </div>
                </a>
                <div id="quick-view-<?php echo $key?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                    <div class="row">
                        <div class="small-6 columns">
                            <h2 id="modalTitle"><?php echo $ttcoffee->roaster_name?></h2>
                            <p class="lead"><?php echo $ttcoffee->coffee_name?></p>
                            <ul class="TTCList" style="margin-left: 0.1rem;">
                                <li><em>Farm:</em> <?php echo $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country?></li>
                                <li><em>Retail Price:</em> <?php
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . round($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo round($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size?> ounce bag</li>
                                <li><em>Green Price:</em> $<?php echo round($ttcoffee->gppp, 2)?> per pound(f.o.b. or equivalent)</li>
                            </ul>
                            <p><?php echo $ttcoffee->description?></p>
                            <div class="website-link"><a href="<?php echo $ttcoffee->url?>">Go to website</a></div>
                        </div>
                        <div class="small-6 columns">
                            <div class="row">
                                <div class="small-offset-2 small-8 columns"><a href="<?php echo $ttcoffee->url?>"><img class='quick-view-logo' src='data:image/jpeg;base64, <?php echo $ttcoffee->roaster_logo ?>'/></a></div>
                            </div>
                            <div class="small-offset-4 small-4 columns text-center">
                                <div class="circle"><?php echo round($ttcoffee->egs)?>%</div>
                            </div>
                        </div>
                    </div>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
