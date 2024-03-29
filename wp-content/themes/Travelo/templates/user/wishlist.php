<?php $user_id = get_current_user_id(); ?>
<h2><?php echo __( 'Daftar Keinginan Kamu', 'trav' ); ?></h2>
<div class="row image-box listing-style2 add-clearfix">
	<?php
	global $post_list, $before_article, $after_article, $current_view;
	$post_list = get_user_meta( $user_id, 'wishlist', true );
	if ( ! empty( $post_list ) ) {
		$current_view = 'block';
		$before_article = '<div class="col-sm-6 col-md-4">';
		$after_article = '</div>';

		$available_modules = trav_get_available_modules();

		foreach ( $post_list as $post_id ) {
			switch ( get_post_type( $post_id ) ) {
				case 'accommodation':
					if ( in_array( 'accommodation', $available_modules ) ) {
					trav_acc_get_acc_list_sigle( $post_id, 'style2', $before_article, $after_article, $show_badge=true );
					}
					break;
				case 'car':
					if ( in_array( 'car', $available_modules ) ) {
					trav_car_get_car_list_sigle( $post_id, 'style2', $before_article, $after_article, $show_badge=true );
					}
					break;
				default:
					if ( in_array( 'cruise', $available_modules ) ) {
					trav_cruise_get_cruise_list_sigle( $post_id, 'style1', $before_article, $after_article, $show_badge=true );	
					}
					break;
			}
		}
	} else {
		echo __( 'Tidak ada daftar keinginan kamu.', 'trav' );
	}
	?>
</div>