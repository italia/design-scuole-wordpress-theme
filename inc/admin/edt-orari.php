<?php

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

// Add custom field "source URL" to orari taxonomy
function orari_taxonomy_custom_fields_edit($tag)
{
    $t_id = $tag->term_id;
    $term_meta = get_option("taxonomy_term_$t_id");
?>
    <tr class="form-field">
        <th scope="row" valign="top">
            <label for="term_meta[source_url]"><?php _e('Source URL'); ?></label>
        </th>
        <td>
            <input type="text" name="term_meta[source_url]" id="term_meta[source_url]" value="<?php echo esc_attr($term_meta['source_url']) ? esc_attr($term_meta['source_url']) : ''; ?>">
            <p class="description"><?php _e('Enter the source URL for this category'); ?></p>
        </td>
    </tr>
<?php
}
add_action('orari_category_edit_form_fields', 'orari_taxonomy_custom_fields_edit', 10, 1);

// Add custom field "source URL" to orari taxonomy
function orari_taxonomy_custom_fields_add($tag)
{
    $t_id = $tag->term_id;
    $term_meta = get_option("taxonomy_term_$t_id");
?>

    <div class="form-field">
        <label for="term_meta[source_url]"><?php _e('Source URL'); ?></label>

        <input type="text" name="term_meta[source_url]" id="term_meta[source_url]" value="<?php echo esc_attr($term_meta['source_url']) ? esc_attr($term_meta['source_url']) : ''; ?>">
        <p class="description"><?php _e('Enter the source URL for this category'); ?></p>
    </div>
<?php
}
add_action('orari_category_add_form_fields', 'orari_taxonomy_custom_fields_add', 10, 1);

// Save custom field "source URL" value
function save_orari_taxonomy_custom_fields($term_id)
{
    if (isset($_POST['term_meta'])) {
        $tax_term_id = 'taxonomy_term_' . $term_id;
        $term_meta = get_option($tax_term_id);
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        update_option($tax_term_id, $term_meta);
    }
}
add_action('edited_orari_category', 'save_orari_taxonomy_custom_fields', 10, 2);


// Remove the 'Orari Add new' submenu page
function remove_orari_add_submenu()
{
    remove_submenu_page('edit.php?post_type=orari', 'post-new.php?post_type=orari');
    remove_submenu_page('edit-tags.php?post_type=orari', 'edit-tags.php?taxonomy=orari_category&post_type=orari');
}
add_action('admin_menu', 'remove_orari_add_submenu', 11);

function orari_settings_page()
{
    // Output HTML for the Orari tab settings page
?>
    <div class="wrap">
        <h1>Orari Settings</h1>
        <form method="post" action="options.php">
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
    add_submenu_page(
        /* parent_slug */
        'edit.php?post_type=orari',
        /* page_title  */
        'Orari Settings',
        /* menu_title  */
        'Orari Settings',
        /* capability  */
        'manage_options',
        /* menu_slug   */
        'orari-settings',
        /* callback    */
        'orari_settings_page',
        /* position    */
        0
    );

    $taxonomy = 'orari_category';
    $categories = get_terms($taxonomy);
    if (!empty($categories)) {
        foreach ($categories as $category) {
            add_submenu_page(
                /* parent_slug */
                'edit.php?post_type=orari',
                /* page_title  */
                $category->name,
                /* menu_title  */
                $category->name,
                /* capability  */
                'manage_options',
                /* menu_slug   */
                'edit.php?post_type=orari&orari_category=' . $category->slug
                /* callback    */
                /* position    */
            );
        }
    }
}
add_action('admin_menu', 'orari_submenu');

// Register settings and fields for the Orari tab
add_action('admin_init', 'orari_settings');
function orari_settings()
{
    register_setting('orari_settings', 'orari_source_url');
    register_setting('orari_settings', 'orari_update_interval');
    register_setting('orari_settings', 'orari_upload_url');
    register_setting('orari_settings', 'orari_webhook_uuid');

    add_settings_section('orari_section', '', 'orari_section_callback', 'orari');

    add_settings_field('orari_source_url', 'Source URL', 'orari_source_url_callback', 'orari', 'orari_section');
    add_settings_field('orari_update_interval', 'Update Interval', 'orari_update_interval_callback', 'orari', 'orari_section');
    add_settings_field('orari_upload_url', 'Upload to URL', 'orari_upload_url_callback', 'orari', 'orari_section');
    add_settings_field('orari_webhook_uuid', 'webhook uuid', 'orari_webhook_url_callback', 'orari', 'orari_section');
}

function get_orari_option($option, $default = false)
{
    $orari_settings = get_option('orari_settings', $default);
    if (isset($orari_settings[$option]) || !empty($orari_settings[$option])) {
        return $orari_settings[$option];
    }
    return $default;
}

function orari_section_callback()
{
    // Output any necessary instructions or information for the Orari tab settings
    echo 'Enter the information below to set up the Orari tab:';
}

function orari_source_url_callback()
{
    $source_url = esc_attr(get_orari_option('orari_source_url'));
    echo '<input type="text" name="orari_source_url" value="' . $source_url . '" placeholder="https://example.com/data.json" />';
}

function orari_update_interval_callback()
{
    $update_interval = esc_attr(get_orari_option('orari_update_interval'));
    echo '<input type="text" name="orari_update_interval" value="' . $update_interval . '" placeholder="60" />';
}

function orari_upload_url_callback()
{
    $upload_url = esc_attr(get_orari_option('orari_upload_url'));
    echo '<input type="text" name="orari_upload_url" value="' . $upload_url . '" placeholder="https://example.com/upload" />';
}

function orari_webhook_url_callback()
{
    $webhook_uuid = esc_attr(get_orari_option('orari_webhook_uuid'));
    console_log($webhook_uuid);

    echo '<input type="text" name="orari_webhook_uuid" value="' . $webhook_uuid . '" placeholder="https://example.com/upload" />';
}

// Generate and store UUID for the webhook
function orari_generate_webhook_uuid()
{
    $orari_settings = get_option('orari_settings');
    console_log($orari_settings);
    if (!isset($orari_settings['orari_webhook_uuid']) || empty($orari_settings['orari_webhook_uuid'])) {
        $orari_settings['orari_webhook_uuid'] = wp_generate_uuid4();
        update_option('orari_settings', $orari_settings);
    }
}
add_action('init', 'orari_generate_webhook_uuid');

// Webhook URL to trigger orari_cron_job
function orari_webhook_callback()
{
    $orari_settings = get_option('orari_settings');
    if (isset($_GET['orari_webhook']) && $_GET['orari_webhook'] == $orari_settings['orari_webhook_uuid']) {
        orari_cron_job();
        exit;
    }
}
add_action('init', 'orari_webhook_callback');

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
