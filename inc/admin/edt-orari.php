<?php


// Register Custom Post Type
// function orari_post_type() {

// 	$labels = array(
// 		'name'                  => _x( 'orari', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'         => _x( 'orario', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'             => __( 'Orari', 'text_domain' ),
// 		'name_admin_bar'        => __( 'Orari Admin Bar Name', 'text_domain' ),
// 		'archives'              => __( 'Item Archives', 'text_domain' ),
// 		'attributes'            => __( 'Item Attributes', 'text_domain' ),
// 		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
// 		'all_items'             => __( 'All Items', 'text_domain' ),
// 		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
// 		'add_new'               => __( 'Add New', 'text_domain' ),
// 		'new_item'              => __( 'New Item', 'text_domain' ),
// 		'edit_item'             => __( 'Edit Item', 'text_domain' ),
// 		'update_item'           => __( 'Update Item', 'text_domain' ),
// 		'view_item'             => __( 'View Item', 'text_domain' ),
// 		'view_items'            => __( 'View Items', 'text_domain' ),
// 		'search_items'          => __( 'Search Item', 'text_domain' ),
// 		'not_found'             => __( 'Not found', 'text_domain' ),
// 		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
// 		'featured_image'        => __( 'Featured Image', 'text_domain' ),
// 		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
// 		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
// 		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
// 		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
// 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
// 		'items_list'            => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
// 		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
// 	);
// 	$args = array(
// 		'label'                 => __( 'orario', 'text_domain' ),
// 		'description'           => __( 'Post Type Description', 'text_domain' ),
// 		'labels'                => $labels,
// 		'supports'              => array( 'title', 'editor', 'custom-fields', 'page-attributes', 'post-formats' ),
// 		'taxonomies'            => array( 'orari_taxonomies' ),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 5,
// 		'menu_icon'             => 'dashicons-clock',
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'can_export'            => true,
// 		'has_archive'           => true,
// 		'exclude_from_search'   => true,
// 		'publicly_queryable'    => true,
// 		'capability_type'       => 'post',
// 		'show_in_rest'          => true,
// 	);
// 	register_post_type( 'orari', $args );

// }
// add_action( 'init', 'orari_post_type', 0 );

// Register custom post type 'orari'
function orari_post_type()
{
    $labels = array(
        'name'               => 'Orari',
        'singular_name'      => 'Orario',
        'menu_name'          => 'Orari',
        'name_admin_bar'     => 'Orario',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Orario',
        'new_item'           => 'New Orario',
        'edit_item'          => 'Edit Orario',
        'view_item'          => 'View Orario',
        'all_items'          => 'All Orari',
        'search_items'       => 'Search Orari',
        'parent_item_colon'  => 'Parent Orari:',
        'not_found'          => 'No Orari found.',
        'not_found_in_trash' => 'No Orari found in Trash.',
    );
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'orari'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array(
            'title',
            'editor',
            'author',
            'thumbnail',
            'excerpt',
            'comments'
        ),
    );
    register_post_type('orari', $args);
}
add_action('init', 'orari_post_type');

// Register custom categories for 'orari'
function orari_taxonomies()
{
    $labels = array(
        'name'              => 'Orari Categories',
        'singular_name'     => 'Orari Category',
        'search_items'      => 'Search Orari Categories',
        'all_items'         => 'All Orari Categories',
        'parent_item'       => 'Parent Orari Category',
        'parent_item_colon' => 'Parent Orari Category:',
        'edit_item'         => 'Edit Orari Category',
        'update_item'       => 'Update Orari Category',
        'add_new_item'      => 'Add New Orari Category',
        'new_item_name'     => 'New Orari Category Name',
        'menu_name'         => 'Orari Categories',
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'orari_category'),
    );
    register_taxonomy('orari_category', array('orari'), $args);
}
add_action('init', 'orari_taxonomies', 0);


// Create custom "Orari" tab in WordPress dashboard
// add_action('admin_menu', 'orari_tab');
// function orari_tab()
// {
//     add_menu_page(
//         'Orari Tab',
//         'Orari',
//         'manage_options',
//         'orari',
//         'orari_settings_page',
//         'dashicons-clock',
//         6
//     );
// }
// Remove the 'Orari Categories' submenu page
function remove_orari_categories_submenu() {
    // global $submenu;
    //  console_log(json_encode($submenu)); //this will print out all the menus/submenus currently available in the admin.
    // remove_submenu_page( 'orari', 'edit-tags.php?taxonomy=orari_category' );
    remove_submenu_page( 'edit.php?post_type=orari', 'post-new.php?post_type=orari' );
    
}
add_action( 'admin_menu', 'remove_orari_categories_submenu', 11 );

// // Add the categories management page and the custom post type page as submenus of the main 'orari' tab
function add_orari_submenus()
{
    // add_submenu_page(
    //     // 'orari',
    //     'edit.php?post_type=orari',
    //     'All Orari',
    //     'All Orari',
    //     'manage_options',
    //     'edit.php?post_type=orari'
    // );
    // add_submenu_page(
    //     'orari',
    //     'Orari Categories',
    //     'Categories',
    //     'manage_options',
    //     'edit-tags.php?taxonomy=orari_category'
    // );
}
add_action('admin_menu', 'add_orari_submenus', 11);

