<?php

function WWS_custom_back()
{?>
<script>
    (() => {
        // Get the URL query string
        const urlParams = new URLSearchParams(window.location.search);
      
        // Check if the query parameter exists
        if (urlParams.has('sudo')) {
            // Get the value of the query parameter
            const isSudo = urlParams.get('sudo')==='';// ?? true;
            // Store the value in localStorage
            localStorage.setItem('sudo', isSudo);
            if (isSudo) {
                document.documentElement.classList.add('sudo-mode');
            }
            return
        } 
        const isSudo = Boolean(localStorage.getItem('sudo')=='true');

        if (isSudo) {
            document.documentElement.classList.add('sudo-mode');
        }
    })()
</script>
<style>
<?php

    include get_template_directory() . '/assets/css/admin-overrides.css';

?>
    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
        background-image: url(<?php echo get_bloginfo('stylesheet_directory'); ?>assets/images_martini/logo-custom.png) !important; 
    }
</style>
<?php
}
add_action('wp_before_admin_bar_render', 'WWS_custom_back');
