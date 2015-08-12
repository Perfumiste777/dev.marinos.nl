<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<pre>";
require_once 'Order.class.php';

$currency = isset($_GET['currency']) ? $_GET['currency'] : 'EUR';
$csymbol = ($currency == 'EUR' ? '&euro;' : '$');
$event_id = ($_GET['event_id'] > 0 ? $_GET['event_id'] : 1);
$product_ids = isset($_GET['product_ids']) ? explode(',', $_GET['product_ids']) : 0;

// initiate order class for selected event and currency
$order = new order($event_id, $currency);

// get all orders for selected event
$products = $order->getProductsByEventID();

if($product_ids == 0) {
	foreach($products as $product){
		echo $product['name']." (fee ".$csymbol.$order->getProductFee($product['product_id']).")<br />";
	}
} else {
	$total_fee = 0;
	foreach($product_ids as $product_id){	
		$total_fee += $order->getProductFee($product_id);
	}
	
	if($total_fee > 0){
		echo "<br />Total Service Fee:".$csymbol.number_format((float)$total_fee, 2, '.', '');
	} else {
		echo "<br />Total Service Fee:".$csymbol.number_format((float)$order->getEventFee(), 2, '.', '');
	}
}

?>
