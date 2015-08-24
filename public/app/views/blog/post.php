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
<div class="row" style="margin-top: 20px">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>'>Insights</a></li>
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