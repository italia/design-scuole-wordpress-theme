<?php

/*
Plugin Name: CMB2 Field Type: Leaflet Maps
Plugin URI: https://github.com/villeristi/cmb2-field-leaflet-geocoder
GitHub Plugin URI: https://github.com/villeristi/cmb2-field-leaflet-geocoder
Description: Leaflet (with Geocoder) field type for CMB2.
Version: 0.1.3
Author: Ville Ristimäki
Author URI: http://ville.io
License: MIT
*/

class CMB2_Field_Leaflet {

    /**
     * @var string Version
     */
    const VERSION = '0.1.3';

    /**
     * @var string tilelayer
     */
    const INITIAL_TILELAYER = 'http://{s}.tile.osm.org/{z}/{x}/{y}.png';

    /**
     * @var string searchbox position
     */
    const SEARCHBOX_POSITION = 'topright'; // topright, bottomright, topleft, bottomleft

    /**
     * @var float latitude
     */
    const INITIAL_LAT = 61.9241;

    /**
     * @var float longitude
     */
    const INITIAL_LNG = 25.7482;

    /**
     * @var int initial zoomlevel
     */
    const INITIAL_ZOOM = 4;

    /**
     * @var int initial zoomlevel
     */
    const DEFAULT_ZOOM = 8;

    /**
     * CMB2_Field_Leaflet constructor.
     */
    public function __construct() {
        add_filter( 'cmb2_render_leaflet_map', [ $this, 'render_leaflet_map' ], 10, 5 );
        add_filter( 'cmb2_sanitize_leaflet_map', [ $this, 'sanitize_leaflet_map' ], 10, 4 );
    }

    /**
     * Render the field
     *
     * @param $field
     * @param $field_escaped_value
     * @param $object_id
     * @param $object_type
     * @param $field_type_object
     */
    public function render_leaflet_map(
        CMB2_Field $field,
        $field_escaped_value,
        $object_id,
        $object_type,
        CMB2_Types $field_type_object
    ) {

        $this->enqueue_scripts();
        $this->localize_script( $field->args( 'attributes' ) );

        if ( version_compare( CMB2_VERSION, '2.2.2', '>=' ) ) {
            $field_type_object->type = new CMB2_Type_Text( $field_type_object );
        }

        echo '<div id="geocode-selector"></div>';
        echo "<div class='cmb2-leaflet__container'></div>";

        $this->render_input( 'lat', $field, $field_escaped_value, $field_type_object );
        $this->render_input( 'lng', $field, $field_escaped_value, $field_type_object );

        $field_type_object->_desc( true, true );

    }

    /**
     * Sanitize values
     */
    public function sanitize_leaflet_map( $override_value, $value, $object_id, $field_args ) {
        return $value;
    }

    /**
     * Enqueue scripts and styles
     */
    public function enqueue_scripts() {
        wp_enqueue_script( 'cmb2-leaflet-core', '//cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.2/leaflet.js', [ 'jquery' ], self::VERSION );
        wp_enqueue_style( 'cmb2-leaflet-core', '//cdnjs.cloudflare.com/ajax/libs/leaflet/1.0.2/leaflet.css', [], self::VERSION );
        wp_enqueue_script( 'cmb2-leaflet-geocoder',  get_template_directory_uri(). '/inc/vendor/CMB2-field-Leaflet-Geocoder/assets/js/geocoder.js', [ 'cmb2-leaflet-core' ], self::VERSION );
        wp_enqueue_script( 'cmb2-leaflet-main', get_template_directory_uri(). '/inc/vendor/CMB2-field-Leaflet-Geocoder/assets/js/main.js', [ 'cmb2-leaflet-geocoder' ], self::VERSION );
        wp_enqueue_style( 'cmb2-leaflet-geocoder', get_template_directory_uri(). '/inc/vendor/CMB2-field-Leaflet-Geocoder/assets/css/geocoder.css', [ 'cmb2-leaflet-core' ], self::VERSION );
        wp_enqueue_style( 'cmb2-leaflet-main', get_template_directory_uri(). '/inc/vendor/CMB2-field-Leaflet-Geocoder/assets/css/style.css', [ 'cmb2-leaflet-geocoder' ], self::VERSION );
    }

    /**
     * @param $args
     *
     * @return bool
     */
    protected function localize_script( $args ) {
        return wp_localize_script( 'cmb2-leaflet-geocoder', 'CMB2LM', wp_parse_args( $args, [
            'tilelayer'           => self::INITIAL_TILELAYER,
            'searchbox_position'  => self::SEARCHBOX_POSITION,
            'search'              => __( 'Search...', 'cmb2-leaflet-map' ),
            'not_found'           => __( 'Not found', 'cmb2-leaflet-map' ),
            'initial_coordinates' => [
                'lat' => self::INITIAL_LAT,
                'lng' => self::INITIAL_LNG
            ],
            'initial_zoom'        => self::INITIAL_ZOOM,
            'default_zoom'        => self::DEFAULT_ZOOM
        ] ) );
    }

    /**
     * @param string     $field_name
     * @param CMB2_Field $field
     * @param            $field_escaped_value
     * @param CMB2_Types $field_type_object
     *
     * @internal param array $args
     */
    protected function render_input( $field_name = '', CMB2_Field $field, $field_escaped_value, CMB2_Types $field_type_object ) {
        $attrs = $field_type_object->concat_attrs( [
            'id'    => "{$field->args( 'id' )}_{$field_name}",
            'type'  => 'hidden',
            'name'  => "{$field->args( '_name' )}[{$field_name}]",
            'value' => isset( $field_escaped_value[ $field_name ] ) ? $field_escaped_value[ $field_name ] : '',
            'class' => "leaflet-map__{$field_name}",
            'desc'  => ''
        ], [ 'attributes' ] );

        echo sprintf( '<input%s />', $attrs );
    }
}

new CMB2_Field_Leaflet();
