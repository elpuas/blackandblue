<?php
function blackandbluefishing_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'blackandbluefishing-google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700|Passion+One', false );

}
add_action( 'wp_enqueue_scripts', 'blackandbluefishing_enqueue_styles' );


add_action( 'wp_enqueue_scripts', 'blackandbluefishing_scripts' );

function blackandbluefishing_scripts() {
  wp_enqueue_script( 'blackandbluefishing-script', get_stylesheet_directory_uri() . '/bb-scripts.js', array( 'jquery' )
  );
}


/**
* Add SVG Support
*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/**
* Page Slug Body Class
*/
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );

  /**
   * Add code to Footer
   */
   add_action('wp_footer', 'bb_call_to_action');
   
   function bb_call_to_action() {
       echo '<button id="popmake-200" class="popmake-bb-form-generic">Open Modal</button>';
   }


add_action('admin_head', 'blackandblue_adminizer');

function blackandblue_adminizer(){
  
  global $current_user;
  
  get_currentuserinfo();
  
  if ( user_can( $current_user, 'owner') || user_can($current_user, 'captain') ) {
      echo '<style>
      .et_pb_toggle_builder_wrapper, .wp-editor-container, 
      .recurrence-row tribe-datetime-block, #event_tribe_venue, 
      #event_tribe_organizer, #event_url, #event_cost, 
      .eventBritePluginPlug, #et_settings_meta_box, #tagsdiv-post_tag,
      #tribe_events_event_options, #menu-posts-tribe_events ul.wp-submenu-wrap li:nth-child(n+4), #post-status-info  {
        display: none !important;
      }
      </style>';
    }
}

/**
 * Registers an editor stylesheet for the Theme Dashboard.
 */
function my_admin_theme_style() {
  wp_enqueue_style('my-admin-style', get_template_directory_uri() . '/blackandblue-editor-style.css');
}
add_action('admin_enqueue_scripts', 'my_admin_theme_style');
/**
* Ad Custom Styles to Login Form
*/
function blackandblue_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/blackandblue-editor-style.css' );
}
add_action( 'login_enqueue_scripts', 'blackandblue_stylesheet' );
