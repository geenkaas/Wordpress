<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
		<input type="hidden" name="post_type" value="'.$post_type.'" />
		<input type="text" placeholder="Zoek een deelnemer..." name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Zoeken" />
	</div>
</form>