<?php

require_once('ConnectDB.class.php');
require_once 'Products.class.php';

class PLTest extends PHPUnit_Framework_TestCase
{

/*
	public function testConnectionIsValid()
	{
		$this->connect = ConnectDB::getconnect();
	}
*/

	public function setUpProducts()
	{
		$products = new product();	
		$this->assertTrue($connObj->connectToServer($serverName) !== false);
		$products1 = $get_products();
	}

}
?>
