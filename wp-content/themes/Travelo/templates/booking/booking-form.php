<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$user_info = trav_get_current_user_info();
$_countries = trav_get_all_countries();
global $trav_options;

do_action( 'trav_booking_form_before' ); 
?>

<div class="person-information">
	<h2 style="margin-left: 15px "><?php _e( '1. INFO DATA PEMESAN', 'trav'); ?></h2>
    <div style="margin: 0" class="col-sm-6 col-md-10">
	<div class="form-group row">
        <div class="col-sm-6 col-md-2">
            <label><?php _e('Title', 'trav') ?></label>
            <select name="title" class="form-control">
                <option value="tuan">Tuan</option>
                <option value="nyonya">Nyonya</option>
                <option value="nona">Nona</option>
            </select>
        </div>
		<div class="col-sm-6 col-md-5">
			<label><?php _e( 'NAMA DEPAN', 'trav'); ?></label>
			<input type="text" name="first_name" class="form-control" value="<?php echo esc_attr( $user_info['first_name'] ) ?>" placeholder="" readonly/>
		</div>
		<div class="col-sm-6 col-md-5">
			<label><?php _e( 'NAMA BELAKANG', 'trav'); ?></label>
			<input type="text" name="last_name" class="form-control" value="<?php echo esc_attr( $user_info['last_name'] ) ?>" placeholder="" readonly/>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-6 col-md-6">
			<label><?php _e( 'ALAMAT EMAIL', 'trav'); ?></label>
			<input type="text" name="email" class="form-control" value="<?php echo esc_attr( $user_info['email'] ) ?>" placeholder="" />
		</div>
<!--		<div class="col-sm-6 col-md-5">-->
<!--			<label>--><?php //_e( 'VERIFIKASI ALAMAT EMAIL', 'trav'); ?><!--</label>-->
<!--			<input type="text" name="email2" class="input-text full-width" value="--><?php //echo esc_attr( $user_info['email'] ) ?><!--" placeholder="" />-->
<!--		</div>-->
        <div class="col-sm-6 col-md-6">
            <label><?php _e( 'TELEPON', 'trav'); ?></label>
            <input type="text" name="phone" class="form-control" value="<?php echo esc_attr( $user_info['phone'] ) ?>" placeholder="" />
        </div>
    </div>
<!--        <h2 style="margin-left: 15px; margin-top: 15px ">--><?php //_e( '2. DETAIL TAMU', 'trav'); ?><!--</h2>-->
<!--           <div class="warning small text-red" style="background-color: red">dsder</div>-->
<!--        <div style="margin: 0;background-color: blue" class="col-sm-6 col-md-10">-->
<!--            -->
<!--        </div>-->
    </div>
</div>

<div class="person-information">
    <div class="col-sm-6 col-md-10" style="margin-top:20px">
        <h2><?php _e( '2. DETAIL TAMU', 'trav'); ?></h2>
        <div class="form-group row">
            <div class="col-sm-6 col-md-2">
                <label><?php _e('Title', 'trav') ?></label>
                <select name="title" class="form-control">
                    <option value="tuan">Tuan</option>
                    <option value="nyonya">Nyonya</option>
                    <option value="nona">Nona</option>
                </select>
            </div>
            <div class="col-sm-6 col-md-5">
                <label><?php _e( 'NAMA DEPAN', 'trav'); ?></label>
                <input type="text" name="first_name" class="form-control" value="" placeholder="Nama Depan" />
            </div>
            <div class="col-sm-6 col-md-5">
                <label><?php _e( 'NAMA BELAKANG', 'trav'); ?></label>
                <input type="text" name="last_name" class="form-control" value="" placeholder="Nama Belakang"/>
            </div>
        </div>
    </div>
</div>

<div class="payment_methods">
    <div class="col-sm-6 col-md-6">
        <h2><?php _e('3. DETAIL PEMBAYARAN', 'trav'); ?></h2>
    </div>

</div>
<!--	<div class="form-group row">-->
<!--		<div class="col-sm-6 col-md-5">-->
<!--			<label>--><?php //_e( 'KODE NEGARA', 'trav'); ?><!--</label>-->
<!--			<div class="selector">-->
<!--				<select class="full-width" name="country_code">-->
<!--					--><?php //foreach ( $_countries as $_country ) { ?>
<!--						<option value="--><?php //echo esc_attr( $_country['d_code'] ) ?><!--" --><?php //selected( $user_info['country_code'], $_country['name'] . ' (' . $_country['d_code'] . ')' ); ?><!--<!--><?php //echo esc_html( $_country['name'] . ' (' . $_country['d_code'] . ')' ) ?><!--</option>-->
<!--					--><?php //} ?>
<!--				</select>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--	<div class="form-group row">-->
<!--		<div class="col-sm-6 col-md-5">-->
<!--			<label>--><?php //_e( 'ALAMAT LENGKAP', 'trav'); ?><!--</label>-->
<!--			<input type="text" name="address" class="input-text full-width" value="--><?php //echo esc_attr( $user_info['address'] ) ?><!--" placeholder="" />-->
<!--		</div>-->
<!--		<div class="col-sm-6 col-md-5">-->
<!--			<label>--><?php //_e( 'KOTA', 'trav'); ?><!--</label>-->
<!--			<input type="text" name="city" class="input-text full-width" value="--><?php //echo esc_attr( $user_info['city'] ) ?><!--" placeholder="" />-->
<!--		</div>-->
<!--	</div>-->
<!--	<div class="form-group row">-->
<!--		<div class="col-sm-6 col-md-5">-->
<!--			<label>--><?php //_e( 'KODE POS', 'trav'); ?><!--</label>-->
<!--			<input type="text" name="zip" class="input-text full-width" value="--><?php //echo esc_attr( $user_info['zip'] ) ?><!--" placeholder="" />-->
<!--		</div>-->
<!--		<div class="col-sm-6 col-md-5">-->
<!--			<label>--><?php //_e( 'NEGARA', 'trav'); ?><!--</label>-->
<!--			<div class="selector">-->
<!--				<select class="full-width" name="country">-->
<!--					--><?php //foreach ( $_countries as $_country ) { ?>
<!--						<option value="--><?php //echo esc_attr( $_country['name'] ) ?><!--" --><?php //selected( $user_info['country'], $_country['name'] ); ?><!--><?php //echo esc_html( $_country['name'] ) ?><!--</option>-->
<!--					--><?php //} ?>
<!--				</select>-->
<!--			</div>-->
<!--		</div>-->
<!--    </div>-->
<!--	</div>-->
<!--	<div class="form-group row">-->
<!--		<div class="col-sm-12 col-md-10">-->
<!--			<label>--><?php //_e( 'PESAN TAMBAHAN (susuai ketersediaan operator/hotel)', 'trav'); ?><!--</label>-->
<!--			<textarea name="special_requirements" class="full-width" rows="4"></textarea>-->
<!--		</div>-->
<!--	</div>-->
<hr />

<?php do_action( 'trav_booking_form_after' ); ?>

<div class="form-group row confirm-booking-btn">
	<div class="col-sm-6 col-md-5">
		<button type="submit" class="full-width btn-large">
			<?php $button_text = __( 'KONFIRMASI PESANAN', 'trav'); ?>
			<?php echo apply_filters( 'trav_booking_button_text', $button_text ); ?>
		</button>
	</div>
</div>