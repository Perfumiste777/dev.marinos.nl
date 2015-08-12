<?php
require_once 'ConnectDB.class.php';

class order {

    public $product_id, $event_id;
    protected $connect;
    protected $sql;

    public function __construct($event_id, $currency) {
        $this->connect = ConnectDB::getconnect();
        $this->event_id = $event_id;
        $this->currency = $currency;
    }

    public function __destruct() {
        $this->connect = null;
    }

    public function getEvents() {
        $this->sql = 'SELECT * FROM events';
        $return_arr = $this->connect->mysql_execute($this->sql);

        if (!empty($return_arr)) {
            return $return_arr;
        } else { 
            return false;
        }
    }

    public function getProductsByEventID() {
        $this->sql = 'SELECT products.name FROM products, events WHERE products.event_id = events.event_id AND events.event_id = "'.$this->event_id.'"';
        $return_arr = $this->connect->mysql_execute($this->sql);
        if (!empty($return_arr)) {
            return $return_arr;
        } else {
            return false;
        }
    }


    public function getProductFee($product_id) {
            $this->sql = 'SELECT s.amount FROM products p, service_fees s WHERE p.service_fee = s.service_fee_id AND p.product_id = "'.$product_id.'" AND s.currency = "'.$this->currency.'"';
            $return_arr = $this->connect->mysql_execute($this->sql);
            
        if (!empty($return_arr)) {
            return $return_arr[0]['amount'];
        } else {
            return false;
        }
    }


    public function getEventFee() {
        $this->sql = 'SELECT s.amount FROM events e, service_fees s WHERE e.service_fee = s.service_fee_id AND e.event_id = "'.$this->event_id.'" AND s.currency = "'.$this->currency.'"';
        $return_arr = $this->connect->mysql_execute($this->sql);
        
        if (!empty($return_arr)) {
            return $return_arr[0]['amount'];
        } else {
            return false;
        }
    }
}

