<?php 
/**
* Footer
 */
global $trav_options, $logo_url;
$footer_skin = empty( $trav_options['footer_skin'] )?'style-def':$trav_options['footer_skin'];
?>

    <footer id="footer" class="<?php echo esc_attr( $footer_skin ) ?>">
        <div class="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 text-center">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name'); ?>" style="height: 70px"/>
                        <br><h2>0812-1111-8486</h2>
                        <a href="tel:+6281211118486">
                            <img src="https://image.flaticon.com/icons/png/512/80/80630.png" alt="<?php bloginfo('name'); ?>" style="height: 60px"/>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="http://pngimg.com/uploads/whatsapp/whatsapp_PNG21.png" alt="<?php bloginfo('name'); ?>" style="height: 60px"/>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="http://pngimg.com/uploads/whatsapp/whatsapp_PNG21.png" alt="<?php bloginfo('name'); ?>" style="height: 60px"/>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="http://pngimg.com/uploads/whatsapp/whatsapp_PNG21.png" alt="<?php bloginfo('name'); ?>" style="height: 60px"/>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                            <div id="travcontactwidget-3" class="secure-transaction-content">
                                <h2 class="widgettitle">Payment Partner</h2>
                                <img src="wp-content/themes/Travelo/images/payment/bca.png" style="width:70px; height:50px; margin:4px; border-radius:5px; border:1px solid gray;">
                                <img src="wp-content/themes/Travelo/images/payment/mandiri.png" style="width:70px; height:50px; margin:4px; border-radius:5px; border:1px solid gray;">                                
                                <img src="wp-content/themes/Travelo/images/payment/bri.png" style="width:70px; height:50px; margin:4px; border-radius:5px; border:1px solid gray;"><br>
                                <img src="wp-content/themes/Travelo/images/payment/jcb.png" style="width:70px; height:50px; margin:4px; border-radius:5px; border:1px solid gray;">
                                <img src="wp-content/themes/Travelo/images/payment/union.png" style="width:70px; height:50px; margin:4px; border-radius:5px; border:1px solid gray;">                                
                                <img src="wp-content/themes/Travelo/images/payment/mc.png" style="width:70px; height:50px; margin:4px; border-radius:5px; border:1px solid gray;"><br>
                                <img src="wp-content/themes/Travelo/images/payment/visa.png" style="width:70px; height:50px; margin:4px; border-radius:5px;border:1px solid gray;">
                                <img src="wp-content/themes/Travelo/images/payment/american_express.png" style="width:70px; height:50px; margin:4px; border-radius:5px;">
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div id="nav_menu-7" class="small-box widget_nav_menu">
                            <h2 class="widgettitle">Perusahaan</h2>
                            <div class="menu-footer-menu-container">
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/mitra-usaha/">Mitra Usaha</a>
                                    </li>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/privacy-policy/">Kebijakan Privasi</a>
                                    </li>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/terms-conditions/">Terms & Condition</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <div id="social_links-widget-3" class="small-box social_links"><h2 class="widgettitle">Ikuti Kami !</h2>
                            <ul class="social-icons clearfix">
                                <li class="facebook">
                                    <a title="" href="https://www.facebook.com/Vividi-Transwisata-109946207038207" target="_blank" data-toggle="tooltip" data-original-title="facebook"><i class="soap-icon-facebook"></i></a>
                                </li>
                                <li class="youtube">
                                    <a title="" href="https://www.youtube.com/" target="_blank" data-toggle="tooltip" data-original-title="youtube"><i class="soap-icon-youtube"></i></a>
                                </li>
                                <li class="instagram">
                                    <a title="" href="https://www.instagram.com/vividitranswisata" target="_blank" data-toggle="tooltip" data-original-title="instagram"><i class="soap-icon-instagram"></i></a>
                                </li>
                                <li class="googleplus">
                                    <a title="" href="https://www.googleplus.com/vividitranswisata" target="_blank" data-toggle="tooltip" data-original-title="instagram"><i class="soap-icon-googleplus"></i></a>
                                </li>
                            </ul><br>
                            <img src="http://pluspng.com/img-png/get-it-on-google-play-png-get-it-on-google-play-png-519.png" style="width: 140px;margin-bottom: 5px">
                            <img src="http://pluspng.com/img-png/download-on-app-store-png-with-without-wifi-or-data-2000.png" style="width: 140px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <div class="bottom gray-area">
                    <div class="container">
                        <div class="pull-right">
                            <a id="back-to-top" href="#"><i class="soap-icon-longarrow-up circle"></i></a>
                        </div>
                        <div class="copyright text-center">
                            <p>&copy; <?php echo esc_html( $trav_options['copyright'] ); ?></p>
                        </div>
                    </div>
                </div>
    </footer>
</div>
<div class="opacity-overlay opacity-ajax-overlay"><i class="fa fa-spinner fa-spin spinner"></i></div>
<?php wp_footer(); ?>
</body>
</html>