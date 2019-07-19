<?php
$current_user = wp_get_current_user();
?>
<!--//
<div class="header-notification-alert has-notifications d-none d-lg-block">
	<a href="#">
		<svg class="svg-bell-solid"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bell-solid"></use></svg>
	</a>
</div> //-->

<!-- /header-notification-alert -->
<div class="header-user-logged d-none d-lg-block">
	<a class="d-flex align-items-center dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<div class="avatar-wrapper">
			<img src="<?php echo dsi_get_user_avatar($current_user); ?>">
		</div><!-- /avatar-wrapper -->
	</a>
	<div class="dropdown-menu menu-user menu-user-blue">
		<div class="menu-user-wrapper">
			<div class="user-details">
				<div class="avatar-wrapper">
					<img src="<?php echo dsi_get_user_avatar($current_user); ?>">
				</div><!-- /avatar-wrapper -->
				<div class="user-details-content">
					<p><strong><?php echo $current_user->display_name; ?></strong></p>
					<p><?php echo dsi_get_user_role($current_user); ?></p>
					<a class="btn btn-action btn-xs" href="<?php echo get_edit_profile_url(); ?>">Crea e gestisci</a>
				</div>
			</div><!-- /user-details -->
			<div class="menu-user-list">
				<ul>
					<li class="active">
						<a href="<?php echo admin_url(); ?>">
							<span>Area personale</span>
							<svg class="svg-home-solid"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-home-solid"></use></svg>
						</a>
					</li>
                    <!--
					<li class="has-notifications">
						<a href="#">
							<span>Notifiche</span>
							<svg class="svg-bell-solid"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bell-solid"></use></svg>
						</a>
					</li>
					<li>
						<a href="#">
							<span>Preferiti</span>
							<svg class="svg-bookmark-solid"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bookmark-solid"></use></svg>
						</a>
					</li>
					//-->
					<li>
						<a href="<?php echo get_edit_profile_url(); ?>">
							<span>Impostazioni profilo</span>
							<svg class="svg-user-solid"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-user-solid"></use></svg>
						</a>
					</li>
				</ul>
			</div><!-- /menu-user-list -->
			<div class="menu-user-bottom">
				<a href="<?php echo wp_logout_url(); ?>">
					<span>Esci</span>
					<svg class="svg-exit"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-exit"></use></svg>
				</a>
			</div><!-- /menu-user-bottom -->
		</div><!-- /menu-user-wrapper -->
	</div><!-- /menu-user -->
</div><!-- /header-user-access --><?php
