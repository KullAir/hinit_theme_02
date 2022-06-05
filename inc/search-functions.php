<?php

/**
 * 
 *  
 * https://www.smashingmagazine.com/2016/03/advanced-wordpress-search-with-wp_query/
 * 
 * About WP_Query:
 * https://developer.wordpress.org/reference/classes/wp_query/
 * 
 * WordPress Codex: WordPress Query Vars:
 * https://codex.wordpress.org/WordPress_Query_Vars#Query_variables
 * 
 * 
 * 
 * 




 */


 /**
 * Register custom query vars
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function myplugin_register_query_vars( $vars ) {
    $vars[] = 'author';
    $vars[] = 'editor';
    return $vars;
}
//add_filter( 'query_vars', 'myplugin_register_query_vars' );

function myplugin_pre_get_posts( $query ) {
    // check if the user is requesting an admin page 
    // or current query is not the main query
    if ( is_admin() || ! $query->is_main_query() ){
        return;
    }
    $query->set( 'author_name', 'carlo' );
    $query->set( 'category_name', 'webdesign' );
}
//add_action( 'pre_get_posts', 'myplugin_pre_get_posts', 1 );



function sm_setup() {
    add_shortcode( 'sm_search_form', 'sm_search_form' );
}

add_action( 'init', 'sm_setup' );

function sm_search_form( $args ){
    
    // The Query
// meta_query expects nested arrays even if you only have one query
    $sm_query = new WP_Query( array( 'post_type' => 'accommodation', 'posts_per_page' => '-1', 'meta_query' => array( array( 'key' => '_sm_accommodation_city' ) ) ) );

    // The Loop
    if ( $sm_query->have_posts() ) {
        $cities = array();
        while ( $sm_query->have_posts() ) {
            $sm_query->the_post();
            $city = get_post_meta( get_the_ID(), '_sm_accommodation_city', true );

            // populate an array of all occurrences (non duplicated)
            if( !in_array( $city, $cities ) ){
                $cities[] = $city;    
            }
        }
    }else{
        echo 'No accommodations yet!';
        return;
    }

    /* Restore original Post Data */
    wp_reset_postdata();

    if( count($cities) == 0){
        return;
    }

    asort($cities);

    $select_city = '<select name="city" style="width: 100%">';
    $select_city .= '<option value="" selected="selected">' . __( 'Select city', 'smashing_plugin' ) . '</option>';
    foreach ($cities as $city ) {
        $select_city .= '<option value="' . $city . '">' . $city . '</option>';
    }
    $select_city .= '</select>' . "\n";

    reset($cities);

    /*-------------------*/

    $args = array( 'hide_empty' => false );
    $typology_terms = get_terms( 'typology', $args );
    if( is_array( $typology_terms ) ){
        $select_typology = '<select name="typology" style="width: 100%">';
        $select_typology .= '<option value="" selected="selected">' . __( 'Select typology', 'smashing_plugin' ) . '</option>';
        foreach ( $typology_terms as $term ) {
            $select_typology .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        $select_typology .= '</select>' . "\n";
    }

    /*-------------------*/

    $select_type = '<select name="type" style="width: 100%">';
    $select_type .= '<option value="" selected="selected">' . __( 'Select room type', 'smashing_plugin' ) . '</option>';
    $select_type .= '<option value="entire">' . __( 'Entire house', 'smashing_plugin' ) . '</option>';
    $select_type .= '<option value="private">' . __( 'Private room', 'smashing_plugin' ) . '</option>';
    $select_type .= '<option value="shared">' . __( 'Shared room', 'smashing_plugin' ) . '</option>';
    $select_type .= '</select>' . "\n";
     /*-------------------*/

     $output = '<form id="smform" action="' . esc_url( home_url() ) . '" method="GET" role="search">';
    $output .= '<div class="smtextfield"><input type="text" name="s" placeholder="Search key..." value="' . get_search_query() . '" /></div>';
    $output .= '<div class="smselectbox">' . esc_html( $select_city ) . '</div>';
    $output .= '<div class="smselectbox">' . esc_html( $select_typology ) . '</div>';
    $output .= '<div class="smselectbox">' . esc_html( $select_type ) . '</div>';
    $output .= '<input type="hidden" name="post_type" value="accommodation" />';
    $output .= '<p><input type="submit" value="Go!" class="button" /></p></form>';

}


function get_job_form(){



    //positions_categories

    $args = array( 'hide_empty' => false );

    $cat_terms = get_terms( 'positions_categories', $args );
    if( is_array( $cat_terms ) ){
        $select_cat = '<select name="positions_categories" style="width: 100%">';
        $select_cat .= '<option value="" selected="selected">' . __( 'Select Categories', 'hinit' ) . '</option>';
        foreach ( $cat_terms as $term ) {
            $select_cat .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        $select_cat .= '</select>' . "\n";
    }

    //positions_regions custom cat

    $regions_terms = get_terms( 'positions_regions', $args );
    if( is_array( $regions_terms ) ){
        $select_region = '<select name="positions_regions" style="width: 100%">';
        $select_region .= '<option value="" selected="selected">' . __( 'Select Regions', 'hinit' ) . '</option>';
        foreach ( $regions_terms as $term ) {
            $select_region .= '<option value="' . $term->slug . '">' . $term->name . '</option>';
        }
        $select_region .= '</select>' . "\n";
    }
    
    
    /**
     * 
     * 
     * Notes:
     * check if form work without method="GET"
     * 
     * 
     */
    ?>

    <form method="get" id="jobsearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET" role="search">
        <div class="input-group">
            <div class="jobselectbox"><label><span class="serch-text-label"><?php esc_html_e( 'Search', 'hinit' ); ?></span><input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'hinit' ); ?>" value="<?php the_search_query(); ?>"></label></div>
            <div class="jobselectbox"><label><span class="serch-text-label"><?php echo __( 'domain', 'hinit' )  ?></span><?php echo  $select_cat; ?></label></div>
            <div class="jobselectbox"><label><span class="serch-text-label"><?php echo __( 'region', 'hinit' )  ?></span><?php echo  $select_region; ?></label></div>
            <input type="hidden" name="post_type" value="position" />
            <div class="jobsubmitbox">
                <span class="input-group-append">
                    <button type="submit" class="submit btn">
                    <i class="fa fa-search"></i><span class="sr-only-lg"><?php esc_attr_e( 'Search', 'hinit' ); ?></span></button>

                </span>
            </div>
        </div>
    </form>
    <?php

}


/**
 * ------------- Important Notes ---------------
 * 
 * Note: If you use the_post() with your query,
 * you need to run wp_reset_postdata() afterwards to
 * have Template Tags use the main query’s current post again.
 * 
 * 
 */