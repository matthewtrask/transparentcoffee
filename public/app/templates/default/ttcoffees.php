<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 6/11/15
 * Time: 8:19 PM
 */
?>
<div class="ttcoffees">
<div class="img-overlay">
    <img src="<?php echo helpers\url::template_path() . 'img/Baskets_small.jpg'?>">
    <div class="text-wrapper">
        <h1 class="ttcoffee-header image-text">Transparent Coffees</h1>
    </div>
</div>
<!--<div class="row featuredCoffees" style="margin-top: 20px">-->
<!--  <div class="small-offset-2 small-8 columns">-->
<!--    <h2 class="text-center">Featured Roaster</h2><hr />-->
<!--      --><?php //$coffee = $data['ttcoffees'][array_rand($data['ttcoffees'])];?>
<!--      <div class="small-offset-4 small-4 columns">-->
<!--            <div class="featuredRoaster"><img src='data:image/jpeg;base64, --><?php //echo $coffee->roaster_logo ?><!--'/></div>-->
<!--      </div>-->
<!--  </div>-->
<!--</div>-->

<div class="row">
  <div class="small-12 medium-12 large-12 column">
    <p style="margin-top: 20px;">The following roasters have provided the information that allows
      consumers to know exactly how much the grower was paid for his/her
      green coffee. We encourage you to consider the green prices paid
      to growers, and/or the effective grower share numbers when making
      your purchase decisions. When you are satisfied with the economic
      treatment of the coffee farmer, click on the listing to go to the
      roaster's on-line store to learn more and to make your coffee purchase.
  </div>
</div>
<div class="show-for-medium-down">
    <form id="mobile-menu-form">
        <dl class="accordion" data-accordion>
            <dd class="accordion-navigation">
                <a class="text-center" href="#panel1"><b>Roaster</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel1" class="content">
                    <?php foreach ($data['filter_roaster'] as $roaster) {
                        echo "<input id='$roaster' type='checkbox' name='roaster[]' value='$roaster'> $roaster<br>";
                    }
                    ?>
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a class="text-center" href="#panel2"><b>Region</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel2" class="content">
                    <input id="southAmer" type="checkbox" name="region[]" value="South America"> South America<br />
                    <input id="centralAmer" type="checkbox" name="region[]" value="Central America"> Central America<br />
                    <input id="Africa" type="checkbox" name="region[]" value="Africa"> Africa<br />
                    <input id="MidEast" type="checkbox" name="region[]" value="Middle East"> Middle East<br />
                    <input id="Pacific" type="checkbox" name="region[]" value="Pacific"> Pacific
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a class="text-center" href="#panel3"><b>Effective Grower Share</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel3" class="content">
                    <div class="row">
                        <div class="small-offset-1 small-10 columns">
                            <div class="slider-egs" class="noUiSlider" style="margin-top: 25px;"></div>
                            <input class="egs-lower" type="hidden" name="egs-lower">
                            <input class="egs-upper" type="hidden" name="egs-upper">
                        </div>
                    </div>
                </div>
            </dd>
            <dd class="accordion-navigation">
                <a class="text-center" href="#panel4"><b>Green Price Per Pound</b> <i class="fa fa-plus-circle"></i></a>
                <div id="panel4" class="content">
                    <div class="row">
                        <div class="small-offset-1 small-10 columns">
                            <div class="slider-gppp" class="noUiSlider" style="margin-top: 25px;"></div>
                            <input class="gppp-lower" type="hidden" name="gppp-lower">
                            <input class="gppp-upper" type="hidden" name="gppp-upper">
                        </div>
                    </div>
                </div>
            </dd>
        </dl>
    </form>
