<?php

require "vendor/CMB2/init.php";
require "vendor/CMB2-conditional-logic/cmb2-conditional-logic.php";
require "vendor/CMB2-field-Leaflet-Geocoder/cmb-field-leaflet-map.php";
require "vendor/cmb2-attached-posts/cmb2-attached-posts-field.php";

require "vendor/CMB2-taxonomy-hierarchy-child.php";

add_filter( 'pw_cmb2_field_select2_asset_path', function ($var){return get_stylesheet_directory_uri()."/inc/vendor/cmb-field-select2-master";});
require "vendor/cmb-field-select2-master/cmb-field-select2.php";


function dsi_get_user_options( $query_args = false) {

	if(!$query_args)
		$query_args['fields'] = array( 'ID', 'user_login' );

	$users = get_users( $query_args );

	$user_options = array();
	if ( $users ) {
		foreach ( $users as $user ) {
			$user_options[ $user->ID ] = $user->user_login;
		}
	}

	return $user_options;
}



function dsi_get_roles_options() {
    if ( ! function_exists( 'get_editable_roles' ) ) {
        require_once ABSPATH . 'wp-admin/includes/user.php';
    }
    $editable_roles = get_editable_roles();
    $options = array();

    foreach ($editable_roles as $role => $details) {
        $options[ esc_attr($role) ] = translate_user_role($details['name']);
    }

    return $options;
}


function dsi_get_gruppi_options( $query_args = false) {

    $gruppi = get_terms( array(
        'taxonomy' => 'gruppo-utente',
        'hide_empty' => false,
    ));

    $options = array();
    if ( $gruppi ) {
        foreach ( $gruppi as $gruppo ) {
            $options[ $gruppo->term_id ] = $gruppo->name;
        }
    }

    return $options;
}
/* // todo: programma materia
function dsi_get_program_options( $query_args = false) {

	$programs = get_posts("post_type=programma_materia&posts_per_page=-1&orderby=title&order=ASC");

	$options = array();
	if ( $programs ) {
		foreach ( $programs as $program ) {
			$options[ $program->ID ] = $program->post_title;
		}
	}

	return $options;
}*/


function dsi_get_luoghi_options( $parent = false, $addnone=false) {
	if($parent)
		$luoghi = get_posts("post_type=luogo&posts_per_page=-1&orderby=title&order=ASC&post_parent=0");
	else
		$luoghi = get_posts("post_type=luogo&posts_per_page=-1&orderby=title&order=ASC");

	$options = array();
	if($addnone)
		$options[0]=__("Nessun luogo","design_scuole_italia");
	if ( $luoghi ) {
		foreach ( $luoghi as $luogo ) {
			$options[ $luogo->ID ] = $luogo->post_title;
		}
	}

	return $options;
}


function dsi_get_strutture_options( ) {

	$programs = get_posts("post_type=struttura&posts_per_page=-1&orderby=title&order=ASC");

	$options = array();
	if ( $programs ) {
		foreach ( $programs as $program ) {
			$options[ $program->ID ] = $program->post_title;
		}
	}

	return $options;
}

function dsi_get_strutture_scuole_options( ) {

    $programs = get_posts("post_type=struttura&tipologia-struttura=scuola&posts_per_page=-1&orderby=title&order=ASC");

    $options = array();
    if ( $programs ) {
        foreach ( $programs as $program ) {
            $options[ $program->ID ] = $program->post_title;
        }
    }

    return $options;
}


/**
 * @return array
 */
function dsi_get_servizi_options( ) {

    $programs = get_posts("post_type=servizio&posts_per_page=-1&orderby=title&order=ASC");

    $options = array();
    if ( $programs ) {
        foreach ( $programs as $program ) {
            $options[ $program->ID ] = $program->post_title;
        }
    }
    return $options;
}

/**
 * @return array
 */
function dsi_get_servizi_didattici_options( ) {

    $programs = get_posts("post_type=indirizzo&posts_per_page=-1&orderby=title&order=ASC");

    $options = array();
    if ( $programs ) {
        foreach ( $programs as $program ) {
            $options[ $program->ID ] = $program->post_title;
        }
    }
    return $options;
}


