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

<div class='row'>
	<div style="margin-top: 40px; margin-bottom: 20px;" class="small-12 small-text-center">
		<h2 class="sub-header"><?php echo $data['posts'][0]->catTitle?></h2>
	</div>
	<div class='small-12 medium-12 large-12 columns'>

		<?php
		if($data['posts']){
			foreach($data['posts'] as $row){

				echo "<div class='post'>";

				echo "<div class='row'><h2><a href='".DIR."$row->postSlug'>$row->postTitle</a></h2></div>\n";
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

	<div class='small-12 medium-12 large-12 columns small-text-center' style="margin-bottom: 20px; margin-top: -30px;">
		<p class='inline'>
		<?php
		if($data['cats']){
			foreach($data['cats'] as $crow){
				if ($crow !== end($data['cats'])) {
					echo "<a href='" . DIR . "category/$crow->catSlug'>$crow->catTitle</a> | ";
				}
				else {
					echo "<a href='" . DIR . "category/$crow->catSlug'>$crow->catTitle</a>";

				}
			}
		}
		?>
		</p>
	</div>
</div>

<div class='clearfix'></div>
<?php echo $data['page_links']; ?>