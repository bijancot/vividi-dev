<?php wp_enqueue_script( 'ihc_login_modal', IHC_URL . 'assets/js/IhcLoginModal.js', array(), false, false );?>

<?php if ( $content ):?>
    <div class="ihc-login-modal-trigger">
        <?php echo $content;?>
    </div>
<?php endif;?>

<div class="" id="ihc_login_modal" style="display: none" data-title="<?php _e('Login', 'ihc');?>">
    <?php echo do_shortcode( '[ihc-login-form]' );?>
</div>

<?php
$preventDefault = empty($trigger) ? 0 : 1;
$triggerSelector = empty($trigger) ? '.ihc-login-modal-trigger' : '.' . $trigger;
?>
<script>
    jQuery(document).ready(function(){
        IhcLoginModal.init({
            triggerModalSelector  : '<?php echo $triggerSelector;?>',
            preventDefault        : <?php echo $preventDefault;?>,
            autoStart             : <?php echo empty ( $_GET['ihc_login_fail'] )  ? 'false' : 'true';?>
        });
    });
</script>
