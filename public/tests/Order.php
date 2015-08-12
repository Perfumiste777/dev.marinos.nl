<?php
require_once 'Order.class.php';

// initiate order class for selected event and currency
$order = new order(1, 'EUR');

// get all orders for selected event
$all_products = $order->getProductsByEventID();

// selection of products
$products = array(1,1,1);

// for selected products calculate fee
$total_fee = 0;
foreach($products as $product_id){
	echo $order->getProductFee($product_id)." <br />";
	$total_fee += $order->getProductFee($product_id);
}

// return total product fee (if 0, return event fee)
if($total_fee > 0){
	echo "<br />Total Service Fee:&euro;".number_format((float)$total_fee, 2, '.', '');
} else {
	echo "<br />Total Service Fee:".number_format((float)$order->getEventFee(), 2, '.', '');
}

?>
