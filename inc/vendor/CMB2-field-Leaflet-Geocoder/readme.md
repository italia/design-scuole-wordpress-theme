# CMB2 Field Leaflet Geocoder
A Leaflet (with Geocoder) field type for [CMB2](https://github.com/WebDevStudios/CMB2).

[![Build Status](https://travis-ci.org/villeristi/CMB2-field-Leaflet-Geocoder.svg?branch=master)](https://travis-ci.org/villeristi/CMB2-field-Leaflet-Geocoder)

## Installation

#### Composer
`composer require villeristi/cmb2-field-leaflet-geocoder`

#### Manual
1. [Download](https://github.com/villeristi/CMB2-field-Leaflet-Geocoder/archive/master.zip) the plugin
2. Place the plugin folder in your `/wp-content/plugins/` directory
3. Activate the plugin in the plugins dashboard

## Usage

```php
array(
  'id' => $prefix . 'location',
  'name' => __('Coordinates'),
  'desc' => __('Drag the marker after finding the right spot to set the exact coordinates'),
  'type' => 'leaflet_map',
  /*
  For these extra attributes, please consult Leaflet [documentation](http://leafletjs.com/reference-1.0.0.html)
  'attributes' = array(
    'tilelayer'           => 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
    'searchbox_position'  => 'topright'; // topright, bottomright, topleft, bottomleft,
    'search'              => __( 'Search...' ),
    'not_found'           => __( 'Not found' ),
    'initial_coordinates' => [
        'lat' => 61.9241, // Go Finland!
        'lng' => 25.7482  // Go Finland!
    ],
    'initial_zoom'        => 4 // Zoomlevel when there's no coordinates set,
    'default_zoom'        => 8 // Zoomlevel after the coordinates have been set & page saved
  )
  */
),
```
