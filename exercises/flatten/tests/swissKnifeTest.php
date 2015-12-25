<?php

/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/5/2015
 * Time: 6:24 PM
 */

$pathFromPHPUnit=dirname(__FILE__);
require_once($pathFromPHPUnit."/../../config/config.php");

class swissKnifeTest extends PHPUnit_Framework_TestCase
{
    public function testFlattenArray(){
        $testObject= new \exercises\flatten\services\swissKnife();
        $arrayInput= array(11,22,array(array(33,44,array(55,66,77),array(array(array(array(array(array(88,99)))))),00,33)));
        $arrayOutput=$testObject->flattenArray($arrayInput);
        $expectedOutputShouldBe= array(11,22,33,44,55,66,77,88,99,00,33);
        $this->assertObjectHasAttribute('flattenedArray',$testObject);
        $this->assertEquals($arrayOutput,$expectedOutputShouldBe);
    }

    public function testInvalidArrayInput(){
        $testObject= new \exercises\flatten\services\swissKnife();
        $this->setExpectedException("Exception");
        $arrayInput= array(11,22,array(array(33,44,"A",array(55,66,77),array(array(array(array(array(array(88,99)))))),00,33)));
        $arrayOutput=$testObject->flattenArray($arrayInput);
    }

}