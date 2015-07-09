<div class="img-overlay">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/beans-in-hand-fourth.jpg'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/beans-in-hand-half.jpg'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/beans%20in%20hand.jpg'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/beans-in-hand-half.jpg'?>"></noscript>
    <div class="text-wrapper">
        <h1 class="image-text">Transparent Trade Coffee</h1>
    </div>
</div>
<div style="margin-top: 10px;" class="row">
    <div class="small-10 small-offset-1 columns">
        <p class="light-font-bigger">Where specialty coffee consumers and direct trade roasters come together to share information and insights about the economic treatment of coffee growers.</p>
    </div>
</div>
<div class="row">
    <div id="coffee-icon" class="small-offset-4 small-4 columns">
        <div class="small-offset-1 small-10 columns">
            <img src="<?php echo helpers\url::template_path() . 'img/heart-coffee.jpg'?>"/>
        </div>
    </div>
</div>
<div class="slick-multiple autoplay">
    <?php foreach ($data['roasters'] as $roaster): ?>
    <div>
        <img src='<?php echo $roaster->roaster_logo ?>'/>
    </div>
    <?php endforeach; ?>
</div>
<div class="row">
    <a href="#"><img id="home-bottom-logo" src="<?php echo helpers\url::template_path() .
            'img/Transparent-Trade-Tan-Large-08-10.png'?>"/></a>
</div>