<div class="img-overlay-2">
    <img data-interchange="[<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>, (small)],
    [<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>, (medium)],
    [<?php echo helpers\url::template_path() . 'img/red-beans-cropped.jpg'?>, (large)]
    "/>
    <noscript><img src="<?php echo helpers\url::template_path() . 'img/red-beans-cropped-half.jpg'?>"></noscript>
    <div class="text-wrapper">
        <h2 class="image-text">Insights</h2>
    </div>
</div>

<div class='row' style="margin-top: 20px">
	<div class='small-12 medium-12 large-12 columns'>

		<?php
		if($data['posts']){
			foreach($data['posts'] as $row){

				echo "<div class='post'>\n";

				echo "<h2><a href='".DIR."$row->postSlug'>$row->postTitle</a></h2>\n";
				echo "<div>";
					echo "<div class='col-md-3'>";
						//echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";
					echo "</div>";

					echo "<div class='col-md-9'>";
						echo "<p>Posted on ".date('jS M Y H:i:s', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";
						echo "<div class='content'>".stripslashes($row->postDesc)."</div>";
						echo "<p><a href='".DIR."$row->postSlug' style='margin-top: 20px' class='button primary' id='insightButton'>Read More</a></p>";
					echo "</div>";
				echo "</div>";

				echo "</div>\n";
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
