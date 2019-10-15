<?php
/**
 * Class Inventor_Field_Types_Taxonomy_Multicheck_Hierarchy_Child
 */
class Inventor_Field_Types_Taxonomy_Multicheck_Hierarchy_Child
{
    /**
     * Initialize the plugin by hooking into CMB2
     */
    public function __construct()
    {
        add_filter('cmb2_render_taxonomy_multicheck_hierarchy_child', array($this, 'render'), 10, 5);
        add_filter('cmb2_sanitize_taxonomy_multicheck_hierarchy_child', array($this, 'sanitize'), 10, 5);
    }

    /**
     * Render field
     *
     * @access public
     * @param $field
     * @param $field_escaped_value
     * @param $field_object_id
     * @param $field_object_type
     * @param $field_type_object
     * @return string
     */
    public function render($field, $field_escaped_value, $field_object_id, $field_object_type, $field_type_object)
    {
        $real_field_type_object = class_exists('CMB2_Type_Taxonomy_Multicheck') ? new CMB2_Type_Taxonomy_Multicheck($field_type_object) : $field_type_object;

        $names = $real_field_type_object->get_object_terms();
        $saved_terms = is_wp_error($names) || empty($names)
            ? $field_type_object->field->get_default()
            : wp_list_pluck($names, 'slug');

        $terms_query_args = array(
            'hide_empty' => false,
            'parent' => 0,
            'meta_key' =>  'dsi_order',
            'orderby'       =>  'meta_value',
            'order'       =>  'ASC',
        );
        $only_parent = false;
        if(isset( $field->args['attributes']['data-only-parent']))
            $only_parent = $field->args['attributes']['data-only-parent'];
        $post_type = empty($field->args['post_type']) ? null : $field->args['post_type'];

        /*if (!empty($post_type)) {
            $terms_query_args['meta_query'] = array(
                'relation' => 'OR',
                array(
                    'key' => INVENTOR_LISTING_CATEGORY_PREFIX . 'listing_types',
                    'compare' => 'NOT EXISTS',
                ),
                array(
                    'key' => INVENTOR_LISTING_CATEGORY_PREFIX . 'listing_types',
                    'value' => serialize(strval($post_type)),
                    'compare' => 'LIKE'
                )
            );
        }*/

        $terms = get_terms($field_type_object->field->args('taxonomy'), $terms_query_args);

        $name = $field_type_object->_name() . '[]';
        $options = '';
        $i = 1;

        if (!$terms) {
            $options .= sprintf('<li><label>%s</label></li>', esc_html($field_type_object->_text('no_terms_text', __('No terms', 'cmb2'))));
        } else {
            foreach ($terms as $term) {
                $args = array(
                    'type' => 'checkbox',
                    'class' => 'cmb2_option',
                    'id' => $term->term_id,
                    'value' => $term->slug,
                    'label' => $term->name,
                    'name' => $name,
                );

                if (is_array($saved_terms) && in_array($term->slug, $saved_terms)) {
                    $args['checked'] = 'checked';
                }

                $child = get_term_children($term->term_id, $field_type_object->field->args('taxonomy') );
                if($only_parent){
                    $options .= $real_field_type_object->list_input($args, $i);
                }else{
                    if($child){
                        $args['disabled'] = "disabled";
                    }else{
                        $options .= $real_field_type_object->list_input($args, $i);

                    }

                }
                if(!$only_parent)
                    $children = $this->build_children($real_field_type_object, $term, $saved_terms);

                if (!empty($children)) {
                    $options .= $children;
                }

                $i++;
            }
        }
        $classes = false === $field_type_object->field->args('select_all_button')
            ? 'cmb2-checkbox-list no-select-all cmb2-list'
            : 'cmb2-checkbox-list cmb2-list';

        echo sprintf('<ul class="%s">%s</ul>', $classes, $options);
    }

    /**
     * Save proper values
     *
     * @access public
     * @param $override_value
     * @param $value
     * @param $object_id
     * @param $field_args
     * @return void
     */
    public function sanitize($override_value, $value, $object_id, $field_args)
    {
        wp_set_object_terms($object_id, $value, $field_args['taxonomy']);
    }

    /**
     * Build children hierarchy
     *
     * @access public
     * @param $object
     * @param $parent_term
     * @param $saved_terms
     * @return null|string
     */
    public function build_children($object, $parent_term, $saved_terms)
    {
        $output = null;

        $terms = get_terms($object->field->args('taxonomy'), array(
            'hide_empty' => false,
            'parent' => $parent_term->term_id,
        ));

        if (!empty($terms) && is_array($terms)) {
            $output = '<li ><span class="caret">'.$parent_term->name.'</span><ul style="padding-left: 20px; padding-top: 4px;padding-bottom: 4px;" class="nested">';

            foreach ($terms as $term) {
                $args = array(
                    'type' => 'checkbox',
                    'id' => $term->term_id,
                    'name' => $object->_name() . '[]',
                    'value' => $term->slug,
                    'label' => $term->name,
                );

                if (is_array($saved_terms) && in_array($term->slug, $saved_terms)) {
                    $args['checked'] = 'checked';
                }
                $child = get_term_children($term->term_id, $object->field->args('taxonomy') );
             //   if(is_wp_error($child)) print_r($child);
                if($child){
                    $args['disabled'] = "disabled";

                }else{
                    $output .= $object->list_input($args, $term->term_id);

                }


                $children = $this->build_children($object, $term, $saved_terms);

                if (!empty($children)) {
                    $output .= $children;
                }
            }

            $output .= '</ul></li>';
        }

        return $output;
    }
}

new Inventor_Field_Types_Taxonomy_Multicheck_Hierarchy_Child();