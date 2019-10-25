<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/*
 * Accommodation Room Detail HTML in Room List
 */
if ( ! function_exists( 'trav_acc_get_room_detail_html' ) ) {
	function trav_acc_get_room_detail_html( $room_type_id, $type = 'all', $room_price = 0, $number_of_days = 0, $rooms = 0) { // available type - all,available,not_available,not_match
		$room_type_id = trav_room_clang_id( $room_type_id );
		?>
        <style type="text/css">
            a.s{
                background: #E35403;
            }
            a.s:hover{
                background: #f75d05;
            }
        </style>
		<article class="box">
			<figure class="col-sm-4 col-md-3">
				<a class="hover-effect popup-gallery" data-post_id="<?php echo esc_attr( $room_type_id );?>" href="#" title="<?php echo __( 'popup gallery', 'trav' ); ?>"><?php echo get_the_post_thumbnail( $room_type_id, 'list-thumb' ); ?></a>
			</figure>
			<div class="details col-xs-12 col-sm-8 col-md-9">
				<div>
					<div>
						<div class="box-title">
							<h4 class="title"><a href="<?php echo esc_url( get_permalink( $room_type_id ) ); ?>"><?php echo esc_html( get_the_title( $room_type_id ) ); ?></a></h4>
							<dl class="description">
								<?php
									$max_adults = get_post_meta( $room_type_id, 'trav_room_max_adults', true );
									if ( ! empty( $max_adults ) ) {
								?>
									<dt><?php _e( 'DEWASA', 'trav' ) ?>:</dt>
									<dd><?php echo esc_html( $max_adults ); ?></dd>
								<?php } ?>
								<?php
									$max_kids = get_post_meta( $room_type_id, 'trav_room_max_kids', true );
									if ( ! empty( $max_kids ) ) {
								?>
									<dt><?php _e( 'ANAK', 'trav' ) ?>:</dt>
									<dd><?php echo esc_html( $max_kids ); ?></dd>
								<?php } ?>
							</dl>
						</div>
						<div class="amenities">
							<?php
								$facilities = wp_get_post_terms( $room_type_id, 'amenity' );
								$amenity_icons = get_option( "amenity_icon" );
								foreach ( $facilities as $facility ) {
									if ( is_array( $amenity_icons ) && isset( $amenity_icons[ $facility->term_id ] ) ) {
										if( isset( $amenity_icons[ $facility->term_id ]['uci'] ) ) {
											echo '<img alt="amenity-image" class="custom_amenity" title="' . esc_attr( $facility->name ) . '" src="' . esc_url( $amenity_icons[ $facility->term_id ]['url'] ) . '" height="28">';
										} else if ( isset( $amenity_icons[ $facility->term_id ]['icon'] ) ) {
											$_class = " circle";
											$_class = $amenity_icons[ $facility->term_id ]['icon'] . $_class;
											echo '<i class="' . esc_attr( $_class ) . '" title="' . esc_attr( $facility->name ) . '"></i>';
										}
										
									}
									
								}
							?>
						</div>
					</div>
					<div class="price-section">
						<span class="price">
							<?php if ( $type == 'available' ) { ?>
								<small>
									<?php if ( ( $number_of_days == 0 ) && ( $rooms == 0 ) ) { 
										echo __( 'Per Malam', 'trav' );
									} else {
										echo esc_html( $number_of_days . ' ' . __( 'Malam', 'trav' ) ) . '<br />' . esc_html( $rooms . ' ' . __( 'Kamar', 'trav' ) );
									}?>
								</small>
								<?php echo esc_html( trav_get_price_field( $room_price ) );
							} ?>
						</span>
					</div>
				</div>
				<div>
					<div class="entry-content">
						<?php 
							$post = get_post( $room_type_id ); 
							$content = apply_filters('the_content', $post->post_content);
							echo wp_kses_post( $content );
							// echo do_shortcode( $content );
							// echo strip_shortcodes( $content );
						?>
					</div>

					<div class="action-section">
						<?php if ( $type == 'available' ) { ?>
<!--							<button title="--><?php //_e( 'Pesan', 'trav') ?><!--" class="button btn-small full-width text-center btn-book-now" data-room-type-id="--><?php //echo esc_attr( $room_type_id ); ?><!--">--><?php //_e( 'PESAN', 'trav') ?><!--</button>-->
                            <?php if ( ! is_user_logged_in() ) { ?>
                                <a href="#travelo-login"  class="button s full-width uppercase btn-small soap-popupbox"><?php _e( 'PESAN', 'trav' ); ?></a>
                            <?php } else { ?>
                                <button style="background-color: #E35403" title="<?php _e( 'Pesan', 'trav') ?>" class="button btn-small full-width text-center btn-book-now" data-room-type-id="<?php echo esc_attr( $room_type_id ); ?>"><?php _e( 'PESAN', 'trav') ?></button>
                            <?php } ?>
                        <?php } elseif ( $type == 'all' ) { ?>
							<a href="#" title="<?php _e( 'Cek Harga', 'trav') ?>" class="button s btn-small full-width text-center btn-show-price" data-room-type-id="<?php echo esc_attr( $room_type_id ); ?>"><?php _e( 'CEK HARGA', 'trav') ?></a>
						<?php } elseif ( $type == 'not_available' ) { ?>
							<h4><?php echo __( 'Habis', 'trav' ) ?></h4>
						<?php } elseif ( $type == 'not_match' ) { ?>
							<h4><?php echo __( 'Max. Jumlah Tamu', 'trav' ) ?></h4>
						<?php } ?>
					</div>
				</div>
			</div>
		</article>
		<?php
	}
}

