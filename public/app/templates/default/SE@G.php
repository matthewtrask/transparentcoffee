<?php
/**
 * Created by PhpStorm.
 * User: matthewtrask
 * Date: 6/9/15
 * Time: 5:28 PM
 */
?>
<div class="img-overlay">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/transparency-half.jpg'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/transparency.jpg'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/transparency-slim.jpg'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/transparency.png'?>"></noscript>
    <div class="text-wrapper">
        <h1 id="seg-header" class="image-text">Powered by<br>Social Enterprise @ Goizueta</h1>
    </div>
</div>
<div style="height: 20px"></div>

<div class="row SEG">
    <div class="small-12 medium-6 columns" style="margin-bottom: 10px;">
        <div class="small-offset-1 small-10 columns">
            <img src="<?php echo helpers\url::template_path() . 'img/SEG-Logo-09.png' ?>">
        </div>
    </div>
    <div class="small-12 medium-6 columns light-font-smaller SEGLinks">
        <p>SE@G, an academic center within <a href="http://goizueta.emory.edu/">Emory University’s Goizueta Business School</a>, powers Transparent Trade Coffee.</p>
        <p>Our current coffee projects focus on the appropriate compensation of specialty coffee growers <a class="seglink" href="http://www.farmersto40.com" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">(Farmers to 40)</a>; on supporting community health programs in coffee country <a class="seglink" href="http://www.nicachc.org" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">(Nicaragua Community Health Connection)</a>; and on the critical intersection between these two domains <a class="seglink" href="http://www.nicachc.org/#!coffee/cxmz" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">(Los Robles Coffee Project)</a></p>
        <p>Our faculty and staff look forward to sharing data and insights, and to working closely with dedicated roasters in the months and years ahead.</p>
        <a class="seglink" href="http://goizueta.emory.edu/faculty/socialenterprise/" onclick="window.open(this.href); return false;" onkeypress="window.open(this.href); return false;">Learn more about SE@G</a>
    </div>
</div>