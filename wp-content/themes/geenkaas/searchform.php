<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
    	<label class="screen-reader-text" for="s">Zoeken op trefwoord en categorie</label><br />
    	<input type="hidden" name="post_type" value="post" />
        <input type="text" placeholder="Uw zoekterm" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Zoeken" />
    </div>
</form>