function dsi_get_tipologie_strutture_options( ) {

    $tipologie = get_terms( array(
        'taxonomy' => 'tipologia-struttura',
        'hide_empty' => false,
    ));

    $options = array();
    if ( $tipologie ) {
        foreach ( $tipologie as $tipologia ) {
            $options[ $tipologia->term_id ] = $tipologia->name;
        }
    }

    return $options;
}



function dsi_get_tipologie_luoghi_options( ) {

    $tipologie = get_terms( array(
        'taxonomy' => 'tipologia-luogo',
        'hide_empty' => false,
    ));

    $options = array();
    if ( $tipologie ) {
        foreach ( $tipologie as $tipologia ) {
            $options[ $tipologia->term_id ] = $tipologia->name;
        }
    }

    return $options;
}




function dsi_get_tipologie_documenti_options( ) {

    $tipologie = get_terms( array(
        'taxonomy' => 'tipologia-documento',
        'hide_empty' => false,
    ));

    $options = array();
    if ( $tipologie ) {
        foreach ( $tipologie as $tipologia ) {
            $options[ $tipologia->term_id ] = $tipologia->name;
        }
    }

    return $options;
}

function dsi_get_strutture_indirizzo_scuole_options( ) {

    $strutture = get_posts("post_type=struttura&tipologia-struttura=scuola&posts_per_page=-1&orderby=title&order=ASC");

    $options = array();
    if ( $strutture ) {
        foreach ( $strutture as $struttura ) {
            // per ogni scuola seleziono i percorsi abilitati
               $percorsi = dsi_get_meta("percorsi", "", $struttura->ID);
        //    print_r($percorsi);
               if(is_array($percorsi) && count($percorsi) > 0){
                   foreach ($percorsi as $percorso){

                       $term_indirizzo = get_term_by("slug", $percorso, "percorsi-di-studio");
                       if($term_indirizzo)
                           $options[ $term_indirizzo->term_id ] = $term_indirizzo->name;
                   }

               }
        }
    }

    return $options;
}


/**
 * @return array
 *
 * Lista opzioni approfondimento
 */
function dsi_get_approfondimenti_options( ) {

    $args = array(
        "post_type" => array("post", "circolare"),
        "posts_per_page" => 200
    );
    $items = get_posts($args);

    $options = array();
    if ( $items ) {
        foreach ( $items as $item) {
            $options[ $item->ID ] = $item->post_title;
        }
    }

    return $options;
}


/*

 // todo: programma materia
function dsi_get_classe_options( $query_args = false) {

	$classi = get_terms( array(
		'taxonomy' => 'classe',
		'hide_empty' => false,
	));

	$options = array();
	if ( $classi ) {
		foreach ( $classi as $classe ) {
			$options[ $classe->term_id ] = $classe->name;
		}
	}

	return $options;
}
*/
function dsi_get_tipologie_amministrazione_trasparente( $query_args = false) {

    $tipologie = get_terms( array(
        'taxonomy' => 'amministrazione-trasparente',
        'hide_empty' => false,
    ));

    $options = array();
    if ( $tipologie ) {
        foreach ( $tipologie as $tipologia ) {
            if($tipologia->parent != 0)
                $options[ $tipologia->term_id ] = $tipologia->name;
        }
    }
    sort($options);

    return $options;
}


/**
 * Lista di tipologia di servizi
 * @param bool $query_args
 *
 * @return array
 */
function dsi_get_tipologia_servizi_options( $query_args = false) {

	$items = get_terms( array(
		'taxonomy' => 'tipologia-servizio',
		'hide_empty' => false,
	));

	$options = array();
	if ( $items ) {
		foreach ( $items as $item ) {
			$options[ $item->term_id ] = $item->name;
		}
	}
	return $options;
}

/**
 * Lista di tipologia di articoli
 * @param bool $query_args
 *
 * @return array
 */