/*
 * Accommodation Room Gallery HTML
 */
if ( ! function_exists( 'trav_get_post_gallery_html' ) ) {
	function trav_get_post_gallery_html( $post_id ) {
		$gallery_imgs = get_post_meta( $post_id, 'trav_gallery_imgs' );
		$thm_id = get_post_thumbnail_id( $post_id );
		$thm_url = '';
		if ( ! empty( $thm_id ) ) {
			$thm_url = wp_get_attachment_image_src( $thm_id, 'slider-gallery' );
		}
		?>
		<div class="photo-gallery flexslider style1" id="photo-gallery1" data-animation="slide" data-sync="#image-carousel1">
			<ul class="slides">
				<?php
					if ( empty( $gallery_imgs ) && ! empty( $thm_url ) ) {
						echo '<li><img src="' . esc_url( $thm_url[0] ) . '" alt="thumbnail image" /></li>';
					}
					if ( ! empty( $gallery_imgs ) ) {
						foreach ( $gallery_imgs as $gallery_img ) {
							$img = wp_get_attachment_image_src( $gallery_img, 'slider-gallery' );
							echo '<li><img src="' . esc_url( $img[0] ) . '" alt="gallery image" /></li>';
						}
					}
				?>
			</ul>
		</div>
		<div class="image-carousel style1" id="image-carousel1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photo-gallery1">
			<ul class="slides">
				<?php
					$thm_id = get_post_thumbnail_id( $post_id );
					if ( empty( $gallery_imgs ) && ! empty( $thm_url ) ) {
						$thm_url = wp_get_attachment_image_src( $thm_id );
						echo '<li><img src="' . esc_url( $thm_url[0] ) . '" alt="thumbnail image" /></li>';
					}
					if ( ! empty( $gallery_imgs ) ) {
						foreach ( $gallery_imgs as $gallery_img ) {
							$img = wp_get_attachment_image_src( $gallery_img );
							echo '<li><img src="' . esc_url( $img[0] ) . '" alt="gallery image" /></li>';
						}
					}
				?>
			</ul>
		</div>
		<?php
	}
}

/*
 * Single Accommodation Block HTML
 */
