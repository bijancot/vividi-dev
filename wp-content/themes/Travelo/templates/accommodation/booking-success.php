<?php
/*
 * Accommodation Booking Success Form
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // exit if accessed directly
}

global $logo_url, $search_max_rooms, $search_max_adults, $search_max_kids;
global $booking_data, $acc_id, $room_type_id, $deposit_rate, $date_from, $date_to;

$dt_dd = '<dt>%s:</dt><dd>%s</dd>';
$acc_meta = get_post_meta( $acc_id );
$tax_rate = get_post_meta( $acc_id, 'trav_accommodation_tax_rate', true );
?>

<div class="row">
    <div class="col-sm-8 col-md-12">
        <div class="booking-information travelo-box">

            <?php do_action( 'trav_acc_conf_form_before', $booking_data ); ?>

            <?php if ( ( isset( $_REQUEST['payment'] ) && ( $_REQUEST['payment'] == 'success' ) ) || ( isset( $_REQUEST['message'] ) && ( $_REQUEST['message'] == 1 ) ) ): ?>
                <h2><?php _e( 'KONFIRMASI PEMESANAN KAMU !', 'trav' ); ?></h2>

                <hr />

                <div class="booking-confirmation clearfix">
<!--                    <i class="soap-icon-recommend icon circle"></i>-->
                        <h4 style="text-align: center" class="main-message"><?php _e( 'Terima Kasih. Pesanan kamu sudah masuk dalam sistem kami, dan Kami telah mengirim email ke Kamu.', 'trav' ); ?></h4>
                        <p style="color: #000000; text-align: center"><?php _e( 'Lakukan Pembayaran sebelum 60 Menit Kedepan atau pesanan kamu akan terhapus Otomatis oleh Sistem.', 'trav' ); ?></p>
                    <!-- <a href="#" class="button btn-small print-button uppercase">print Details</a> -->
                </div>
                <br />
            <?php endif; ?>
<!--            <dl class="term-description">-->
<!--                --><?php
//                $booking_detail = array(
//                    'booking_no'    => array( 'label' => __('Kode Booking', 'trav'), 'pre' => '', 'sur' => '' ),
////                    'pin_code'      => array( 'label' => __('PIN', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'email'         => array( 'label' => __('Alamat E-mail', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'no_ktp'        => array( 'label' => __('Nomor KTP', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'no_passport'   => array( 'label' => __('Nomor Passport', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'tgl_dari'      => array( 'label' => __('Check-In', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'tgl_ke'        => array( 'label' => __('Check-out', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'rooms'         => array( 'label' => __('Kamar', 'trav'), 'pre' => '', 'sur' => '' ),
//                    'adults'        => array( 'label' => __('Dewasa', 'trav'), 'pre' => '', 'sur' => ' Orang' ),
//                    'valid_until',
//                    'first_name',
//                    'last_name',
//                    'bank',
//                    'no_rekening',
//                    'total_price',
//                );

                $accommodation_name = get_the_title( $booking_data['accommodation_id'] );
                $booking_total_price = esc_html( trav_get_price_field( $booking_data['total_price'] * $booking_data['exchange_rate'], $booking_data['currency_code'], 0 ) );
                $booking_checkin_time = date( 'l,j F Y', trav_strtotime($booking_data['date_from']) );
                $booking_checkout_time = date( 'l,j F Y', trav_strtotime($booking_data['date_to']) );
                $booking_valid_until = date( 'l,j F Y H:i:s', trav_strtotime($booking_data['valid_until']) );
                $booking_created_time = date( 'l,j F Y H:i:s', trav_strtotime($booking_data['created']) );
//                foreach ( $booking_detail as $field => $value ) {
//                    if ( empty( $$field ) ) $$field = empty( $booking_data[ $field ] )?'':$booking_data[ $field ];
//                    if ( ! empty( $$field ) ) {
//                        $content = $value['pre'] . $$field . $value['sur'];
//                        echo sprintf( $dt_dd, esc_html( $value['label'] ), esc_html( $content ) );
//                        echo ($booking_data['booking_no']);
//                    }
//                }
//                if ( ! empty( $booking_data[ 'kids' ] ) ) {
//                    echo sprintf( $dt_dd, __('Anak', 'trav'), esc_html( $booking_data[ 'kids' ] ) );
//                    for( $i = 1; $i <= $booking_data[ 'kids' ]; $i++ ) {
//                        echo sprintf( $dt_dd, sprintf( __('Umur Anak %d', 'trav'), $i ), esc_html( $booking_data[ 'child_ages' ][$i-1] ) );
//                    }
//                }
//                ?>
<!--                <div class="form-group row">-->
<!--                    <div class="col-sm-6 col-md-12" style="background-color: #D2D1D1">-->
<!--                        <img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45" />-->
<!--                        <a>E-Payment</a>-->
<!--                        <a style="color: #003580; font-family: arial; font-size: 20px; font-weight: bold;float: right">[booking_no]</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="form-group row">-->
<!--                    <div class="col-sm-6 col-md-12" style="background-color: #F0ECEC">-->
<!--                        <a>Segera selesaikan pembayaran Kamu sebelum</a><br>-->
<!--                        <a>[booking_created]</a>-->
<!--                    </div>-->
<!--                </div>-->
            </dl>
            <div style="width: 1200px;  margin:0 auto; margin-left: 150px">
                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #cccccc">
                        <img src="https://vividi.id/wp-content/uploads/2019/10/new-logo.png" alt="" width="205" height="45" style="margin-top: 10px;margin-bottom: 10px; margin-left: 5px" />
                        <span style="color: #000000;">E-Payment</span>
                        <span style="margin-right: 15px; margin-top: 20px; color: #003580; font-family: arial; font-size: 20px; font-weight: bold;float: right"><?php echo($booking_data['booking_no']); ?></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #e6e6e6">
                        <span style="color: #000000; font-family: arial; font-size: 20px; margin-left: 20px; margin-top: 10px; display:inline-block;">Segera selesaikan pembayaran Kamu sebelum</span><br>
                        <?php
                        $a = explode(',', $booking_valid_until);
                        $b = explode(' ', $a[1] );
                        if ($a[0] == 'Monday') {
                            $a[0] = 'Senin';
                        } else if ($a[0] == 'Tuesday') {
                            $a[0] = 'Selasa';
                        } else if ($a[0] == 'Wednesday') {
                            $a[0] = 'Rabu';
                        } else if ($a[0] == 'Thursday') {
                            $a[0] = 'Kamis';
                        } else if ($a[0] == 'Friday') {
                            $a[0] = "Jum'at";
                        } else if ($a[0] == 'Saturday') {
                            $a[0] = 'Sabtu';
                        } else {
                            $a[0] = 'Minggu';
                        }
                        if ($b[1] == 'January') {
                            $b[1] = 'Januari';
                        } else if ($b[1] == 'February') {
                            $b[1] = 'Februari';
                        } else if ($b[1] == 'March') {
                            $b[1] = 'Maret';
                        } else if ($b[1] == 'April') {
                            $b[1] = 'April';
                        } else if ($b[1] == 'May') {
                            $b[1] = 'Mei';
                        } else if ($b[1] == 'June') {
                            $b[1] = 'Juni';
                        } else if ($b[1] == 'July') {
                            $b[1] = 'Juli';
                        } else if ($b[1] == 'August') {
                            $b[1] = 'Agustus';
                        } else if ($b[1] == 'September') {
                            $b[1] = 'September';
                        } else if ($b[1] == 'October') {
                            $b[1] = 'Oktober';
                        } else if ($b[1] == 'November') {
                            $b[1] = 'November';
                        } else {
                            $b[1] = 'Desember';
                        }
                        ?>
                        <span style="font-family: arial; color: #023f75; font-size: 17px; margin-left: 20px; margin-bottom: 10px; display:inline-block;"><b><?php echo ($a[0].", ".$b[0]." ".$b[1]." ".$b[2]." ".$b[3]); ?></b></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #cccccc">
                        <div style="float: right; background-color: #0a447a;">
                            <span style="font-family: arial; display: inline-block; color: white; margin: 10px 10px 10px 10px">PEMESANAN</span>
                        </div>
                        <span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 20px"><b><?php echo ($accommodation_name); ?></b></span><br>
                        <?php
                        $a = explode(',', $booking_checkin_time);
                        $b = explode(' ', $a[1] );
                        if ($a[0] == 'Monday') {
                            $a[0] = 'Senin';
                        } else if ($a[0] == 'Tuesday') {
                            $a[0] = 'Selasa';
                        } else if ($a[0] == 'Wednesday') {
                            $a[0] = 'Rabu';
                        } else if ($a[0] == 'Thursday') {
                            $a[0] = 'Kamis';
                        } else if ($a[0] == 'Friday') {
                            $a[0] = "Jum'at";
                        } else if ($a[0] == 'Saturday') {
                            $a[0] = 'Sabtu';
                        } else {
                            $a[0] = 'Minggu';
                        }
                        if ($b[1] == 'January') {
                            $b[1] = 'Januari';
                        } else if ($b[1] == 'February') {
                            $b[1] = 'Februari';
                        } else if ($b[1] == 'March') {
                            $b[1] = 'Maret';
                        } else if ($b[1] == 'April') {
                            $b[1] = 'April';
                        } else if ($b[1] == 'May') {
                            $b[1] = 'Mei';
                        } else if ($b[1] == 'June') {
                            $b[1] = 'Juni';
                        } else if ($b[1] == 'July') {
                            $b[1] = 'Juli';
                        } else if ($b[1] == 'August') {
                            $b[1] = 'Agustus';
                        } else if ($b[1] == 'September') {
                            $b[1] = 'September';
                        } else if ($b[1] == 'October') {
                            $b[1] = 'Oktober';
                        } else if ($b[1] == 'November') {
                            $b[1] = 'November';
                        } else {
                            $b[1] = 'Desember';
                        }
                        ?>
                        <span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 5px; display:inline-block; font-size: 15px"><?php echo ($a[0].", ".$b[0]." ".$b[1]." ".$b[2]. " |"); ?></span>
                        <span style="color: #023f75; font-family: arial; margin-bottom: 10px;margin-top: 5px; display:inline-block; font-size: 15px"><?php echo esc_html( trav_get_day_interval( $booking_data['date_from'], $booking_data['date_to'] ) . ' ' . __( 'Malam', 'trav' ) ); ?></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
                        <span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 20px"><b>Yth, <?php echo ($booking_data['first_name'])," ", ($booking_data['last_name']) ; ?></b></span><br>
                        <span style="color: #000000; font-family: arial; margin-bottom: 10px; margin-left: 20px; margin-top: 2px; display:inline-block; font-size: 15px">Mohon Pembayaran di Transfer ke</span><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #e6e6e6">
                        <span style="color: #000000; font-family: arial; margin-left: 20px; margin-top: 10px; display:inline-block; font-size: 22px"><b>Nomor Rekening</b></span><br>
                        <span style="color: #000000; font-family: arial; margin-bottom: 10px; margin-left: 20px; margin-top: 2px; display:inline-block; font-size: 15px">PT. Vividi Transindo Utama</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
                        <img src="<?php echo ($booking_data['bank']);?>" style="display: inline;width:72px; height:48px; margin-left: 20px; border-radius:5px; margin-top: 10px; margin-bottom: 10px "/>
                        <span id="copyTarget" style="font-family: arial; margin-top: 20px;float: right; font-size: 18px; margin-right: 10px"><?php echo ($booking_data['no_rekening'])?> <img style="width: 20px; height: 20px" src="https://vividi.id/wp-content/themes/Travelo/images/copy.png" id="copyButton"/></span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-8" style="background-color: #e6e6e6">
                        <span style="display:inline-block; font-family: arial; margin-bottom: 10px; margin-left: 20px; margin-top: 10px; font-size: 20px; color: red;">Total : <?php echo ($booking_total_price); ?></span>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
                        <span style="color: #000000; font-family: arial; font-size: 20px; display: inline-block; margin-left: 20px; margin-top: 10px">Apabila Kamu sudah melakukan pembayaran</span><br>
                        <span style="color: #000000; font-family: arial; font-size: 12px; margin-left: 20px; display: inline-block; margin-top: 2px">Lakukan konfirmasi pembayaran agar Kami dapat segera memproses voucher hotel ke alamat Email Kamu.</span><br>
                        <span style="color: #000000; font-family: arial; font-size: 12px; margin-left: 20px; display: inline-block; margin-top: 2px; margin-bottom: 10px;">Caranya mudah, klik nomor rekening yang sudah Kamu bayar di atas.</span>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
                        <span style="color: #000000; font-family: arial; font-size: 20px; display: inline-block; margin-left: 20px; margin-top: 10px">Ada pertanyaan lainnya ?</span><br>
                        <span style="color: #000000; font-family: arial; font-size: 12px; margin-left: 20px; display: inline-block; margin-top: 2px; margin-bottom: 10px;">Hubungi kami segera, dengan senang hati kami akan membantu 24/7 hari.</span><br>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px; display: inline-block; margin-right: 14px">
                    <div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
                        <span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Kirim Pesan Cepat</span><br>
                        <a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-left: 10px; margin-right:5px; margin-top: 10px; margin-bottom: 10px"/>
                        </a>
                        <a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6287885124429&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
                        </a>
                        <a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6285933736049&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
                        </a>
                        <a style="text-decoration: none;" href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="https://vividi.id/wp-content/themes/Travelo/images/whatsapp.png" alt="" style="height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
                        </a>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;display: inline-block; margin-right: 14px">
                    <div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
                        <span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 10px; margin-top: 10px; margin-right: 10px">Bantuan Melalui Email</span><br>
                        <img src="https://vividi.id/wp-content/themes/Travelo/images/email.png" alt="" style="margin-left: 10px; height: 25px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
                        <a href="mailto:info@vividi.id">
                            <span style="color: #023f75; text-decoration: none;font-family: arial; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right">info@vividi.id</span>
                        </a>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;display: inline-block; margin-right: 14px">
                    <div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
                        <span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan Telepon</span><br>
                        <img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt="" style="height: 25px; margin-left: 10px; margin-right:5px;margin-top: 10px; margin-bottom: 10px"/>
                        <a style="color: #023f75; text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 20px;  float: right" href="tel:+623414382253">+62 341 438 2253</a>
                    </div>
                </div>

                <div class="row" style="margin-top: 10px;display: inline-block;">
                    <div class="col-sm-6 col-md-12" style="background-color: #F5F4F4;height:75px;">
                        <span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-left: 20px; margin-top: 10px; margin-right: 15px">Bantuan mendesak 24 jam</span><br>
                        <img src="https://vividi.id/wp-content/themes/Travelo/images/telephone.jpg" alt="" style="height: 25px; margin-left: 10px;margin-top: 10px; margin-bottom: 10px"/>
                        <a style="color: #023f75; text-decoration: none; display: inline-block; margin-top: 20px; margin-right: 30px;  float: right" href="tel:+6281211118486">+62 812 1111 8486</a>
                    </div>
                </div><hr>

                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6 col-md-8" style="background-color: #F5F4F4">
			<span style="color: #000000; font-family: arial; font-size: 15px; margin-left: 20px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">Email ini ditujukan kepada <?php echo ($booking_data['first_name'])," ", ($booking_data['last_name']) ; ?>, karena telah melakukan
			pemesanan di vividi.id</span><br>
                    </div>
                </div><hr>

                <div class="row" style="margin-top: 10px">
                    <div class="col-sm-6 col-md-8" style="background-color: #F5F4F4; text-align: center">
                        <span style="color: #000000; font-family: arial; font-size: 15px; display: inline-block; margin-top: 10px; margin-bottom: 10px;">© 2019 PT. Vividi Transindo Utama</span><br>
                    </div>
                </div>
            </div>

            <hr />

<!--            <dl class="term-description">-->
<!--                <dt>--><?php //echo __( 'Kamar', 'trav' ) ?><!--:</dt><dd>--><?php //echo esc_html( trav_get_price_field( $booking_data['room_price'] * $booking_data['exchange_rate'], $booking_data['currency_code'], 0 ) ) ?><!--</dd>-->
<!---->
<!--                --><?php //if ( ! empty( $tax_rate ) ) : ?>
<!--                    <dt>--><?php //printf( __('Pajak (%d%%) Termasuk', 'trav' ), $tax_rate ) ?><!--:</dt><dd>--><?php //echo esc_html( trav_get_price_field( $booking_data['tax'] * $booking_data['exchange_rate'], $booking_data['currency_code'], 0 ) ) ?><!--</dd>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php //if ( ! empty( $booking_data['discount_rate'] ) ) : ?>
<!--                    <dt>--><?php //echo __('Discount', 'trav' ) ?><!--:</dt><dd>--><?php //echo '-' . $booking_data['discount_rate'] . '%' ?><!--</dd>-->
<!--                --><?php //endif; ?>
<!---->
<!--                --><?php //if ( ! ( $booking_data['deposit_price'] == 0 ) ) : ?>
<!--                    <dt>--><?php //printf( __('Deposit (%d%%)', 'trav' ), $deposit_rate ) ?><!--:</dt><dd>--><?php //echo esc_html( trav_get_price_field( $booking_data['deposit_price'], $booking_data['currency_code'], 0 ) ) ?><!--</dd>-->
<!--                --><?php //endif; ?>
<!--            </dl>-->
<!--            -->
<!--            <dl class="term-description" style="font-size: 16px;" >-->
<!--                <dt style="text-transform: none;">--><?php //echo __( 'Total Harga', 'trav' ) ?><!--</dt><dd><b style="color: #09477E;">--><?php //echo esc_html( trav_get_price_field( $booking_data['total_price'] * $booking_data['exchange_rate'], $booking_data['currency_code'], 0 ) ) ?><!--</b></dd>-->
<!--            </dl>-->
<!--            <hr />-->
<!---->
<!--            --><?php //trav_get_template( 'acc-room-detail.php', '/templates/accommodation/' ); ?>
<!--            --><?php //do_action( 'trav_acc_conf_form_after', $booking_data ); ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="sidebar col-sm-4 col-md-3">-->
<!--        --><?php //if ( empty( $acc_meta["trav_accommodation_d_edit_booking"] ) || empty( $acc_meta["trav_accommodation_d_edit_booking"][0] ) || empty( $acc_meta["trav_accommodation_d_cancel_booking"] ) || empty( $acc_meta["trav_accommodation_d_cancel_booking"][0] ) ) { ?>
<!--            <div class="travelo-box edit-booking">-->
<!---->
<!--                --><?php //do_action( 'trav_acc_conf_sidebar_before', $booking_data ); ?>
<!---->
<!--                <h4>--><?php //echo __('Apa semuanya sudah benar ?','trav')?><!--</h4>-->
<!--                <p>--><?php //echo __( 'Kamu selalu dapat melihat atau mengubah pemesanan secara online - diperlukan pendaftaran', 'trav' ) ?><!--</p>-->
<!--                <ul class="triangle hover box">-->
<!--                    --><?php //if ( empty( $acc_meta["trav_accommodation_d_edit_booking"] ) || empty( $acc_meta["trav_accommodation_d_edit_booking"][0] ) ) { ?>
<!--                        <li><a href="#change-date" class="soap-popupbox">--><?php //echo __('Ubah Tanggal & Tamu','trav')?><!--</a></li>-->
<!--                        <li><a href="#change-room" class="soap-popupbox">--><?php //echo __('Ubah Kamar','trav')?><!--</a></li>-->
<!--                    --><?php //} ?>
<!--                    --><?php //if ( empty( $acc_meta["trav_accommodation_d_cancel_booking"] ) || empty( $acc_meta["trav_accommodation_d_cancel_booking"][0] ) ) { ?>
<!--                        <li><a href="--><?php //$query_args['pbsource'] = 'cancel_booking'; echo esc_url( add_query_arg( $query_args ,get_permalink( $acc_id ) ) );?><!--" class="btn-cancel-booking">--><?php //echo __('Batalkan Pesanan Saya','trav')?><!--</a></li>-->
<!--                    --><?php //} ?>
<!--                </ul>-->
<!---->
<!--                --><?php //do_action( 'trav_acc_conf_sidebar_after', $booking_data ); ?>
<!---->
<!--            </div>-->
<!--        --><?php //} ?>
<!--        --><?php //generated_dynamic_sidebar(); ?>
<!--    </div>-->
</div>
<!--<div id="change-date" class="travelo-box travelo-modal-box">-->
<!--    <div>-->
<!--        <a href="#" class="logo-modal">--><?php //bloginfo( 'name' );?><!--<img src="--><?php //echo esc_url( $logo_url ); ?><!--" alt="--><?php //bloginfo('name'); ?><!--"></a>-->
<!--    </div>-->
<!--    <form id="change-date-form" method="post">-->
<!--        <input type="hidden" name="action" value="acc_check_room_availability">-->
<!--        <input type="hidden" name="booking_no" value="--><?php //echo esc_attr( $booking_data['booking_no'] ); ?><!--">-->
<!--        <input type="hidden" name="pin_code" value="--><?php //echo esc_attr( $booking_data['pin_code'] ); ?><!--">-->
<!--        --><?php //wp_nonce_field( 'booking-' . $booking_data['booking_no'], '_wpnonce', false ); ?>
<!--        <div class="update-search clearfix">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-12">-->
<!--                    <label>--><?php //_e( 'CHECK IN','trav' ); ?><!--</label>-->
<!--                    <div class="datepicker-wrap validation-field from-today">-->
<!--                        <input name="date_from" type="text" placeholder="--><?php //echo trav_get_date_format('html') ?><!--" class="input-text full-width" value="--><?php //echo esc_attr( $date_from ); ?><!--" />-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-12">-->
<!--                    <label>--><?php //_e( 'CHECK OUT','trav' ); ?><!--</label>-->
<!--                    <div class="datepicker-wrap validation-field from-today">-->
<!--                        <input name="date_to" type="text" placeholder="--><?php //echo trav_get_date_format('html') ?><!--" class="input-text full-width" value="--><?php //echo esc_attr( $date_to ); ?><!--" />-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-4">-->
<!--                    <label>--><?php //_e( 'KAMAR','trav' ); ?><!--</label>-->
<!--                    <div class="selector validation-field">-->
<!--                        <select name="rooms" class="full-width">-->
<!--                            --><?php
//                                $rooms = ( isset( $booking_data['rooms'] ) && is_numeric( (int) $booking_data['rooms'] ) )?(int) $booking_data['rooms']:1;
//                                for ( $i = 1; $i <= $search_max_rooms; $i++ ) {
//                                    $selected = '';
//                                    if ( $i == $rooms ) $selected = 'selected';
//                                    echo '<option value="' . esc_attr( $i ). '" ' . esc_attr( $selected ) . '>' . esc_html( $i ). '</option>';
//                                }
//                            ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-4">-->
<!--                    <label>--><?php //_e( 'DEWASA','trav' ); ?><!--</label>-->
<!--                    <div class="selector validation-field">-->
<!--                        <select name="adults" class="full-width">-->
<!--                            --><?php
//                                $adults = ( isset( $booking_data['adults'] ) && is_numeric( (int) $booking_data['adults'] ) )?(int) $booking_data['adults']:1;
//                                for ( $i = 1; $i <= $search_max_adults; $i++ ) {
//                                    $selected = '';
//                                    if ( $i == $adults ) $selected = 'selected';
//                                    echo '<option value="' . esc_attr( $i ). '" ' . esc_attr( $selected ) . '>' . esc_html( $i ). '</option>';
//                                }
//                            ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-4">-->
<!--                    <label>--><?php //_e( 'ANAK','trav' ); ?><!--</label>-->
<!--                    <div class="selector validation-field">-->
<!--                        <select name="kids" class="full-width">-->
<!--                            --><?php
//                                $kids = ( isset( $booking_data['kids'] ) && is_numeric( (int) $booking_data['kids'] ) )?(int) $booking_data['kids']:0;
//                                for ( $i = 0; $i <= $search_max_kids; $i++ ) {
//                                    $selected = '';
//                                    if ( $i == $kids ) $selected = 'selected';
//                                    echo '<option value="' . esc_attr( $i ). '" ' . esc_attr( $selected ) . '>' . esc_html( $i ). '</option>';
//                                }
//                            ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="clearer"></div>-->
<!--                <div class="col-xs-12 age-of-children --><?php //if ( $kids == 0) echo 'no-display'?><!--">-->
<!--                    <div class="row">-->
<!--                    --><?php
//                        $kid_nums = ( $kids > 0 )?$kids:1;
//                        for ( $kid_num = 1; $kid_num <= $kid_nums; $kid_num++ ) { ?>
<!--                    -->
<!--                        <div class="col-xs-4 child-age-field">-->
<!--                            <label>--><?php //echo esc_html( __( 'ANAK ', 'trav' ) . $kid_num ) ?><!--</label>-->
<!--                            <div class="selector validation-field">-->
<!--                                <select name="child_ages[]" class="full-width">-->
<!--                                    --><?php
//                                        $max_kid_age = 17;
//                                        $child_ages = ( isset( $booking_data['child_ages'][ $kid_num -1 ] ) && is_numeric( (int) $booking_data['child_ages'][ $kid_num -1 ] ) )?(int) $booking_data['child_ages'][ $kid_num -1 ]:0;
//                                        for ( $i = 0; $i <= $max_kid_age; $i++ ) {
//                                            $selected = '';
//                                            if ( $i == $child_ages ) $selected = 'selected';
//                                            echo '<option value="' . esc_attr( $i ). '" ' . esc_attr( $selected ) . '>' . esc_html( $i ). '</option>';
//                                        }
//                                    ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    --><?php //} ?>
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-12 update_booking_date_row">-->
<!--                    <div class="booking-details"></div>-->
<!--                    <div class="row">-->
<!--                        <div class="col-xs-12">-->
<!--                            <button id="update_booking_date" data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated bounce" type="submit">--><?php //_e( "UBAH SEKARANG", "trav" ); ?><!--</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<!--<div id="change-room" class="travelo-box travelo-modal-box">-->
<!--    <div>-->
<!--        <a href="#" class="logo-modal">--><?php //bloginfo( 'name' );?><!--<img src="--><?php //echo esc_url( $logo_url ); ?><!--" alt="--><?php //bloginfo('name'); ?><!--"></a>-->
<!--    </div>-->
<!--    <form id="change-room-form" method="post">-->
<!--        <input type="hidden" name="action" value="acc_change_room">-->
<!--        <input type="hidden" name="booking_no" value="--><?php //echo esc_attr( $booking_data['booking_no'] ); ?><!--">-->
<!--        <input type="hidden" name="pin_code" value="--><?php //echo esc_attr( $booking_data['pin_code'] ); ?><!--">-->
<!--        --><?php //wp_nonce_field( 'booking-' . $booking_data['booking_no'], '_wpnonce', false ); ?>
<!--        <div class="update-search clearfix">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-12">-->
<!--                    <label>--><?php //_e( 'KAMAR TERSEDIA','trav' ); ?><!--</label>-->
<!--                    <div class="selector validation-field">-->
<!--                        <select name="room_type_id" class="full-width" data-original-val="--><?php //echo esc_attr( $room_type_id ) ?><!--">-->
<!--                            --><?php
//                                $return_value = trav_acc_get_available_rooms( $acc_id, $booking_data['date_from'], $booking_data['date_to'], $booking_data['rooms'], $booking_data['adults'], $booking_data['kids'], $booking_data['child_ages'], $booking_data['booking_no'], $booking_data['pin_code'] );
//                                if ( ! empty ( $return_value ) && is_array( $return_value ) ) {
//                                    foreach ( $return_value['bookable_room_type_ids'] as $room_id ) {
//                                        $room_price = 0;
//                                        foreach ( $return_value['check_dates'] as $check_date ) {
//                                            $room_price += (float) $return_value['prices'][ $room_id ][ $check_date ]['total'];
//                                        }
//                                        $room_price *= ( 1 + $tax_rate / 100 );
//                                        $selected = '';
//                                        $room_id_lang = trav_room_clang_id( $room_id );
//                                        if ( $room_id_lang == $room_type_id ) $selected = 'selected';
//                                        echo '<option value="' . esc_attr( $room_id ) . '" ' . esc_attr( $selected ) . '>' . esc_html( get_the_title( $room_id_lang ) . ' (' . trav_get_price_field( $room_price, $booking_data['currency_code'], 0 ) . ')' ) . '</option>';
//                                    }
//                                }
//                            ?>
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-12">-->
<!--                    <button id="update_booking_room" data-animation-duration="1" data-animation-type="bounce" class="full-width icon-check animated bounce" type="submit">--><?php //_e( "UBAH KAMAR", "trav" ); ?><!--</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->
<!--</div>-->
<style>#ui-datepicker-div {z-index: 10004 !important;} .update-search > div.row > div {margin-bottom: 10px;} .booking-details .other-details dt, .booking-details .other-details dd {padding: 0.2em 0;} .update-search > div.row > div:last-child {margin-bottom:0 !important;} </style>
<script>
    tjq = jQuery;
    tjq(document).ready(function(){
        tjq('.btn-cancel-booking').click(function(e){
            e.preventDefault();
            var r = confirm("<?php echo __('Kamu yakin akan membatalkan pesanan ini?', 'trav') ?>");
            if (r == true) {
                tjq.ajax({
                    type: "POST",
                    url: ajaxurl,
                    data: {
                        action : 'acc_cancel_booking',
                        edit_booking_no : '<?php echo esc_js( $booking_data['booking_no'] ) ?>',
                        pin_code : '<?php echo esc_js( $booking_data['pin_code'] ) ?>'
                    },
                    success: function ( response ) {
                        if ( response.success == 1 ) {
                            trav_show_modal(1,response.result);
                            setTimeout(function(){ window.location.href = tjq('.btn-cancel-booking').attr('href'); }, 3000);
                        } else {
                            alert( response.result );
                        }
                    }
                });
            }
            return false;
        });
        tjq('body').on('change', '#change-date-form input, #change-date-form select', function(){
            var booking_data = tjq('#change-date-form').serialize();
            tjq('.update_booking_date_row').hide();
            var date_from = tjq('#change-date-form').find('input[name="date_from"]').datepicker("getDate").getTime();
            var date_to = tjq('#change-date-form').find('input[name="date_to"]').datepicker("getDate").getTime();
            var one_day=1000*60*60*24;
            var minimum_stay = 0;
            if (date_from >= date_to) { alert('<?php echo __( 'Tangga Check In kamu setelah Tanggal Check Out. Periksa kembali.', 'trav' ); ?>'); return false; }

            <?php if ( ! empty( $acc_meta["trav_accommodation_minimum_stay"] ) ) { ?>

                minimum_stay = <?php echo esc_js( $acc_meta["trav_accommodation_minimum_stay"][0] )?>;
                if (date_from + one_day * minimum_stay - date_to > 0) { alert('<?php echo sprintf( __( 'Minimu menginap di properti ini %d Malam. Silahkan ubah atau cari yang lain.', 'trav' ), $acc_meta["trav_accommodation_minimum_stay"][0] ) ?>'); return false; }

            <?php } ?>

            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: booking_data,
                success: function(response){
                    if ( response.success == 1 ) {
                        tjq('.booking-details').html(response.result);
                        tjq('.update_booking_date_row').show();
                    } else {
                        tjq('.update_booking_date_row').hide();
                        alert( response.result );
                    }
                }
            });
        });
        tjq('body').on('click', '#update_booking_date', function(e){
            e.preventDefault();
            tjq('#change-date-form input[name="action"]').val('acc_update_booking_date');
            var booking_data = tjq('#change-date-form').serialize();
            tjq('.travelo-modal-box').fadeOut();
            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: booking_data,
                success: function(response){
                    if ( response.success == 1 ) {
                        tjq('.opacity-overlay').fadeOut(400,function(){trav_show_modal( 1, response.result, '' )});
                        setTimeout(function(){ location.reload(); }, 3000);
                    } else {
                        trav_show_modal( 0, response.result, '' );
                    }
                }
            });
            return false;
        });
        tjq('#update_booking_room').click(function(){
            if ( tjq('select[name="room_type_id"]').val() == tjq('select[name="room_type_id"]').data('original-val') ) {
                tjq(".opacity-overlay").fadeOut();
                return false;
            }
            var booking_data = tjq('#change-room-form').serialize();
            tjq('.travelo-modal-box').fadeOut();
            jQuery.ajax({
                url: ajaxurl,
                type: "POST",
                data: booking_data,
                success: function(response){
                    if ( response.success == 1 ) {
                        tjq('.opacity-overlay').fadeOut(400,function(){trav_show_modal( 1, response.result, '' )});
                        setTimeout(function(){ location.reload(); }, 3000);
                    } else {
                        alert( response.result );
                    }
                }
            });
            return false;
        });
    });
</script>

<script>
    document.getElementById("copyButton").addEventListener("click", function() {
        copyToClipboard(document.getElementById("copyTarget"));
    });

    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch(e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
</script>