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
        <p class="light-font-bigger lead-in">Where specialty coffee consumers and direct trade roasters come together to share information and insights about the economic treatment of coffee growers.</p>
    </div>
</div>
<div class="row">
    <div id="coffee-icon" class="hide-for-small medium-offset-4 medium-4 columns">
        <div class="small-offset-1 small-10 columns">
            <img src="<?php echo helpers\url::template_path() . 'img/heart-coffee.jpg'?>"/>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-offset-1 small-10 columns" style="text-align: center;">
        <h1 style="margin-top: 20px;" class="page-header"><b>Featured Roasters</b></h1>
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
    <div class='small-10 small-offset-1 columns' id="insights">
        <?php
        if($data['posts']){
            foreach($data['posts'] as $row){

                echo "<div class='post home-post'>\n";
                    echo '<div class="row">';
                        echo '<div class="small-offset-1 small-10 columns" style="text-align: center;">';
                            echo "<h1 class='page-header'><b>Current TTC Insight</b></h1>";
                        echo '</div>';
                    echo '</div>';

//                  echo "<div class='col-md-3'>";
//                      echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";
//                  echo "</div>";

                    echo "<div class='small-12 columns'>";
                    echo "<h3 class='sub-header'><a href='".DIR."$row->postSlug'>$row->postTitle</a></h3>\n";
                    echo "<div class='light-font-bigger'><p>Posted on ".date('jS M Y', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p></div>";
                        echo "<div class='content light-font-smaller'>".stripslashes($row->postDesc)."</div>";
                        echo "<div class='small-6 medium-4 large-2 small-offset-3 medium-offset-4 large-offset-5 columns'><p><a href='".DIR."$row->postSlug' class='transparent-button button expand'>Read More</a></p></div>";
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