if ( ! function_exists( 'trav_acc_get_acc_list_sigle' ) ) {
	function trav_acc_get_acc_list_sigle( $acc_id, $list_style, $before_article='', $after_article='', $show_badge=false, $animation='' ) {
		echo wp_kses_post( $before_article );
		// $acc_id = trav_acc_clang_id( $acc_id );
		$avg_price = get_post_meta( $acc_id, 'trav_accommodation_avg_price', true );
		$review = get_post_meta( $acc_id, 'review', true );
		$review = ( ! empty( $review ) )?round( $review, 1 ):0;
		$brief = get_post_meta( $acc_id, 'trav_accommodation_brief', true );
		if ( empty( $brief ) ) {
			$brief = apply_filters('the_content', get_post_field('post_content', $acc_id));
			$brief = wp_trim_words( $brief, 20, '' );
		}
		$loc = get_post_meta( $acc_id, 'trav_accommodation_loc', true );
		$discount_rate = get_post_meta( $acc_id, 'trav_accommodation_discount_rate', true );

		if ( $list_style == "style1" || $list_style == "style2" ) { ?>
			<article class="box">
				<figure <?php echo wp_kses_post( $animation ) ?>>
					<a href="#" data-post_id="<?php echo esc_attr( $acc_id ) ?>" class="hover-effect popup-gallery"><?php echo get_the_post_thumbnail( $acc_id, 'biggallery-thumb' );  ?></a>
					<?php if ( $show_badge && ! empty( $discount_rate ) ) { ?>
						<span class="discount"><span class="discount-text"><?php echo esc_html( $discount_rate . '%' . ' ' . __( 'Discount', 'trav' ) ); ?></span></span>
					<?php } ?>
				</figure>
				<div class="details">
					<?php if ( $list_style == "style1" ) {
						if ( ! empty( $avg_price ) && is_numeric( $avg_price ) ) { ?>
							<span class="price"><small><?php _e( 'Per Malam', 'trav' ) ?></small><?php echo esc_html( trav_get_price_field( $avg_price ) ); ?></span>
						<?php } ?>
						<h4 class="box-title">
							<a href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>"><?php echo esc_html( get_the_title( $acc_id ) ); ?></a>
							<?php echo trav_acc_get_star_rating( $acc_id ); ?>
							<small><?php echo esc_html( trav_acc_get_city( $acc_id ) . ' ' . trav_acc_get_country( $acc_id ) ); ?></small>
						</h4>
						<div class="feedback">
							<div data-placement="bottom" data-toggle="tooltip" class="five-stars-container" title="<?php echo esc_attr( $review . ' ' . __( 'stars', 'trav' ) ) ?>"><span style="width: <?php echo esc_attr( $review / 5 * 100 ) ?>%;" class="five-stars"></span></div>
							<span class="review"><?php echo esc_html( trav_get_review_count( $acc_id ) . ' ' .  __('Ulasan', 'trav') ); ?></span>
						</div>
						<p class="description"><?php echo wp_kses_post( $brief ); ?></p>
                        <style type="text/css">
                            a.s{
                                background: #E35403;
                            }
                            a.s:hover{
                                background: #f75d05;
                            }
                            a.pilih{
                                background: #09477E;
                            }
                            a.pilih:hover{
                                background: #0d75d1;
                            }
                        </style>
						<div class="action clearfix">
							<?php
							if ( ! empty( $loc ) ) { ?>
								<a class="button pilih btn-small" href="<?php echo esc_url( get_permalink( $acc_id ) );  ?>"><?php _e( 'PILIH', 'trav' ); ?></a>
								<a class="button s btn-small popup-map" href="#" data-box="<?php echo esc_attr( $loc ) ?>"><?php _e( 'LIHAT PETA', 'trav' ); ?></a>
							<?php } else { ?>
								<a class="button btn-small full-width" href="<?php echo esc_url( get_permalink( $acc_id ) );  ?>"><?php _e( 'PILIH', 'trav' ); ?></a>
							<?php } ?>
						</div>
					<?php } elseif ( $list_style == "style2" ) { ?>
						<a title="View all" href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>" class="pull-right button uppercase"><?php _e( 'Pilih', 'trav' ); ?></a>
						<h4 class="box-title"><a href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>"><?php echo esc_html( get_the_title( $acc_id ) ); ?></a><?php echo trav_acc_get_star_rating( $acc_id ); ?></h4>
						<?php if ( ! empty( $avg_price ) && is_numeric( $avg_price ) ) { ?>
							<label class="price-wrapper">
								<span class="price-per-unit"><?php echo esc_html( trav_get_price_field( $avg_price ) ); ?></span><?php _e( 'Per Malam', 'trav' ) ?>
							</label>
						<?php }
					} ?>
				</div>
			</article>

		<?php } elseif ( $list_style == "style3" ) { ?>
			<article class="box">
				<figure class="col-sm-5 col-md-4">
					<a href="#" data-post_id="<?php echo esc_attr( $acc_id ) ?>" class="hover-effect popup-gallery"><?php echo get_the_post_thumbnail( $acc_id, 'biggallery-thumb' );  ?></a>
					<?php if ( $show_badge && ! empty( $discount_rate ) ) { ?>
						<span class="discount"><span class="discount-text"><?php echo esc_html( $discount_rate . '%' . ' ' . __( 'Discount', 'trav' ) ); ?></span></span>
					<?php } ?>
				</figure>
				<div class="details col-xs-12 col-sm-7 col-md-8">
					<div>
						<div>
							<h4 class="box-title"><a href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>"><?php echo esc_html( get_the_title( $acc_id ) ); ?></a><small><i class="soap-icon-departure yellow-color"></i> <?php echo esc_html( trav_acc_get_city( $acc_id ) . ' ' . trav_acc_get_country( $acc_id ) ); ?></small></h4>
						</div>
						<div>
							<div class="five-stars-container">
								<span class="five-stars" style="width: <?php echo esc_attr( $review / 5 * 100 ) ?>%;"></span>
							</div>
							<span class="review"><?php echo esc_html( trav_get_review_count( $acc_id ) . ' ' .  __('ulasan', 'trav') ); ?></span>

						</div>
					</div>
					<div>
						<p><?php echo wp_kses_post( $brief ); ?></p>
						<div>
							<span class="price"><small><?php _e( 'Per Malam', 'trav' ) ?></small><?php echo esc_html( trav_get_price_field( $avg_price ) ); ?></span>
							<a class="button btn-small full-width text-center" title="<?php _e( 'Pilih', 'trav' ); ?>" href="<?php echo esc_url( get_permalink( $acc_id ) );  ?>"><?php _e( 'PILIH', 'trav' ); ?></a>
						</div>
					</div>
				</div>
			</article>

		<?php } elseif ( $list_style == "style4" ) { ?>
			<div class="row">
				<div class="col-xs-2">
					<a href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>" class="badge-container">
						<?php if ( $show_badge && ! empty( $discount_rate ) ) { ?>
							<span class="badge-content"><?php echo __( 'simpan', 'trav' ) . '<br />' . esc_html( $discount_rate ) . '%'; ?></span>
						<?php } ?>
						<?php echo get_the_post_thumbnail( $acc_id, 'widget-thumb' );  ?>
					</a>
				</div>
				<div class="col-xs-8">
					<h5 class="box-title"><a href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>"><?php echo esc_html( get_the_title( $acc_id ) ); ?></a><small><?php echo esc_html( trav_acc_get_city( $acc_id ) . ' ' . trav_acc_get_country( $acc_id ) ); ?></small></h5>
					<p class="no-margin"><?php echo wp_kses_post( $brief ); ?></p>
				</div>
				<div class="col-xs-2">
					<span class="price"><small><?php _e( 'Per Malam', 'trav' ) ?></small><?php echo esc_html( trav_get_price_field( $avg_price ) ); ?></span>
					<br /><br />
					<a class="button green-bg pull-right" href="<?php echo esc_url( get_permalink( $acc_id ) ); ?>"><?php _e( 'PILIH', 'trav' ); ?></a>
				</div>
			</div>
		<?php }
		echo wp_kses_post( $after_article );
	}
}