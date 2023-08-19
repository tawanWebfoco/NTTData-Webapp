<form role="search" method="get" id="searchform" class="searchform" action="<?php esc_url( home_url( '/' ) ) ;?>">
	<div>
		<label class="screen-reader-text" for="s"><?php echo esc_html_x( 'Search for:', 'label', 'ntt-data');?></label>
		<input type="search" class="search" placeholder="<?php echo esc_attr_x( 'Pesquisar &hellip;', 'placeholder', 'ntt-data');?>" value="<?php echo get_search_query();?>" id="s" name="s" />
		<input type="submit" class="btn btn-half" value="<?php echo esc_attr_x( 'Pesquisar', 'submit button', 'ntt-data' ) ;?> " />
		<!-- codigo abaixo permite resultado apenas do tipo 'post' -->
		 <input type="hidden" value="post" name="post_type" id="post_type" /> 
	</div>
</form>
