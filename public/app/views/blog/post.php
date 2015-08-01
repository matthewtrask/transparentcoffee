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
<div class="row" style="margin-top: 20px">
	<div class="small-12 medium-12 large-12 columns">
		<ul class="breadcrumbs">
			<li><a href='<?php echo DIR;?>'>Insights</a></li>
			<li><?php echo $data['post'][0]->postTitle;?></li>
		</ul>
	</div>
</div>

<div class='row'  style="margin-bottom: 20px;">
	<div class='small-12 medium-12 large-12 columns'>

		<?php
		if($data['post']){
			foreach($data['post'] as $row){

				echo "<div class='post'>\n";
					echo "<h2>$row->postTitle</h2>\n";
					echo "<p>Posted on ".date('jS M Y H:i:s', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";


					echo "<div class='content'>".stripslashes($row->postCont)."</div>";

				echo "</div>\n";
			}
		}
		?>
		<hr/><p><em>Share on your favorite social media!</em></p>
  			<a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2FTransparenttradecoffee.com%2Finsights&t=Insights%20of%20Transparent%20Trade%20Coffee" target="_blank" title="Share on Facebook"><i class="fa fa-facebook-square fa-2x"></i></a>
  			<a href="https://twitter.com/intent/tweet?source=http%3A%2F%2FTransparenttradecoffee.com%2Finsights&text=Insights%20of%20Transparent%20Trade%20Coffee:%20http%3A%2F%2FTransparenttradecoffee.com%2Finsights&via=_ttcoffee" target="_blank" title="Tweet"><i class="fa fa-twitter-square fa-2x"></i></a>
  			<a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2FTransparenttradecoffee.com%2Finsights&title=Insights%20of%20Transparent%20Trade%20Coffee&summary=&source=http%3A%2F%2FTransparenttradecoffee.com%2Finsights" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a>
	</div>
</div>
