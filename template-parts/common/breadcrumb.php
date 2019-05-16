<section class="section py-2 bg-white">
	<div class="container">
		<div class="row variable-gutters">
			<div class="col-12">
				<div class="breadcrumb">
                    <?php
                    if ( function_exists( 'breadcrumb_trail' ) ) {
	                    breadcrumb_trail();
                    }
                    ?>
				</div><!-- /breadcrumbs -->
			</div><!-- /col-12 -->
		</div><!-- /row -->
	</div><!-- /container -->
</section><!-- /section --><?php
