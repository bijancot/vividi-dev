<?php
if ( ! session_id() ) {
	session_start();
}
//constants
define( 'TRAV_VERSION', '4.1.3' );
define( 'TRAV_DB_VERSION', '3.2' );
define( 'TRAV_TEMPLATE_DIRECTORY_URI', get_template_directory_uri() );
define( 'TRAV_INC_DIR', get_template_directory() . '/inc' );
define( 'TRAV_IMAGE_URL', TRAV_TEMPLATE_DIRECTORY_URI . '/images' );
define( 'TRAV_TAX_META_DIR_URL', TRAV_TEMPLATE_DIRECTORY_URI . '/inc/lib/tax-meta-class/' );
define( 'RWMB_URL', TRAV_TEMPLATE_DIRECTORY_URI . '/inc/lib/meta-box/' );

global $wpdb;
define( 'TRAV_ACCOMMODATION_VACANCIES_TABLE', $wpdb->prefix . 'trav_accommodation_vacancies' );
define( 'TRAV_ACCOMMODATION_BOOKINGS_TABLE', $wpdb->prefix . 'trav_accommodation_bookings' );
define( 'TRAV_CURRENCIES_TABLE', $wpdb->prefix . 'trav_currencies' );
define( 'TRAV_REVIEWS_TABLE', $wpdb->prefix . 'trav_reviews' );
define( 'TRAV_MODE', 'product' );
define( 'TRAV_TOUR_SCHEDULES_TABLE', $wpdb->prefix . 'trav_tour_schedule' );
define( 'TRAV_TOUR_BOOKINGS_TABLE', $wpdb->prefix . 'trav_tour_bookings' );
define( 'TRAV_CAR_BOOKINGS_TABLE', $wpdb->prefix . 'trav_car_bookings' );
define( 'TRAV_CRUISE_SCHEDULES_TABLE', $wpdb->prefix . 'trav_cruise_schedules' );
define( 'TRAV_CRUISE_BOOKINGS_TABLE', $wpdb->prefix . 'trav_cruise_bookings' );
define( 'TRAV_CRUISE_VACANCIES_TABLE', $wpdb->prefix . 'trav_cruise_vacancies' );
define( 'TRAV_FLIGHT_BOOKINGS_TABLE', $wpdb->prefix . 'trav_flight_bookings' );
// define( 'TRAV_MODE', 'dev' );

// require file to woocommerce integration
require_once( TRAV_INC_DIR . '/functions/woocommerce/woocommerce.php' );

// get option
// $trav_options = get_option( 'travelo' );
if ( ! class_exists( 'ReduxFramework' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/lib/redux-framework/ReduxCore/framework.php' );
}
if ( ! isset( $redux_demo ) ) {
    require_once( dirname( __FILE__ ) . '/inc/lib/redux-framework/config.php' );
}

//require files
require_once( TRAV_INC_DIR . '/functions/main.php' );
require_once( TRAV_INC_DIR . '/functions/js_composer/init.php' );
require_once( TRAV_INC_DIR . '/admin/main.php');
require_once( TRAV_INC_DIR . '/frontend/accommodation/main.php');
require_once( TRAV_INC_DIR . '/frontend/tour/main.php');
require_once( TRAV_INC_DIR . '/frontend/car/main.php');
require_once( TRAV_INC_DIR . '/frontend/cruise/main.php');
require_once( TRAV_INC_DIR . '/frontend/flight/main.php');

// Content Width
if (!isset( $content_width )) $content_width = 1000;

// Translation
load_theme_textdomain('trav', get_template_directory() . '/languages');

//theme supports
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'woocommerce' );
add_image_size( 'list-thumb', 230, 160, true );
add_image_size( 'gallery-thumb', 270, 160, true );
add_image_size( 'biggallery-thumb', 500, 300, true );
add_image_size( 'widget-thumb', 64, 64, true );
add_image_size( 'slider-gallery', 900, 500, true );
//add_image_size( 'map-thumb', 280, 140, true );
//add_filter('deprecated_constructor_trigger_error', '__return_false');

function add_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-autocomplete' );
    wp_register_style( 'jquery-ui-styles','http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui-styles' );
    wp_register_script( 'my-autocomplete', get_template_directory_uri() . '/js/my-autocomplete.js', array( 'jquery', 'jquery-ui-autocomplete' ), '1.0', false );
    wp_localize_script( 'my-autocomplete', 'MyAutocomplete', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'my-autocomplete' );
}

add_action( 'wp_enqueue_scripts', 'add_scripts' );