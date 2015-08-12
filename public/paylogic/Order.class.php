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
        $this->sql = 'SELECT p.product_id, p.name FROM products p, events e WHERE p.event_id = e.event_id AND e.event_id = "'.$this->event_id.'"';
        $return_arr = $this->connect->mysql_execute($this->sql);
        if (!empty($return_arr)) {
            return $return_arr;
        } else {
            return false;
        }
    }


    public function getProductFee($product_id) {
            $this->sql = 'SELECT s.amount FROM products p, service_fees s WHERE p.service_fee_name = s.service_fee_name AND p.product_id = "'.$product_id.'" AND s.currency = "'.$this->currency.'"';
            $return_arr = $this->connect->mysql_execute($this->sql);
           
	 
        if (!empty($return_arr)) {
            return $return_arr[0]['amount'];
        } else {
            return false;
        }
    }


    public function getEventFee() {
        $this->sql = 'SELECT s.amount FROM events e, service_fees s WHERE e.service_fee_name = s.service_fee_name AND e.event_id = "'.$this->event_id.'" AND s.currency = "'.$this->currency.'"';
        $return_arr = $this->connect->mysql_execute($this->sql);
       
        if (!empty($return_arr)) {
            return $return_arr[0]['amount'];
        } else {
            return false;
        }
    }
}

