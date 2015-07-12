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

					//echo "<p><img src='".DIR."$row->postImg' class='img-responsive'></p>";
					echo "<div class='fb-share-button' data-href='thttp://transparenttradecoffee.com/insights' data-layout='button'></div>";
					echo "<a class='twitter-share-button' id='twitter-wjs' href='https://twitter.com/intent/tweet?text='A%20new%20post%20from%20TTC'  data-size='large'> Tweet</a>";
					echo "<div class='content'>".stripslashes($row->postCont)."</div>";

				echo "</div>\n";
			}
		}
		?>

	</div>
</div>
