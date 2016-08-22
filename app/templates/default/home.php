<div class="img-overlay">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/beans-in-hand-mobile.png'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/beans-in-hand-fourth.jpg'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/beans-in-hand-slim.jpg'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/beans-in-hand-fourth.jpg'?>"></noscript>
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
        <?php shuffle($data['coffees']); ?>
        <div class="slick-home slick-custom">
            <?php foreach ($data['coffees'] as $coffees): ?>
                <?php foreach($coffees as $coffee): ?>
                <div class="featured-position">
                    <a href="<?php echo $coffee['roaster_url']?>" target="_blank">
                        <div class="featured-wrapper">
                            <img src='<?php echo $coffee['roaster_logo']?>'/>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="row">
    <div class='small-12 medium-10 medium-offset-1 columns' id="insights">
        <?php
        if($data['posts']){
            foreach($data['posts'] as $row){

                echo "<div style='margin-top: 20px;' class='home-post'>\n";
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
                        echo "<div class='small-8 medium-4 small-offset-2 medium-offset-4 columns'><p><a href='".DIR.'insights/'."$row->postSlug' class='flat-white-btn button expand'>Read More</a></p></div>";
                    echo "</div>";


                echo "</div>\n";
            }
        }
        ?>

    </div>
</div>
<div class="row">
    <a href="#"><img id="home-bottom-logo" src="<?php echo helpers\url::template_path() .
            'img/ttc-bottom-page.png'?>"/></a>
</div>