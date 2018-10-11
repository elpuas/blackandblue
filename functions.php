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

  if ( 'elpuas@gmail.com' !== $current_user->user_email   &&  'peterfrelikmedia@gmail.com' !== $current_user->user_email  ) {
    echo '<style>
    #menu-dashboard ul.wp-submenu-wrap li:nth-child(3), li#menu-posts, li#menu-media, li#menu-links, li#menu-pages, li#menu-posts-project, li#menu-comments, li#menu-posts-popup, li#toplevel_page_caldera-forms, li#menu-appearance, li#menu-plugins, li#menu-users, li#menu-tools, li#menu-settings, li#toplevel_page_et_divi_options, li#toplevel_page_monsterinsights_settings, li#toplevel_page_sb-instagram-feed, div#tribe-filters, li#menu-posts-tribe_events ul li:not(.wp-first-item), div#tribe_events_event_options, div#postdivrich, tr.recurrence-row.tribe-recurrence-exclusion-row, table#event_tribe_venue, table#event_tribe_organizer, table#event_url, table#event_cost   {
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


function tribe_custom_theme_text ( $translation, $text, $domain ) {

	$custom_text = array(
		'Venue' => 'Location',
    'Related %s' => 'Similar %s',
    'Events' => 'Locations',
    'Event' => 'Name & Location',
	);
 
	// If this text domain starts with "tribe-", "the-events-", or "event-" and we have replacement text
    	if( (strpos($domain, 'tribe-') === 0 || strpos($domain, 'the-events-') === 0 || strpos($domain, 'event-') === 0) && array_key_exists($translation, $custom_text) ) {
		$translation = $custom_text[$translation];
	}

    return $translation;
}
add_filter('gettext', 'tribe_custom_theme_text', 20, 3);

/**
* Show Calendar
*/

add_action('wp_dashboard_setup', 'blackandblue_dashboard_widgets');

function blackandblue_dashboard_widgets() {

global $wp_meta_boxes;

 wp_add_dashboard_widget('custom_help_widget', 'Monthly Locations Calendar', 'custom_dashboard_help');
}

function custom_dashboard_help() {

  echo do_shortcode("[tribe_mini_calendar]");

}

/*
 Quick Email Shortcode
*/

add_action('wp_dashboard_setup', 'bb_dashboard_widgets');

function bb_dashboard_widgets() {

global $wp_meta_boxes;

 wp_add_dashboard_widget('bb_custom_help_widget', 'Quick Email', 'bb_custom_dashboard_help');
}

function bb_custom_dashboard_help() {

  echo '<div class="mi-dw-not-authed">
  <h2>Confirmation Emails</h2>
  <p>Click here to send and email to Member</p>
  <a href="/wp-admin/tools.php?page=quick_mail_form" class="mi-dw-btn-large">Create Email</a>
  </div>';

}

/*
 Remove Dashboard Access
*/

function wpse23007_redirect(){

  if( is_admin() && !defined('DOING_AJAX') && ( current_user_can('owner')) ){
    
    wp_redirect('/book-form');
    
    exit;
  }

}
add_action('init','wpse23007_redirect');


/*
 Remove Admin Bar
*/

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {

  if (!current_user_can('administrator') && !is_admin()) {

    show_admin_bar(false);

    }

}