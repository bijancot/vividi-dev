<?php
namespace Indeed\Ihc\Db;
if (!defined('ABSPATH')) exit();

class IndeedMembersPayments
{
    private $txnId            = '';
    private $uid              = 0;
    private $paymentData      = [];
    private $history          = [];
    private $orders           = [];

    public function __construct(){}

    public function setTxnId( $txnId='' )
    {
        $this->txnId = $txnId;
        return $this;
    }

    public function setUid( $uid=0 )
    {
        $this->uid = $uid;
        return $this;
    }

    public function setPaymentData( $paymentData=[] )
    {
        $this->paymentData = $paymentData;
        return $this;
    }

    public function setHistory( $history=[] )
    {
        $this->history = $history;
        return $this;
    }

    public function setOrders( $order=0 )
    {
        $this->orders[] = $order;
        return $this;
    }

    public function save()
    {
        global $wpdb;
        $table = $wpdb->prefix . 'indeed_members_payments';
        $query = $wpdb->prepare( "SELECT id, txn_id, u_id, payment_data, history, orders, paydate FROM $table WHERE txn_id=%s; ", $this->txnId );
        $oldData = $wpdb->get_row( $query );

        if ( empty($this->uid) && !empty( $oldData->u_id ) ){
            $this->uid = $oldData->u_id;
        }

        if ( !empty( $oldData->history ) ){
            $history = unserialize( $oldData->history );
            $history[time()] = $this->history;
            $this->history = $history;
        } else {
            $history = $this->history;
            unset($this->history);
            $this->history[time()] = $history;
        }
        $this->history = serialize( $this->history );
        // file_put_contents( IHC_PATH . 'log.log', $this->history, FILE_APPEND );

        if ( !empty( $oldData->payment_data ) ){
            $paymentData = json_decode( $oldData->payment_data, true );
            $this->paymentData = $this->paymentData + $paymentData;
        }
        $this->paymentData = json_encode( $this->paymentData );

        if ( !empty( $oldData->orders ) ){
            $orders = unserialize( $oldData->orders );
            $this->orders = $orders + $this->orders;
        }
        $this->orders = serialize( $this->orders );

        if ( $oldData ){
            // update
            $query = $wpdb->prepare( "UPDATE $table SET u_id=%d, payment_data=%s, history=%s, orders=%s WHERE txn_id=%s; ", $this->uid, $this->paymentData, $this->history, $this->orders, $this->txnId );
            return $wpdb->query( $query );
        } else {
            // insert
            $query = $wpdb->prepare( "INSERT INTO $table VALUES( NULL, %s, %d, %s, %s, %s, NOW() );",  $this->txnId, $this->uid, $this->paymentData, $this->history, $this->orders );
            return $wpdb->query( $query );
        }
    }

}
