<?php
require_once 'ConnectDB.class.php';

class Products {

	public $product_id, $product_name, $event_id, $event_name, $service_fee ,$var;
	protected $connect;
	protected $sql;

	public function __construct() {
		$this->connect = ConnectDB::getconnect();
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

	public function getProducts() {
		$this->sql = 'SELECT * FROM products';
		$return_arr = $this->connect->mysql_execute($this->sql);

		if (!empty($return_arr)) {
			return $return_arr;
		} else {
			return false;
		}
	}

	public function getProductsByEventName() {
		$this->sql = 'SELECT products.name FROM products, events WHERE products.event_id = events.event_id AND events.name = "'.$this->event_name.'"';
                $return_arr = $this->connect->mysql_execute($this->sql);
                if (!empty($return_arr)) {
                        return $return_arr;
                } else {
                        return false;
                }		
	}
	
        public function getProductFee() {
                $this->sql = 'SELECT s.amount FROM products p, service_fees s WHERE p.service_fee = s.service_fee_id AND p.name = "'.$this->product_name.'"';
                $return_arr = $this->connect->mysql_execute($this->sql);
		//echo $this->sql;
                
		if (!empty($return_arr)) {
                        return $return_arr[0]['amount'];
                } else {
                        return false;
                }
        }

}
