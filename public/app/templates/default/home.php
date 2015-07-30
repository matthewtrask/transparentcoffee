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
<div class="row">
    <div class="small-offset-1 small-10 columns" style="text-align: center;">
        <h1 style="margin-top: 20px;" class="page-header">Featured Roasters</h1>
    </div>
</div>
<div class="full-row">
    <div class="slick-row">
        <?php shuffle($data['roasters'])?>
        <div class="slick-home slick-custom">
            <?php foreach ($data['roasters'] as $roaster): ?>
                <div class="featured-position">
                    <a href="<?php echo $roaster->roaster_url?>" target="_blank">
                        <div class="featured-wrapper">
                            <img src='<?php echo $roaster->roaster_logo ?>'/>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="row">
    <div class='small-12 medium-12 large-12 columns' id="insights">

        <?php
        if($data['posts']){
            foreach($data['posts'] as $row){

                echo "<div class='post'>\n";

                echo "<h2><a href='".DIR."$row->postSlug'>$row->postTitle</a></h2>\n";

//                  echo "<div class='col-md-3'>";
//                      echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";
//                  echo "</div>";

                    echo "<div class='col-md-9'>";
                        echo "<p>Posted on ".date('jS M Y H:i:s', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";
                        echo "<div class='content'>".stripslashes($row->postDesc)."</div>";
                        echo "<p><a href='".DIR."$row->postSlug' class='btn btn-primary btn-sm'>Read More</a></p>";
                    echo "</div>";


                echo "</div>\n";
            }
        }
        ?>

    </div>
</div>
<div class="row">
    <a href="#"><img id="home-bottom-logo" src="<?php echo helpers\url::template_path() .
            'img/Transparent-Trade-Tan-Large-08-10.png'?>"/></a>
</div>