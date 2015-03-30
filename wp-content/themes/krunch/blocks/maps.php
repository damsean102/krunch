<div class="mapWrapper">
		<?php
		$topParentID = get_top_parent_id();

		if ($topParentID == 10): ?>
			<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2suk!4v1427746859083!6m8!1m7!1sOHjgBDgCoVDQBV97QaqLuw!2m2!1d52.487425!2d-2.006763!3f298.01297781917697!4f-5.959554428344106!5f1.6715533031636123" width="100%" height="450" frameborder="0" style="border:0"></iframe>
		<?php elseif ($topParentID == 12): ?>
			<iframe src="https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2suk!4v1427747153334!6m8!1m7!1ss0D3Gbo_-NO31mWK1LbhDg!2m2!1d51.606679!2d-2.523323!3f179.67375699720762!4f-7.756383239259378!5f0.7820865974627469" width="100%" height="450" frameborder="0" style="border:0"></iframe>
		<?php else:
			 echo "<div id='map-canvas'></div>";
		endif;
		?>
</div><!-- END OF map DIV -->