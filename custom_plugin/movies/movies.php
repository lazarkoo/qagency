<?php
/**
* Plugin Name: Movies
* Plugin URI: https://q.agency
* Description: Plugin for a test project.
* Version: 0.1
* Author: Lazar Padjan
* Author URI: https://lazarpadjan.com/
* License: GPL2
**/

function movies_register_post_type() {

    $labels = array( 
        'name' => __( 'Movies' , 'movies' ),
        'singular_name' => __( 'Movie' , 'movies' ),
        'add_new' => __( 'Add Movie' , 'movies' ),
        'add_new_item' => __( 'Add New Movie' , 'movies' ),
        'edit_item' => __( 'Edit Movie' , 'movies' ),
        'new_item' => __( 'New Movie' , 'movies' ),
        'view_item' => __( 'View Movie' , 'movies' ),
        'search_items' => __( 'Search Movies' , 'movies' ),
        'not_found' =>  __( 'No Movies Found' , 'movies' ),
        'not_found_in_trash' => __( 'No Movies found in Trash' , 'movies' ),
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title', 
            'editor', 
            'excerpt', 
            'custom-fields', 
            'thumbnail',
            'page-attributes'
        ),
        'rewrite'   => array( 'slug' => 'movies' ),
        'show_in_rest' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-format-video',
    );

    register_post_type('movies', $args);

}

add_action( 'init', 'movies_register_post_type' );

function movies_custom_field() {
    add_meta_box( 'movie_meta_box', __( 'Movie Details', 'movies' ), 'display_movie_meta_box','movies', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'movies_custom_field' );

function display_movie_meta_box( $movie ) {
    ?>
    <tr>
        <td>
            Movie Title
        </td>
        <td>
            <input id="movie_title" type="text" name="movie_title" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'movie_title', true ) ); ?>">
        </td>
    </tr>
   
    
<?php 
}

function movies_save_meta_box( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( $parent_id = wp_is_post_revision( $post_id ) ) {
        $post_id = $parent_id;
    }
    $field = 'movie_title';    
    if ( array_key_exists( $field, $_POST ) ) {
        update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
    }
     
}
add_action( 'save_post', 'movies_save_meta_box' );


