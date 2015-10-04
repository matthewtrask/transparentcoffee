<div class="img-overlay-2">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/farm2-mobile.png'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/farm2-half.png'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/farm2-slim.png'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/farm2-half.png'?>"></noscript>
    <div class="text-wrapper">
        <h2 class="image-text">Insights</h2>
    </div>
</div>
<div class="insights">
<div class="row" style="margin-top: 40px;">
	<div class="small-10 small-offset-1 large-12 large-offset-0 columns">
		<p class='light-font-smaller'>Our team of researchers regularly share their analysis and other interesting insights about specialty coffee

			markets, roasters, growers and more.  Visit often and feel free to share TTC Insights with others in

			your networks.</p>
	</div>
</div>
<div class='row' style="">
	<div class='small-10 small-offset-1 large-12 large-offset-0 columns'>

		<?php
		if($data['posts']){
			foreach($data['posts'] as $row){

				echo "<div class='post'>";

				echo "<div class='row'><h2>$row->postTitle</h2></div>\n";
				echo "<div class='row'>";
//					echo "<div class='col-md-3'>";
						//echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";
//					echo "</div>";

//					echo "<div class='col-md-9'>";
						echo "<p>Posted on ".date('jS M Y H:i', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";
						echo "<div class='content'>".stripslashes($row->postDesc)."</div>";
						echo "<div class='small-8 medium-4 large-2 small-offset-2 medium-offset-4 large-offset-5 columns'><p><a href='".DIR.'insights/'."$row->postSlug' style='margin-top: 20px' class='button expand flat-white-btn' id='insightButton'>Read More</a></p></div>";
//					echo "</div>";
				echo "</div>";

				echo "</div>";

			}
		}
		?>

	</div>

<!--	<div class='small-12 medium-12 large-12 columns'>-->
<!--		<ul>-->
<!--		--><?php
//		if($data['cats']){
//			foreach($data['cats'] as $crow){
//				echo "<li><a href='".DIR."category/$crow->catSlug'>$crow->catTitle</a></li>";
//			}
//		}
//		?>
<!--		</ul>-->
<!--	</div>-->
</div>

<div class='clearfix'></div>
<?php echo $data['page_links']; ?>
</div>
