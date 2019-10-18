<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * register accommodation post type
 */
if ( ! function_exists( 'trav_register_accommodation_post_type' ) ) {
	function trav_register_accommodation_post_type() {
		$labels = array(
			'name'                => _x( 'PROPERTI', 'Post Type General Name', 'trav' ),
			'singular_name'       => _x( 'Accommodation', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'MENU PROPERTI', 'trav' ),
			'all_items'           => __( 'SEMUA PROPERTI', 'trav' ),
			'view_item'           => __( 'LIHAT PROPERTI', 'trav' ),
			'add_new_item'        => __( 'Tambah Properti baru', 'trav' ),
			'add_new'             => __( 'Tambah Properti', 'trav' ),
			'edit_item'           => __( 'Edit Properti', 'trav' ),
			'update_item'         => __( 'Update Properti', 'trav' ),
			'search_items'        => __( 'Search Accommodations', 'trav' ),
			'not_found'           => __( 'No Accommodations found', 'trav' ),
			'not_found_in_trash'  => __( 'No Accommodations found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'accommodation', 'trav' ),
			'description'         => __( 'Accommodation information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
		);

		register_post_type( 'accommodation', $args );
	}
}

/*
 * register room post type
 */
if ( ! function_exists( 'trav_register_room_type_post_type' ) ) {
	function trav_register_room_type_post_type() {
		$labels = array(
			'name'                => _x( 'TIPE KAMAR', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Tipe Kamar', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'Tipe Kamar', 'trav' ),
			'all_items'           => __( 'TIPE KAMAR', 'trav' ),
			'view_item'           => __( 'View Room Type', 'trav' ),
			'add_new_item'        => __( 'Tambah Tipe Kamar', 'trav' ),
			'add_new'             => __( 'Tambah Tipe Kamar', 'trav' ),
			'edit_item'           => __( 'Ubah Tipe Kamar', 'trav' ),
			'update_item'         => __( 'Update Tipe Kamar', 'trav' ),
			'search_items'        => __( 'Cari Tipe Kamar', 'trav' ),
			'not_found'           => __( 'Tipe Kamar tidak ditemukan', 'trav' ),
			'not_found_in_trash'  => __( 'Tipe Kamar tidak ditemukan di tempat sampah', 'trav' ),
		);
		$args = array(
			'label'               => __( 'room types', 'trav' ),
			'description'         => __( 'Room Type information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			//'show_in_menu'        => 'edit.php?post_type=accommodation',
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
			'rewrite' => array('slug' => 'room-type', 'with_front' => true)
		);
		if ( current_user_can( 'manage_options' ) ) {
			$args['show_in_menu'] = 'edit.php?post_type=accommodation';
		}
		register_post_type( 'room_type', $args );
	}
}

/*
 * register things_to_do post type
 */
if ( ! function_exists( 'trav_register_things_to_do_post_type' ) ) {
	function trav_register_things_to_do_post_type() {
			
		$labels = array(
			'name'                => _x( 'Inspirasi Wisata', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Inspirasi Wisata', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'INSPIRASI WISATA', 'trav' ),
			'all_items'           => __( 'Semua Inspirasi Wisata', 'trav' ),
			'view_item'           => __( 'View Things To Do', 'trav' ),
			'add_new_item'        => __( 'Tambah Inspirasi Wisata', 'trav' ),
			'add_new'             => __( 'Tambah Inspirasi Wisata', 'trav' ),
			'edit_item'           => __( 'Edit Things To Do', 'trav' ),
			'update_item'         => __( 'Update Things To Do', 'trav' ),
			'search_items'        => __( 'Search Things To Do', 'trav' ),
			'not_found'           => __( 'No Things To Do found', 'trav' ),
			'not_found_in_trash'  => __( 'No Things To Do found in Trash', 'trav' ),
		);

		$args = array(
			'label'               => __( 'Things To Do', 'trav' ),
			'description'         => __( 'Things To Do page', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'thingstodo',
			'map_meta_cap'        => true,
			'rewrite'             => array('slug' => 'things-to-do', 'with_front' => true)
		);

		register_post_type( 'things_to_do', $args );
	}
}

/*
 * register travel_guide post type
 */
if ( ! function_exists( 'trav_register_travel_guide_post_type' ) ) {
	function trav_register_travel_guide_post_type() {
			
		$labels = array(
			'name'                => _x( 'Info Wisata Sekitar', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Info Wisata', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'INFO WISATA', 'trav' ),
			'all_items'           => __( 'Semua Info Wisata', 'trav' ),
			'view_item'           => __( 'View Travel Guide', 'trav' ),
			'add_new_item'        => __( 'Tambah Info Wisata', 'trav' ),
			'add_new'             => __( 'Tambah Info Wisata', 'trav' ),
			'edit_item'           => __( 'Edit Travel Guide', 'trav' ),
			'update_item'         => __( 'Update Travel Guide', 'trav' ),
			'search_items'        => __( 'Search Travel Guide', 'trav' ),
			'not_found'           => __( 'No Travel Guide found', 'trav' ),
			'not_found_in_trash'  => __( 'No Travel Guide found in Trash', 'trav' ),
		);

		$args = array(
			'label'               => __( 'Travel Guide', 'trav' ),
			'description'         => __( 'Travel Guide page', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'travelguide',
			'map_meta_cap'        => true,
			'rewrite'             => array('slug' => 'travel-guide', 'with_front' => true)
		);

		register_post_type( 'travel_guide', $args );
	}
}

/*
 * register accommodation type taxonomy
 */
if ( ! function_exists( 'trav_register_accommodation_type_taxonomy' ) ) {
	function trav_register_accommodation_type_taxonomy(){
		$labels = array(
				'name'              => _x( 'TIPE PROPERTI', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Accommodation Type', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'TIPE PROPERTI', 'trav' ),
				'all_items'         => __( 'All Accommodation Types', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Accommodation Type', 'trav' ),
				'add_new_item'      => __( 'TAMBAH TIPE PROPERTI', 'trav' ),
				'edit_item'         => __( 'Edit Accommodation Type', 'trav' ),
				'update_item'       => __( 'Update Accommodation Type', 'trav' ),
				'separate_items_with_commas' => __( 'Separate accommodation types with commas', 'trav' ),
				'search_items'      => __( 'Search Accommodation Types', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove accommodation types', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used accommodation types', 'trav' ),
				'not_found'                  => __( 'No accommodation types found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'accommodation_type', array( 'accommodation' ), $args );
	}
}

/*
 * register location taxonomy
 */
if ( ! function_exists( 'trav_register_location_taxonomy' ) ) {
	function trav_register_location_taxonomy(){
		$labels = array(
				'name'              => _x( 'Lokasi', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Lokasi', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Lokasi', 'trav' ),
				'all_items'         => __( 'All Locations', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Location', 'trav' ),
				'add_new_item'      => __( 'TAMBAH LOKASI', 'trav' ),
				'edit_item'         => __( 'Edit Location', 'trav' ),
				'update_item'       => __( 'Update Location', 'trav' ),
				'separate_items_with_commas' => __( 'Separate locations with commas', 'trav' ),
				'search_items'      => __( 'Search Locations', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove locations', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used locations', 'trav' ),
				'not_found'                  => __( 'No locations found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'location', array( 'accommodation', 'things_to_do', 'tour' ), $args );
	}
}

/*
 * remove posts column on amenity list panel
 */
if ( ! function_exists( 'trav_tax_location_columns' ) ) {
	function trav_tax_location_columns($columns) {
		unset( $columns['posts'] );
		return $columns;
	}
}

/*
 * register amenity taxonomy
 */
if ( ! function_exists( 'trav_register_amenity_taxonomy' ) ) {
	function trav_register_amenity_taxonomy(){
		$labels = array(
				'name'              => _x( 'FASILITAS', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Amenity', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'FASILITAS', 'trav' ),
				'all_items'         => __( 'All Amenities', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Amenity', 'trav' ),
				'add_new_item'      => __( 'TAMBAH FASILITAS', 'trav' ),
				'edit_item'         => __( 'Edit Amenity', 'trav' ),
				'update_item'       => __( 'Update Amenity', 'trav' ),
				'separate_items_with_commas' => __( 'Separate amenities with commas', 'trav' ),
				'search_items'      => __( 'Search Amenities', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove amenities', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used amenities', 'trav' ),
				'not_found'                  => __( 'No amenities found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => false,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'amenity', array( 'room_type', 'accommodation', 'cruise', 'cabin_type' ), $args );
	}
}

// Post Types for Tour
/*
 * register tour post type
 */
if ( ! function_exists( 'trav_register_tour_post_type' ) ) {
	function trav_register_tour_post_type() {
		$labels = array(
			'name'                => _x( 'Paket Wisata', 'Post Type General Name', 'trav' ),
			'singular_name'       => _x( 'Paket Wisata', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'PAKET WISATA', 'trav' ),
			'all_items'           => __( 'Semua Paket Wisata', 'trav' ),
			'view_item'           => __( 'View Tour', 'trav' ),
			'add_new_item'        => __( 'Tambah Paket Wisata', 'trav' ),
			'add_new'             => __( 'Tambah Paket Wisata', 'trav' ),
			'edit_item'           => __( 'Edit Tours', 'trav' ),
			'update_item'         => __( 'Update Tours', 'trav' ),
			'search_items'        => __( 'Search Tours', 'trav' ),
			'not_found'           => __( 'No Tours found', 'trav' ),
			'not_found_in_trash'  => __( 'No Tours found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'tour', 'trav' ),
			'description'         => __( 'Tour information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
		);
		register_post_type( 'tour', $args );
	}
}

/*
 * register tour type taxonomy
 */
if ( ! function_exists( 'trav_register_tour_type_taxonomy' ) ) {
	function trav_register_tour_type_taxonomy(){
		$labels = array(
				'name'              => _x( 'Tipe Wisata', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Tipe Wisata', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Tipe Wisata', 'trav' ),
				'all_items'         => __( 'All Tour Types', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'Tipe Wisata Baru', 'trav' ),
				'add_new_item'      => __( 'Tambah Tipe Wisata', 'trav' ),
				'edit_item'         => __( 'Edit Tour Type', 'trav' ),
				'update_item'       => __( 'Update Tour Type', 'trav' ),
				'separate_items_with_commas' => __( 'Separate tour types with commas', 'trav' ),
				'search_items'      => __( 'Search Tour Types', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove tour types', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used tour types', 'trav' ),
				'not_found'                  => __( 'No tour types found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false,
				'rewrite' => array('slug' => 'tour-type', 'with_front' => true)
			);
		register_taxonomy( 'tour_type', array( 'tour' ), $args );
	}
}

// Post Type for Car
/*
 * register car post type
 */
if ( ! function_exists( 'trav_register_car_post_type' ) ) {
	function trav_register_car_post_type() {
			
		$labels = array(
			'name'                => _x( 'LIST KENDARAAN', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Kendaraan', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'KENDARAAN', 'trav' ),
			'all_items'           => __( 'Semua Kendaraan', 'trav' ),
			'view_item'           => __( 'View Car', 'trav' ),
			'add_new_item'        => __( 'Tambah Kendaraan', 'trav' ),
			'add_new'             => __( 'Tambah Kendaraan', 'trav' ),
			'edit_item'           => __( 'Edit Car', 'trav' ),
			'update_item'         => __( 'Update Car', 'trav' ),
			'search_items'        => __( 'Search Car', 'trav' ),
			'not_found'           => __( 'No Car found', 'trav' ),
			'not_found_in_trash'  => __( 'No Car found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'Car', 'trav' ),
			'description'         => __( 'Car page', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
			'rewrite' => array('slug' => 'car', 'with_front' => true)
		);
		register_post_type( 'car', $args );
	}
}

/*
 * register car type taxonomy
 */
if ( ! function_exists( 'trav_register_car_renal_type_taxonomy' ) ) {
	function trav_register_car_type_taxonomy(){
		$labels = array(
				'name'              => _x( 'Tipe Kendaraan', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Car Type', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Tipe Kendaraan', 'trav' ),
				'all_items'         => __( 'All Car Types', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Car Type', 'trav' ),
				'add_new_item'      => __( 'Tambah Tipe Kendaraan', 'trav' ),
				'edit_item'         => __( 'Edit Car Type', 'trav' ),
				'update_item'       => __( 'Update Car Type', 'trav' ),
				'separate_items_with_commas' => __( 'Separate car types with commas', 'trav' ),
				'search_items'      => __( 'Search Car Types', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove car types', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used car types', 'trav' ),
				'not_found'                  => __( 'No car types found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false,
				'rewrite' => array('slug' => 'car-type', 'with_front' => true)
			);
		register_taxonomy( 'car_type', array( 'car' ), $args );
	}
}

/*
 * register car agent taxonomy
 */
if ( ! function_exists( 'trav_register_car_agent_taxonomy' ) ) {
	function trav_register_car_agent_taxonomy(){
		$labels = array(
				'name'              => _x( 'Provider Kendaraan', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Rental Agent', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Provider', 'trav' ),
				'all_items'         => __( 'Semua Provider', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Rental Agent', 'trav' ),
				'add_new_item'      => __( 'Tambah Provider', 'trav' ),
				'edit_item'         => __( 'Edit Rental Agent', 'trav' ),
				'update_item'       => __( 'Update Rental Agent', 'trav' ),
				'separate_items_with_commas' => __( 'Separate rental agents with commas', 'trav' ),
				'search_items'      => __( 'Search Rental Agents', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove rental agents', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used rental agent', 'trav' ),
				'not_found'                  => __( 'No rental agents found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false,
				'rewrite' => array('slug' => 'car-agent', 'with_front' => true)
			);
		register_taxonomy( 'car_agent', array( 'car' ), $args );
	}
}

/*
 * register car preference taxonomy
 */
if ( ! function_exists( 'trav_register_car_preference_taxonomy' ) ) {
	function trav_register_car_preference_taxonomy(){
		$labels = array(
				'name'              => _x( 'Fasilitas', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Fasilitas', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Fasilitas', 'trav' ),
				'all_items'         => __( 'Semua Fasilitas', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'Fasilitas Baru', 'trav' ),
				'add_new_item'      => __( 'Tambah Fasilitas', 'trav' ),
				'edit_item'         => __( 'Edit Fasilitas', 'trav' ),
				'update_item'       => __( 'Update Fasilitas', 'trav' ),
				'separate_items_with_commas' => __( 'Separate preferences with commas', 'trav' ),
				'search_items'      => __( 'Search Preferences', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove preferences', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used preferences', 'trav' ),
				'not_found'                  => __( 'No preferences found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => false,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'preference', array( 'car' ), $args );
	}
}

/*
 * register cruise post type
 */
if ( ! function_exists( 'trav_register_cruise_post_type' ) ) {
	function trav_register_cruise_post_type() {
		$labels = array(
			'name'                => _x( 'Cruises', 'Post Type General Name', 'trav' ),
			'singular_name'       => _x( 'Cruise', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'Cruises', 'trav' ),
			'all_items'           => __( 'All Cruises', 'trav' ),
			'view_item'           => __( 'View Cruise', 'trav' ),
			'add_new_item'        => __( 'Add New Cruise', 'trav' ),
			'add_new'             => __( 'New Cruise', 'trav' ),
			'edit_item'           => __( 'Edit Cruises', 'trav' ),
			'update_item'         => __( 'Update Cruises', 'trav' ),
			'search_items'        => __( 'Search Cruises', 'trav' ),
			'not_found'           => __( 'No Cruises found', 'trav' ),
			'not_found_in_trash'  => __( 'No Cruises found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'cruise', 'trav' ),
			'description'         => __( 'Cruise information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
		);
		register_post_type( 'cruise', $args );
	}
}

/*
 * register cabin type post type
 */
if ( ! function_exists( 'trav_register_cabin_type_post_type' ) ) {
	function trav_register_cabin_type_post_type() {
		$labels = array(
			'name'                => _x( 'Cabin Types', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Cabin Type', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'Cabin Types', 'trav' ),
			'all_items'           => __( 'All Cabin Types', 'trav' ),
			'view_item'           => __( 'View Cabin Type', 'trav' ),
			'add_new_item'        => __( 'Add New Cabin Type', 'trav' ),
			'add_new'             => __( 'New Cabin Types', 'trav' ),
			'edit_item'           => __( 'Edit Cabin Types', 'trav' ),
			'update_item'         => __( 'Update Cabin Types', 'trav' ),
			'search_items'        => __( 'Search Cabin Types', 'trav' ),
			'not_found'           => __( 'No Cabin Types found', 'trav' ),
			'not_found_in_trash'  => __( 'No Cabin Types found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'cabin types', 'trav' ),
			'description'         => __( 'Cabin Type information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			//'show_in_menu'        => 'edit.php?post_type=accommodation',
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
			'rewrite' => array('slug' => 'cabin-type', 'with_front' => true)
		);
		if ( current_user_can( 'manage_options' ) ) {
			$args['show_in_menu'] = 'edit.php?post_type=cruise';
		}
		register_post_type( 'cabin_type', $args );
	}
}

/*
 * register food_dinning post type
 */
if ( ! function_exists( 'trav_register_food_dinning_post_type' ) ) {
	function trav_register_food_dinning_post_type() {
		$labels = array(
			'name'                => _x( 'Food & Dinnings', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Food & Dinning', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'Food & Dinnings', 'trav' ),
			'all_items'           => __( 'All Food & Dinnings', 'trav' ),
			'view_item'           => __( 'View Food & Dinning', 'trav' ),
			'add_new_item'        => __( 'Add New Food & Dinning', 'trav' ),
			'add_new'             => __( 'New Food & Dinnings', 'trav' ),
			'edit_item'           => __( 'Edit Food & Dinnings', 'trav' ),
			'update_item'         => __( 'Update Food & Dinnings', 'trav' ),
			'search_items'        => __( 'Search Food & Dinnings', 'trav' ),
			'not_found'           => __( 'No Food & Dinnings found', 'trav' ),
			'not_found_in_trash'  => __( 'No Food & Dinnings found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'food & dinnings', 'trav' ),
			'description'         => __( 'Food & Dinning information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			//'show_in_menu'        => 'edit.php?post_type=accommodation',
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
			'rewrite' => array('slug' => 'food-dinning', 'with_front' => true)
		);
		if ( current_user_can( 'manage_options' ) ) {
			$args['show_in_menu'] = 'edit.php?post_type=cruise';
		}
		register_post_type( 'food_dinning', $args );
	}
}

/*
 * register cruise type taxonomy
 */
if ( ! function_exists( 'trav_register_cruise_type_taxonomy' ) ) {
	function trav_register_cruise_type_taxonomy(){
		$labels = array(
				'name'              => _x( 'Cruise Types', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Cruise Type', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Cruise Types', 'trav' ),
				'all_items'         => __( 'All Cruise Types', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Cruise Type', 'trav' ),
				'add_new_item'      => __( 'Add New Cruise Type', 'trav' ),
				'edit_item'         => __( 'Edit Cruise Type', 'trav' ),
				'update_item'       => __( 'Update Cruise Type', 'trav' ),
				'separate_items_with_commas' => __( 'Separate cruise types with commas', 'trav' ),
				'search_items'      => __( 'Search Cruise Types', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove cruise types', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used cruise types', 'trav' ),
				'not_found'                  => __( 'No cruise types found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'cruise_type', array( 'cruise' ), $args );
	}
}

/*
 * register cruise line taxonomy
 */
if ( ! function_exists( 'trav_register_cruise_line_taxonomy' ) ) {
	function trav_register_cruise_line_taxonomy(){
		$labels = array(
				'name'              => _x( 'Cruise Lines', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Cruise Line', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Cruise Lines', 'trav' ),
				'all_items'         => __( 'All Cruise Lines', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Cruise Line', 'trav' ),
				'add_new_item'      => __( 'Add New Cruise Line', 'trav' ),
				'edit_item'         => __( 'Edit Cruise Line', 'trav' ),
				'update_item'       => __( 'Update Cruise Line', 'trav' ),
				'separate_items_with_commas' => __( 'Separate cruise lines with commas', 'trav' ),
				'search_items'      => __( 'Search Cruise Lines', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove cruise lines', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used cruise lines', 'trav' ),
				'not_found'                  => __( 'No cruise lines found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'cruise_line', array( 'cruise' ), $args );
	}
}

/*
 * register flight post type
 */
if ( ! function_exists( 'trav_register_flight_post_type' ) ) {
	function trav_register_flight_post_type() {
		$labels = array(
			'name'                => _x( 'Flights', 'Post Type Name', 'trav' ),
			'singular_name'       => _x( 'Flight', 'Post Type Singular Name', 'trav' ),
			'menu_name'           => __( 'Flights', 'trav' ),
			'all_items'           => __( 'All Flights', 'trav' ),
			'view_item'           => __( 'View Flight', 'trav' ),
			'add_new_item'        => __( 'Add New Flight', 'trav' ),
			'add_new'             => __( 'New Flight', 'trav' ),
			'edit_item'           => __( 'Edit Flight', 'trav' ),
			'update_item'         => __( 'Update Flight', 'trav' ),
			'search_items'        => __( 'Search Flight', 'trav' ),
			'not_found'           => __( 'No Flight found', 'trav' ),
			'not_found_in_trash'  => __( 'No Flight found in Trash', 'trav' ),
		);
		$args = array(
			'label'               => __( 'flight', 'trav' ),
			'description'         => __( 'Flight information pages', 'trav' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail', 'author' ),
			'taxonomies'          => array( ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'accommodation',
			'map_meta_cap'        => true,
			'rewrite' => array( 'slug' => 'flight', 'with_front' => true )
		);
		
		register_post_type( 'flight', $args );
	}
}

/*
 * register air line taxonomy
 */
if ( ! function_exists( 'trav_register_air_line_taxonomy' ) ) {
	function trav_register_air_line_taxonomy(){
		$labels = array(
				'name'              => _x( 'Air Lines', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Air Line', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Air Lines', 'trav' ),
				'all_items'         => __( 'All Air Lines', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Air Line', 'trav' ),
				'add_new_item'      => __( 'Add New Air Line', 'trav' ),
				'edit_item'         => __( 'Edit Air Line', 'trav' ),
				'update_item'       => __( 'Update Air Line', 'trav' ),
				'separate_items_with_commas' => __( 'Separate air lines with commas', 'trav' ),
				'search_items'      => __( 'Search Air Lines', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove air lines', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used air lines', 'trav' ),
				'not_found'                  => __( 'No air lines found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'air_line', array( 'flight' ), $args );
	}
}

/*
 * register flight stop taxonomy
 */
if ( ! function_exists( 'trav_register_flight_stop_taxonomy' ) ) {
	function trav_register_flight_stop_taxonomy(){
		$labels = array(
				'name'              => _x( 'Flight Stops', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Flight Stop', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Flight Stops', 'trav' ),
				'all_items'         => __( 'All Flight Stops', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Flight Stop', 'trav' ),
				'add_new_item'      => __( 'Add New Flight Stop', 'trav' ),
				'edit_item'         => __( 'Edit Flight Stop', 'trav' ),
				'update_item'       => __( 'Update Flight Stop', 'trav' ),
				'separate_items_with_commas' => __( 'Separate flight stops with commas', 'trav' ),
				'search_items'      => __( 'Search Flight Stops', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove flight stops', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used flight stops', 'trav' ),
				'not_found'                  => __( 'No flight stops found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'flight_stop', array( 'flight' ), $args );
	}
}

/*
 * register flight type taxonomy
 */
if ( ! function_exists( 'trav_register_flight_type_taxonomy' ) ) {
	function trav_register_flight_type_taxonomy(){
		$labels = array(
				'name'              => _x( 'Flight Types', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Flight Type', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Flight Types', 'trav' ),
				'all_items'         => __( 'All Flight Types', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Flight Type', 'trav' ),
				'add_new_item'      => __( 'Add New Flight Type', 'trav' ),
				'edit_item'         => __( 'Edit Flight Type', 'trav' ),
				'update_item'       => __( 'Update Flight Type', 'trav' ),
				'separate_items_with_commas' => __( 'Separate flight types with commas', 'trav' ),
				'search_items'      => __( 'Search Flight Types', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove flight types', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used flight types', 'trav' ),
				'not_found'                  => __( 'No flight types found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'flight_type', array( 'flight' ), $args );
	}
}

/*
 * register flight location taxonomy
 */
if ( ! function_exists( 'trav_register_flight_location_taxonomy' ) ) {
	function trav_register_flight_location_taxonomy(){
		$labels = array(
				'name'              => _x( 'Flight Locations', 'taxonomy general name', 'trav' ),
				'singular_name'     => _x( 'Flight Location', 'taxonomy singular name', 'trav' ),
				'menu_name'         => __( 'Flight Locations', 'trav' ),
				'all_items'         => __( 'All Flight Locations', 'trav' ),
				'parent_item'                => null,
				'parent_item_colon'          => null,
				'new_item_name'     => __( 'New Flight Location', 'trav' ),
				'add_new_item'      => __( 'Add New Flight Location', 'trav' ),
				'edit_item'         => __( 'Edit Flight Location', 'trav' ),
				'update_item'       => __( 'Update Flight Location', 'trav' ),
				'separate_items_with_commas' => __( 'Separate flight locations with commas', 'trav' ),
				'search_items'      => __( 'Search Flight Locations', 'trav' ),
				'add_or_remove_items'        => __( 'Add or remove flight locations', 'trav' ),
				'choose_from_most_used'      => __( 'Choose from the most used flight locations', 'trav' ),
				'not_found'                  => __( 'No flight locations found.', 'trav' ),
			);
		$args = array(
				'labels'            => $labels,
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'meta_box_cb'       => false
			);
		register_taxonomy( 'flight_location', array( 'flight' ), $args );
	}
}

/*
 * init custom post_types
 */
if ( ! function_exists( 'trav_init_custom_post_types' ) ) {
	function trav_init_custom_post_types(){
		global $trav_options;
		if ( empty( $trav_options['disable_acc'] ) ) {
			trav_register_accommodation_post_type();
			trav_register_accommodation_type_taxonomy();
			trav_register_room_type_post_type();
		}
		trav_register_location_taxonomy();
		trav_register_things_to_do_post_type();
		trav_register_travel_guide_post_type();
		trav_register_amenity_taxonomy();

		if ( empty( $trav_options['disable_tour'] ) ) {
			trav_register_tour_post_type();
			trav_register_tour_type_taxonomy();
		}

		if ( empty( $trav_options['disable_car'] ) ) {
			trav_register_car_post_type();
			trav_register_car_preference_taxonomy();
			trav_register_car_type_taxonomy();
			trav_register_car_agent_taxonomy();
		}

		if ( empty( $trav_options['disable_cruise'] ) ) {
			trav_register_cruise_post_type();
			trav_register_cabin_type_post_type();
			trav_register_food_dinning_post_type();
			trav_register_cruise_type_taxonomy();
			trav_register_cruise_line_taxonomy();
		}		

		if ( empty( $trav_options['disable_flight'] ) ) {
			trav_register_flight_post_type();
			trav_register_flight_type_taxonomy();
			trav_register_flight_stop_taxonomy();
			trav_register_flight_location_taxonomy();
			trav_register_air_line_taxonomy();
		}		
	}
}

/*
 * hide Add Accommodation Submenu on sidebar
 */
if ( ! function_exists( 'trav_hd_add_accommodation_box' ) ) {
	function trav_hd_add_accommodation_box() {
		if ( current_user_can( 'manage_options' ) ) {
			global $submenu;
			unset($submenu['edit.php?post_type=accommodation'][10]);
		}
	}
}

/*
 * hide Add Accommodation Submenu on sidebar
 */
if ( ! function_exists( 'trav_user_capablilities' ) ) {
	function trav_user_capablilities() {
		$admin_role = get_role( 'administrator' );
		$adminCaps = array(
			'edit_accommodation',
			'read_accommodation',
			'delete_accommodation',
			'edit_accommodations',
			'edit_others_accommodations',
			'publish_accommodations',
			'read_private_accommodations',
			'delete_accommodations',
			'delete_private_accommodations',
			'delete_published_accommodations',
			'delete_others_accommodations',
			'edit_private_accommodations',
			'edit_published_accommodations',

			'edit_thingstodo',
			'read_thingstodo',
			'delete_thingstodo',
			'edit_thingstodos',
			'edit_others_thingstodos',			
			'publish_thingstodos',
			'read_private_thingstodos',
			'delete_thingstodos',
			'delete_private_thingstodos',
			'delete_published_thingstodos',
			'delete_others_thingstodos',
			'edit_private_thingstodos',
			'edit_published_thingstodos',

			'edit_travelguide',
			'read_travelguide',
			'delete_travelguide',
			'edit_travelguides',
			'edit_others_travelguides',			
			'publish_travelguides',
			'read_private_travelguides',
			'delete_travelguides',
			'delete_private_travelguides',
			'delete_published_travelguides',
			'delete_others_travelguides',
			'edit_private_travelguides',
			'edit_published_travelguides',		
			
		);
		foreach ($adminCaps as $cap) {
			$admin_role->add_cap( $cap );
		}

		$role = get_role( 'trav_busowner' );
		$caps = array(
			'edit_accommodation',
			'read_accommodation',
			'delete_accommodation',
			'edit_accommodations',
			'read_private_accommodations',
			'delete_accommodations',
			'delete_private_accommodations',
			'delete_published_accommodations',
			'edit_private_accommodations',
			'edit_published_accommodations',
		);
		foreach ($caps as $cap) {
			$role->add_cap( $cap );
		}
	}
}

add_action( 'init', 'trav_init_custom_post_types', 0 );
add_action('admin_menu', 'trav_hd_add_accommodation_box');
add_action('admin_init', 'trav_user_capablilities');

add_filter("manage_edit-location_columns", 'trav_tax_location_columns'); 
?>