function dsi_get_tipologia_articoli_options( $query_args = false) {

	$items = get_terms( array(
		'taxonomy' => 'tipologia-articolo',
		'hide_empty' => false,
	));

	$options = array();
	if ( $items ) {
		foreach ( $items as $item ) {
			$options[ $item->term_id ] = $item->name;
		}
	}
	return $options;
}


/**
 * Rende i campi cmb2 bidirezionali
 * @param $type_from
 * @param $field_from
 * @param $field_to
 * @param $metabox_from
 */

/**
 * bidirectional relation
 */

class dsi_bidirectional_cmb2 {
	private $prefix;
	private $post_type_from;
	private $post_field_from;
	private $box_from;
	private $post_field_to;

	public function __construct ($prefix, $post_type_from, $post_field_from, $box_from, $post_field_to) {

		$this->prefix = $prefix;
		$this->post_type_from = $post_type_from;
		$this->post_field_from = $prefix.$post_field_from;
		$this->box_from = $prefix.$box_from;
		$this->post_field_to = $post_field_to;

		add_action( 'pre_post_update', array(&$this, 'get_old_values') );
		add_action( 'before_delete_post', array(&$this,'posts_delete') );
		add_action( 'cmb2_save_field_'.$this->post_field_from, array(&$this,'posts_bidirectional'), 10, 3 );
	}

	public function get_old_values( $post_ID ) {
		// check if post type is not a 'revision'. Otherwise the hook fires more than once.
		if ( $this->post_type_from === get_post_type( $post_ID ) ) {
			$old_values = get_post_meta( $post_ID, $this->post_field_from, true );
			// Retrieve a CMB2 instance
			$cmb = cmb2_get_metabox( $this->box_from );
			//$old_values = $cmb->get_field( '_cmb2_attached_posts_ids' )->escaped_value();
			$cmb->update_field_property($this->post_field_from, 'old_values', $old_values );
		}
	}

	public function posts_delete( $post_ID ) {
		if ( ! $unbind_posts = get_post_meta( $post_ID, $this->post_field_from, true ) ) {
			return;
		}
		foreach ( $unbind_posts as $value => $id ) {
			$post_values = get_post_meta( $id, $this->post_field_from, true );
			if(is_array($post_values)){
                $pos = array_search( $post_ID, $post_values );
                unset( $post_values[ $pos ] );
                update_post_meta( $id, $this->post_field_from, $post_values );
            }

		}
	}


	public function posts_bidirectional( $updated, $action, $field ) {
		if ( ! $updated ) {
			return;
		}
		// getting old values
        if(isset($field->args['old_values']))
    		$old_values = $field->args['old_values'];
		// getting current post id
		$object_id = $field->object_id;
		// getting meta key
		$meta_key = $this->post_field_from;
		$meta_key_dest = $this->post_field_to;

		// getting new values from the Attached Posts field
		//$related_posts = $field->escaped_value();
		$related_posts = get_post_meta( $object_id, $meta_key, true );
		// update meta field for each selected post with current Post ID
		foreach ( (array) $related_posts as $post => $id ) {
			$field_ids = get_post_meta( $id, $meta_key_dest, true );
			if($field_ids == "")
				$field_ids = array();
			if ( is_array($field_ids) && in_array( $object_id ,$field_ids ) ) {
				continue;
			} else {
				$field_ids[] = $object_id;
			}
			update_post_meta( $id, $meta_key_dest, $field_ids );

		}
		// deleting removed relationships
		$unbind_posts = array();

		if ( ! empty( $related_posts ) && ! empty( $old_values ) ) {
			$unbind_posts = array_diff( $old_values, $related_posts );
		} elseif ( ! empty( $old_values ) ) {
			$unbind_posts = $old_values;
		}

		foreach ( (array) $unbind_posts as $value => $post_id ) {
			// check if there is no meta field by some reason
			if ( ! $post_values = get_post_meta( $post_id, $meta_key_dest, true ) ) {
				continue;
			}

			$pos = array_search( $object_id, $post_values );
			unset( $post_values[ $pos ] );
			update_post_meta( $post_id, $meta_key_dest, $post_values );
		}
	}
}