function orari_settings_page()
{
    // Output HTML for the Orari tab settings page
?>
    <div class="wrap">
        <h1>Orari Settings</h1>
        <form method="post" action="options.php">
            <h2>Orari Settings</h2>
            <?php
            settings_fields('orari_settings');
            do_settings_sections('orari');
            submit_button();
            ?>
        </form>
    </div>
<?php
}
// Register submenu for custom categories of 'orari'
function orari_submenu()
{
    // add_options_page(
    //     'Orari Settings',
    //     'Orari Settings',
    //     'manage_options',
    //     'orari-settings',
    //     'orari_settings_page',
    //     // 6
    // );
    add_submenu_page(
        'edit.php?post_type=orari',
        'Orari Settings',
        'Orari Settings',
        'manage_options',
        'orari-settings',
        'orari_settings_page',
        0
    );

    $taxonomy = 'orari_category';
    $categories = get_terms($taxonomy);
    if (!empty($categories)) {
        // add_submenu_page(
        //     'orari',
        //     'Orari Categories',
        //     'Orari Categories',
        //     'manage_options',
        //     // 'edit-tags.php?taxonomy=' . $taxonomy
        //     'edit-tags.php?taxonomy=' . $taxonomy . '&post_type=orari'
        // );
        foreach ($categories as $category) {
            add_submenu_page(
                // 'orari',
                'edit.php?post_type=orari',
                $category->name,
                $category->name,
                'manage_options',
                'edit.php?post_type=orari&orari_category=' . $category->slug
            );
        }
    }
}
add_action('admin_menu', 'orari_submenu');

// Create custom "Orari" tab in WordPress dashboard
// add_action('admin_menu', 'orari_tab');
// function orari_tab()
// {
//     add_menu_page(
//         'Orari Tab',
//         'Orari',
//         'manage_options',
//         'orari',
//         'orari_settings_page',
//         'dashicons-clock',
//         6
//     );
// }


// Register settings and fields for the Orari tab
add_action('admin_init', 'orari_settings');
function orari_settings()
{
    register_setting('orari_settings', 'orari_source_url');
    register_setting('orari_settings', 'orari_update_interval');
    register_setting('orari_settings', 'orari_upload_url');

    add_settings_section('orari_section', '', 'orari_section_callback', 'orari');

    add_settings_field('orari_source_url', 'Source URL', 'orari_source_url_callback', 'orari', 'orari_section');
    add_settings_field('orari_update_interval', 'Update Interval', 'orari_update_interval_callback', 'orari', 'orari_section');
    add_settings_field('orari_upload_url', 'Upload to URL', 'orari_upload_url_callback', 'orari', 'orari_section');
}

function orari_section_callback()
{
    // Output any necessary instructions or information for the Orari tab settings
    echo 'Enter the information below to set up the Orari tab:';
}

function orari_source_url_callback()
{
    $source_url = esc_attr(get_option('orari_source_url'));
    echo '<input type="text" name="orari_source_url" value="' . $source_url . '" placeholder="https://example.com/data.json" />';
}

function orari_update_interval_callback()
{
    $update_interval = esc_attr(get_option('orari_update_interval'));
    echo '<input type="text" name="orari_update_interval" value="' . $update_interval . '" placeholder="60" />';
}

function orari_upload_url_callback()
{
    $upload_url = esc_attr(get_option('orari_upload_url'));
    echo '<input type="text" name="orari_upload_url" value="' . $upload_url . '" placeholder="https://example.com/upload" />';
}

// Function to create the Cron job
function orari_cron_job()
{
    $source_url = get_option('orari_source_url');
    $upload_url = get_option('orari_upload_url');

    // Use wp_remote_get to fetch the JSON data from the source URL
    $response = wp_remote_get($source_url);
    $data = json_decode(wp_remote_retrieve_body($response), true);

    // Only save the first 200 items of the JSON data to the database
    $data = array_slice($data, 0, 200);

    // Use wp_remote_post to upload the JSON data to the specified upload URL
    $args = array(
        'method' => 'POST',
        'timeout' => 45,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array(),
        'body' => $data,
        'cookies' => array()
    );
    wp_remote_post($upload_url, $args);
}

function orari_cron_job1()
{
    global $wpdb;

    $source_url = get_option('orari_source_url');
    $upload_url = get_option('orari_upload_url');

    // Use wp_remote_get to fetch the JSON data from the source URL
    $response = wp_remote_get($source_url);
    $data = json_decode(wp_remote_retrieve_body($response), true);

    // Only save the first 200 items of the JSON data to the database
    $data = array_slice($data, 0, 200);

    // // Insert the data into the 'orari_data' table
    // foreach ($data as $item) {
    //     $wpdb->insert(
    //         'orari_data',
    //         array(
    //             'key' => $item['key'],
    //             'value' => $item['value']
    //         ),
    //         array(
    //             '%s',
    //             '%s'
    //         )
    //     );
    // }
    // mysql -u exampleuser -pexamplepass exampledb 

    // Use wp_remote_post to upload the JSON data to the specified upload URL
    // $args = array(
    //     'method' => 'POST',
    //     'timeout' => 45,
    //     'redirection' => 5,
    //     'httpversion' => '1.0',
    //     'blocking' => true,
    //     'headers' => array(),
    //     'body' => $data,
    //     'cookies' => array()
    // );
    // wp_remote_post($upload_url, $args);
}


// Schedule the Cron job to run based on the specified update interval
$update_interval = get_option('orari_update_interval');
if (!wp_next_scheduled('orari_cron_job')) {
    wp_schedule_event(time(), $update_interval, 'orari_cron_job');
}
add_action('orari_cron_job', 'orari_cron_job');
