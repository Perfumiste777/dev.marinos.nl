<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
require_once 'Products.class.php';

$products = new products();

//$all_products = $products->get_products();
echo "<pre>";

$products->event_name = 'Event 1';
$all_products_per_event = $products->getProductsByEventName();

//print_r($all_products_per_event);
$total = 0;
foreach($all_products_per_event as $product){
	echo $product['name']." : ";
	$products->product_name = $product['name'];
	echo $products->getProductFee();
	echo "<br />";
	$total += $products->getProductFee();
}

echo $total;

//$products->product_name = 'Product 2';
//echo $products->getProductFee();



echo mysql_error();
//echo mysql_info();
