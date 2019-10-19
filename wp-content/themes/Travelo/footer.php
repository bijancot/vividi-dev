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
                    <div class="col-sm-6 col-md-4">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name'); ?>" style="height: 80px;"/>
                        <div class="col-md-3">
                            <br>
                            <img src="https://image.flaticon.com/icons/png/512/80/80630.png" alt="<?php bloginfo('name'); ?>" style="height: 60px;"/>
                        </div>
                        <div class="col-md-9">
                            <br>
                            <h5>Hubungi Kami</h5>
                            <h2>0812-1111-8486</h2>
                        </div>
                        </div>
                    <div class="col-sm-6 col-md-3">
                            <div id="travcontactwidget-3" class="contact-box small-box widget_travcontactwidget">
                                <h2 class="widgettitle">Payment Partner</h2>
                                <img src="https://3.bp.blogspot.com/-ZK6W9UlA3lw/V15RGexr3yI/AAAAAAAAAJ4/nkyM9ebn_qg3_rQWyBZ1se5L_SSuuxcDACLcB/s1600/Bank_Central_Asia.png" width="70px">
                                <img src="https://logos-download.com/wp-content/uploads/2016/06/Mandiri_logo.png" width="70px">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/97/Logo_BRI.png" width="70px">
                                <img src="http://pngimg.com/uploads/visa/visa_PNG4.png" width="70px">
                                <img src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_vrt_pos_92px_2x.png" width="70px">
                                <img src="https://cdn3.iconfinder.com/data/icons/payment-method-1/64/_JCB-512.png" width="70px">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UnionPay_logo.svg/1280px-UnionPay_logo.svg.png" width="70px">
                                <img src="https://about.americanexpress.com/sites/americanexpress.newshq.businesswire.com/files/logo/image/AXP_BlueBoxLogo_EXTRALARGEscale_RGB_DIGITAL_1600x1600.png" width="70px">
                            </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div id="nav_menu-7" class="small-box widget_nav_menu">
                            <h2 class="widgettitle">Perusahaan</h2>
                            <div class="menu-footer-menu-container">
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="http://localhost/vividi-dev/mitra-usaha/">Mitra Usaha</a>
                                    </li>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="http://localhost/vividi-dev/mitra-usaha/">Kebijakan Privasi</a>
                                    </li>
                                </ul>
                                <ul id="menu-footer-menu" class="menu">
                                    <li id="menu-item-4978" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4978">
                                        <a href="http://localhost/vividi-dev/mitra-usaha/">Terms & Condition</a>
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
                            </ul>
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