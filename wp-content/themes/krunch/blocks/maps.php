<div class="mapWrapper">
		<?php
		$topParentID = get_top_parent_id();

		if ($topParentID == 10):
			echo "<div id='kwm-map-canvas'></div>";
		elseif ($topParentID == 12):
			echo "<div id='ksw-map-canvas'></div>";
		else:
			 echo "<div id='map-canvas'></div>";
		endif;
		?>
</div><!-- END OF map DIV -->