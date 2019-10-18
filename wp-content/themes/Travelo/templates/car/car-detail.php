<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * Car Detail
 */
global $car_id;
$dt_dd = '<dt>%s:</dt><dd>%s</dd>';
if ( ! empty( $car_id ) ) : ?>

	<h3><?php echo __( 'Rincian Kendaraan', 'trav' ) ?></h3>

	<h4><a href="<?php echo esc_url( get_permalink( $car_id ) ); ?>"><?php echo esc_html( get_the_title( $car_id ) ) ?></a></h4>
	<dl class="term-description">
		<?php
		$car_meta = get_post_meta( $car_id );
		$car_type = wp_get_post_terms( $car_id, 'car_type' );
		$car_agent = wp_get_post_terms( $car_id, 'car_agent' );
		
		if ( ! empty ( $car_agent ) ) {
			echo sprintf( $dt_dd, __( 'Penyedia Layanan', 'trav' ), esc_attr( $car_agent[0]->name ) );
		}
		if ( ! empty ( $car_type ) ) {
			echo sprintf( $dt_dd, __( 'Tipe Kendaraan', 'trav' ), esc_attr( $car_type[0]->name ) );
		}
		if ( ! empty ( $car_meta["trav_car_passenger"] ) ) {
			echo sprintf( $dt_dd, __( 'Penumpang', 'trav' ), esc_html( $car_meta["trav_car_passenger"][0] ) );
		}
		if ( ! empty ( $car_meta["trav_car_baggage"] ) ) {
			echo sprintf( $dt_dd, __( 'Bagasi', 'trav' ), esc_html( $car_meta["trav_car_baggage"][0] ) );
		}		
		?>
	</dl>

<?php endif;