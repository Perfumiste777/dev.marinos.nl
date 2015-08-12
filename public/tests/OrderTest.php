<?php

require_once 'Order.class.php';
//require_once 'PHPUnit.php';

class Ordertest extends PHPUnit_Framework_TestCase 
{


	public function mmtestCannotBeConstructedFromNonIntegerValue()
	{
		new Order(1, 'euro');
	}


    // contains the object handle of the string class
    var $order;

    // constructor of the test suite
    //function __contrustor($event_id, $currency) {
      // $this->PHPUnit_TestCase($name);
    //}

    // called before the test functions will be executed
    // this function is defined in PHPUnit_TestCase and overwritten
    // here
//    function setUp() {
        // create a new instance of String with the
        // string 'abc'
        //$this->abc = new String("abc");
//	$this->order = new order(1, 'euro');
  //  }

    // called after the test functions are executed
    // this function is defined in PHPUnit_TestCase and overwritten
    // here
    //function tearDown() {
        // delete your instance
        //unset($this->abc);
//	unset($this->order);
  //  }
/*
    // test the toString function
    function testToString() {
        $result = $this->abc->toString('contains %s');
        $expected = 'contains abc';
        $this->assertTrue($result == $expected);
    }

    // test the copy function
    function testCopy() {
      $abc2 = $this->abc->copy();
      $this->assertEquals($abc2, $this->abc);
    }

    // test the add function
    function testAdd() {
        $abc2 = new String('123');
        $this->abc->add($abc2);
        $result = $this->abc->toString("%s");
        $expected = "abc123";
        $this->assertTrue($result == $expected);
    }
*/
  }

?>
