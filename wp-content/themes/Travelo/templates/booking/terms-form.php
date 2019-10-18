<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
 * terms form
 */
global $trav_options;
?>
<div class="form-group">
	<div class="checkbox">
		<label><input name="agree" value="agree" type="checkbox" checked><?php printf( __('Dengan melanjutkan pemesanan ini, Kamu telah tunduk dan setuju dengan <a href="%s" target="_blank"><span class="skin-color">Syarat dan Ketentuan Pemesanan</span></a>.', 'trav' ), trav_get_permalink_clang( $trav_options['terms_page'] ) ) ?></label>
	</div>
</div>