</div>
<div class="row" style="margin-top: 20px">
    <div class="hide-for-small hide-for-medium large-3 columns">
        <div id="menu" class="menu">
          <p class="text-center">Menu</p><hr/>
            <form id="menu-form">
                <dl class="accordion custom-accordion" data-accordion>
                    <dd class="accordion-navigation custom-accordion-panel">
                        <a href="#panel1"><b>Roaster</b> <i class="fa fa-plus-circle"></i></a>
                        <div id="panel1" class="content">
                            <?php foreach ($data['filter_roaster'] as $roaster) {
                                echo "<input id='$roaster' type='checkbox' name='roaster[]' value='$roaster'> <span class='filter_roaster'>$roaster</span><br>";
                            }
                            ?>
                        </div>
                    </dd>
                    <dd class="accordion-navigation custom-accordion-panel">
                        <a href="#panel2"><b>Region</b> <i class="fa fa-plus-circle"></i></a>
                        <div id="panel2" class="content">
                            <input id="southAmer" class='region' type="checkbox" name="region[]" value="South America"> <span class='region'>South America</span><br />
                            <input id="centralAmer" class='region' type="checkbox" name="region[]" value="Central America"> <span class='region'>Central America</span><br />
                            <input id="Africa" class='region' type="checkbox" name="region[]" value="Africa"> <span class='region'>Africa</span><br />
                            <input id="MidEast" class='region' type="checkbox" name="region[]" value="Middle East"> <span class='region'>Middle East</span><br />
                            <input id="Pacific" class='region' type="checkbox" name="region[]" value="Pacific"> <span class='region'>Pacific</span>
                        </div>
                    </dd>
                    <dd class="accordion-navigation custom-accordion-panel">
                        <a href="#panel3"><b>Effective Grower Share</b> <i class="fa fa-plus-circle"></i></a>
                        <div id="panel3" class="content">
                            <div class="row">
                                <div class="small-offset-1 small-10 columns">
                                    <div class="slider-egs" class="noUiSlider" style="margin-top: 25px;"></div>
                                    <input class="egs-lower" type="hidden" name="egs-lower">
                                    <input class="egs-upper" type="hidden" name="egs-upper">
                                </div>
                            </div>
                        </div>
                    </dd>
                    <dd class="accordion-navigation custom-accordion-panel">
                        <a href="#panel4"><b>Green Price Per Pound</b> <i class="fa fa-plus-circle"></i></a>
                        <div id="panel4" class="content">
                            <div class="row">
                                <div class="small-offset-1 small-10 columns">
                                    <div class="slider-gppp" class="noUiSlider" style="margin-top: 25px;"></div>
                                    <input class="gppp-lower" type="hidden" name="gppp-lower">
                                    <input class="gppp-upper" type="hidden" name="gppp-upper">
                                </div>
                            </div>
                        </div>
                    </dd>
                </dl>
            </form>
        </div>
    </div>
    <div id='ttcoffees' class="small-12 medium-12 large-9 columns">
        <div class="small-8 medium-9 columns">
            <h3>Transparent Coffees</h3>
        </div>
        <div class="small-4 medium-3 columns">
            <a class="button tiny secondary dropdown-btn" data-dropdown="hover1" data-options="is_hover:true">Default</a>

            <ul id="hover1" class="f-dropdown dropdown-ul" data-dropdown-content>
                <li class="sort-dropdown"><a>Green Price Per Pound</a></li>
                <li class="sort-dropdown"><a>Effective Grower Share</a></li>
            </ul>
            <a id="down" class="button tiny secondary arrow-btn"><i class="fa fa-angle-down fa-2x"></i></a>
        </div>
        <?php shuffle($data['ttcoffees']);foreach ($data['ttcoffees'] as $key => $ttcoffee): ?>
            <div class="ttcoffee">
                <a href="#" data-reveal-id="quick-view-<?php echo $key?>">
                    <div class='row'>
                        <div class='small-3 medium-3 large-3 columns logo-wrapper'>
                            <div class="text-center wrapper-parent">
                                <div class="thumbnail-wrapper">
                                    <img src='data:image/jpeg;base64, <?php echo $ttcoffee->roaster_logo ?>'/>
                                </div>
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="small-5 medium-6 large-6 columns TTCpanel">
                            <h3 class="roaster_name"><?php echo $ttcoffee->roaster_name?></h3>
                            <h5 class="coffee_name"><?php echo $ttcoffee->coffee_name?></h5>
                            <ul class="TTCList" style="margin-left: 0.1rem;">
                                <li class="show-for-medium-up"><em>Farm:</em> <?php echo $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country?></li>
                                <li class="show-for-medium-up"><em>Retail Price:</em> <?php
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo '$' . number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size?> ounce bag</li>
                                <li class="show-for-small-only"><em>Retail Price:</em> <?php
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo '$' . number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size?> oz</li>
                                <li><em>Green Price:</em> $<?php echo number_format($ttcoffee->gppp, 2)?> per pound</li>
                            </ul>
                        </div>
                        <div class="percent-wrapper small-4 medium-3 large-3 columns">
                            <div class="gppp">
                                <div class="gppp-abbrev rotate">GPPP</div>
                                <h3>$<?php echo number_format($ttcoffee->gppp, 2)?></h3>
                            </div>
<!--                            <div class="fill"></div>-->
                            <div class="Percent">
                                <div class="percent-abbrev rotate">EGS</div>
                                <h3><?php echo round($ttcoffee->egs, 1)?>%</h3>
                            </div>
                        </div>
                    </div>
                </a>
                <div id="quick-view-<?php echo $key?>" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                    <div class="row">
                        <div class="small-12 medium-6 columns">
                            <div class="show-for-small-only">
                                <div class="small-12 columns"><a href="<?php echo $ttcoffee->url?>"><img class='quick-view-logo' src='data:image/jpeg;base64, <?php echo $ttcoffee->roaster_logo ?>'/></a></div>
                            </div>
                            <h2 id="modalTitle"><?php echo $ttcoffee->roaster_name?></h2>
                            <p class="lead"><?php echo $ttcoffee->coffee_name?></p>
                            <ul class="TTCList-popup" style="margin-left: 0.1rem;">
                                <li><em>Farm:</em> <?php echo $ttcoffee->farm_name . ', ' . $ttcoffee->farm_country?></li>
                                <li><em>Retail Price:</em> <?php
                                    if ($ttcoffee->currency == 'USD') {
                                        echo '$' . number_format($ttcoffee->retail_price, 2);
                                    }
                                    else {
                                        echo number_format($ttcoffee->retail_price, 2) . ' (' . $ttcoffee->currency . ')';
                                    }
                                    echo ' per ' . $ttcoffee->bag_size?> ounce bag</li>
                                <li><em>Green Price:</em> $<?php echo number_format($ttcoffee->gppp, 2)?> per pound(f.o.b. or equivalent)</li>
                            </ul>
                            <p><?php echo $ttcoffee->description?></p>
                            <div class="website-link"><a href="<?php echo $ttcoffee->url?>">Go to website</a></div>
                        </div>
                        <div class="small-12 medium-6 columns">
                            <div class="row">
                                <div class="show-for-medium-up medium-offset-2 medium-8 columns"><a href="<?php echo $ttcoffee->url?>"><img class='quick-view-logo' src='data:image/jpeg;base64, <?php echo $ttcoffee->roaster_logo ?>'/></a></div>
                            </div>
                            <div class="row">
                                <div class="small-offset-1 small-6 medium-offset-3 medium-5 columns text-center">
                                    <div class="row">
                                        <div class="small-2 medium-2 columns">
                                            <div class="square">$<?php echo number_format($ttcoffee->gppp, 2)?></div>
                                        </div>
                                        <div class="small-2 medium-2 columns">
                                            <div class="circle"><?php echo round($ttcoffee->egs, 1)?>%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
