<?php
/**
 * Customize the output of menus for Foundation top bar
 */

class top_bar_walker extends Walker_Nav_Menu {

    private $current_id;

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $element->has_children = !empty( $children_elements[$element->ID] );
        $element->classes[] = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
        $element->classes[] = ( $element->has_children ) ? 'has-dropdown' : '';
        
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    
    function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $object->classes ) ? array() : (array) $object->classes;
        $classes[] = 'menu-item-' . $object->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args ) );

        if ( in_array( 'current-menu-item', $classes ) )
            $class_names .= ' active';

        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $this->current_id = $object->ID;

        $current_object_id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $object->ID, $object, $args );
        $current_object_id = $current_object_id ? ' id="' . esc_attr( $current_object_id ) . '"' : '';


        $output .= $indent . '<li' . $current_object_id . $value . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $object->title )   ? $object->title  : '';
        $atts['target'] = ! empty( $object->target )  ? $object->target : '';
        $atts['rel']    = ! empty( $object->xfn )     ? $object->xfn    : '';

        // If item has_children add atts to a.
        if (  in_array( 'has-dropdown', $classes ) && $depth === 0 ) {
            $atts['href']           = '#';
            $atts['data-dropdown']    = 'dropdown-'.$object->ID;
            $atts['class']          = 'dropdown-toggle';
            $atts['aria-controls']  = 'true';
        } else {
            $atts['href'] = ! empty( $object->url ) ? $object->url : '';
        }

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $object, $args );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $object_output = $args->before;

        $object_output .= '<a'. $attributes .'>';

        $object_output .= $args->link_before . apply_filters( 'the_title', $object->title, $object->ID ) . $args->link_after;
        $object_output .= '</a>';
        $object_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $object_output, $item, $depth, $args );
        
    }
    
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        //  'dropdown-'. $object->ID;
        // print_r($output);
        $output .= "\n";
        $output .= '<ul id="dropdown-'.$this->current_id.'" class="sub-menu dropdown f-dropdown" data-dropdown-content aria-hidden="true" tabindex="-1">';
        $output .= "\n";
    }
    
}


// Add search to menu
// add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'main-menu' )
        return $items.'<li class="menu-item"><form role="search" method="get" class="menu-searchform" action="/">
                    <label class="screen-reader-text search-nav-title" for="s">
                      <svg class="icon"><use xlink:href="#search-icon" /></svg>
                    </label>
                    <div class="search-box">
                      <input type="text" value="" name="s" id="s-menu">
                      <button type="submit">Sök</button>
                    </div>
                  </form></li>';

    return $items;
}

?>