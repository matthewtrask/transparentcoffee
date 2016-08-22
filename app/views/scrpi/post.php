<div class="img-overlay">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/Baskets-mobile.png'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/Baskets-half.png'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/Baskets-slim.png'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/Baskets-half.png'?>"></noscript>
    <div class="text-wrapper">
        <h1 class="scrpi-header image-text">Specialty Coffee Retail Price Index</h1>
    </div>
</div>
<div class="row" style="margin-top: 20px">
    <div class="small-12 medium-12 large-12 columns">
        <ul class="breadcrumbs">
            <li><a href='<?php echo DIR;?>'>SCRPI</a></li>
            <li><?php echo $data['post'][0]->postTitle;?></li>
        </ul>
    </div>
</div>

<div class='row'  style="margin-bottom: 20px;">
    <div class='small-12 medium-10 medium-offset-1 large-offset-0 large-12 columns'>

        <?php
        if($data['post']){
            foreach($data['post'] as $row){

//				echo "<div class='post'>\n";
                echo "<h2>$row->postTitle</h2>\n";
                echo "<p class=\"light-font-smaller\">The Specialty Coffee Retail Price Index (SCRPI)<span id=\"star\">*</span> is being developed by researchers at Social Enterprise @ Goizueta to track the retail prices charged by a representative group of North American specialty coffee roasters</p>";
                echo "<p>Posted on ".date('jS M Y H:i:s', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";


                echo "<div class='content'>".stripslashes($row->postCont)."</div>";

//				echo "</div>\n";
            }
        }
        ?>
        <hr/><p><em>Share on your favorite social media!</em></p>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x"></i></a>
        <a href="https://twitter.com/share" data-url="<?php echo urlencode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x"></i></a>
        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);?>" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a>
    </div>
</div>
