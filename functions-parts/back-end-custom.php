<?php
    /*WP custom backend
    --------------------------------*/
    
    //custom wp backend back = 17x17px
if(current_user_can('editor')) {

    function WWS_custom_back() {
        echo '<style type="text/css">
            #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
                background-image: url(' . get_bloginfo('stylesheet_directory') . 'assets/images_martini/logo-custom.png) !important;
                background-position: 0 0;
                background-size: cover;
                color:rgba(0, 0, 0, 0);
            }
             #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
                background-position: 0 0;
            }
            .wp-admin div#ays-quiz-winter-dicount-main div#ays-quiz-dicount-month-main.ays_quiz_dicount_info{display:none}
            /*hide dashboard*/
            .wp-admin #adminmenuwrap #menu-dashboard {display:none !important;}
            /*hide pages*/
            /*hide customizer*/
            .wp-admin #adminmenuwrap #adminmenu .wp-submenu li.hide-if-no-customize {display:none !important;}
            /*hide theme editor*/
            .wp-admin #adminmenuwrap #adminmenu .wp-submenu li a[href="theme-editor.php"] {display:none !important;}
            /*hide plugin*/
            .wp-admin #adminmenuwrap #menu-plugins {display:none !important;}
            .wp-admin #wpadminbar #wp-toolbar #wp-admin-bar-updates {display:none !important;}
            
            /*hide all in one*/
            .wp-admin #adminmenuwrap .toplevel_page_ai1wm_export {display:none !important;}
            /*hide writing settings*/
            .wp-admin #adminmenuwrap #menu-settings ul li:nth-of-type(3) {display:none !important;}

			#menu-posts-struttura {display:none !important;}

			#toplevel_page_dsi_options {display:none !important;}
			
			#menu-posts-luogo {display:none !important;}
			
			#menu-posts-servizio {display:none !important;}
			
			#menu-posts-evento {display:none !important;}
			
			#menu-comments {display:none !important;}
			
			#menu-posts-avcp {display:none !important;}

			#menu-posts-spesa {display:none !important;}

			#menu-posts-incarico {display:none !important;}

			#toplevel_page_impostazioni-wpgov {display:none !important;}

			#menu-appearance {display:none !important;}

			#menu-plugins {display:none !important;}

			#menu-users {display:none !important;}

			#menu-tools {display:none !important;}

			#menu-settings {display:none !important;}

			#toplevel_page_cfdb7-list {display:none !important;}

            #wp-admin-bar-design-scuole-conf {display:none !important;}

            #wp-admin-bar-comments {display:none !important;}

            #wp-admin-bar-new-content {display:none !important;}

            #wp-admin-bar-manuale {display:none !important;}

            #menu-dashboard {display:none !important;}

            #menu-posts-calendar {display:none !important;}
        </style>';
    }
    add_action('wp_before_admin_bar_render', 'WWS_custom_back');
}