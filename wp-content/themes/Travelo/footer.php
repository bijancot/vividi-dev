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
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name'); ?>" style="height: 40px"/>
                        <br><h2>0812-1111-8486</h2>
                        <a href="tel:+6281211118486">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/24.png" alt="<?php bloginfo('name'); ?>" style="height: 36px; margin-right:15px"/>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png" alt="<?php bloginfo('name'); ?>" style="height: 36px; margin-right:15px"/>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png" alt="<?php bloginfo('name'); ?>" style="height: 36px; margin-right:15px"/>
                        </a>
                        <a href="https://api.whatsapp.com/send?phone=6281211118486&text=Silahkan hubungi Nomor Whatsapp jika ada yang ingin ditanyakan">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/whatsapp.png" alt="<?php bloginfo('name'); ?>" style="height: 36px"/>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div id="travcontactwidget-3" class="secure-transaction-content">
                            <h2 class="widgettitle">Payment Partner</h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/bca.png" style="width:72px; height:48px; margin:4px; border-radius:5px; border:1px solid gray;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/mandiri.png" style="width:72px; height:48px; margin:4px; border-radius:5px; border:1px solid gray;">                                
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/bri.png" style="width:72px; height:48px; margin:4px; border-radius:5px; border:1px solid gray;"><br>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/jcb.png" style="width:72px; height:48px; margin:4px; border-radius:5px; border:1px solid gray;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/union.png" style="width:72px; height:48px; margin:4px; border-radius:5px; border:1px solid gray;">                                
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/mc.png" style="width:72px; height:48px; margin:4px; border-radius:5px; border:1px solid gray;"><br>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/visa.png" style="width:72px; height:48px; margin:4px; border-radius:5px;border:1px solid gray;">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/payment/american_express.png" style="width:72px; height:48px; margin:4px; border-radius:5px;">
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
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/hubungi-kami/">Hubungi Kami</a>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/refund/">Refund</a>
                                    </li>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/category/info-wisata/">Info Wisata</a>
                                    </li>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="https://vividi.id/location/indonesia/">Produk</a>
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
                                    <a title="" href="https://www.youtube.com/channel/UCYdywsNQA2t8mGoCB3Ovw5w" target="_blank" data-toggle="tooltip" data-original-title="youtube"><i class="soap-icon-youtube"></i></a>
                                </li>
                                <li class="instagram">
                                    <a title="" href="https://www.instagram.com/vividitranswisata" target="_blank" data-toggle="tooltip" data-original-title="instagram"><i class="soap-icon-instagram"></i></a>
                                </li>
                                <li class="googleplus">
                                    <a title="" href="https://www.googleplus.com/vividitranswisata" target="_blank" data-toggle="tooltip" data-original-title="instagram"><i class="soap-icon-googleplus"></i></a>
                                </li>
                            </ul><br>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/google.png" style="width: 140px; height: 45px; margin-bottom: 5px">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/app.png" style="width: 140px; height: 45px;">
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