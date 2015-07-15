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

					echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";


					echo "<div class='content'>".stripslashes($row->postCont)."</div>";
				echo "</div>\n";
			}
		}
		?>

	</div>
</div>
