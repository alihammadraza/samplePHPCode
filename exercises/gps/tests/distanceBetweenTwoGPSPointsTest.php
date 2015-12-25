<?php

/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/5/2015
 */

$pathFromPHPUnit=dirname(__FILE__);
require_once($pathFromPHPUnit."/../../config/config.php");


class distanceBetweenTwoGPSPointsTest extends PHPUnit_Framework_TestCase
{
    public function testGetDistanceBetweenTwoPoints()
    {
        $gpsPoint['A'] = new \exercises\gps\entities\gpsPoint();
        $gpsPoint['A']->setLatitude(89);
        $gpsPoint['A']->setLongitude(10);
        $gpsPoint['B'] = new \exercises\gps\entities\gpsPoint();
        $gpsPoint['B']->setLatitude(10);
        $gpsPoint['B']->setLongitude(10);
        $this->assertInstanceOf("\exercises\gps\entities\gpsPoint", $gpsPoint['A']);
        $this->assertInstanceOf("\exercises\gps\entities\gpsPoint", $gpsPoint['B']);
        $output= \exercises\gps\services\distanceBetweenTwoGPSPoints::getDistanceBetweenTwoPoints($gpsPoint['A'], $gpsPoint['B']);
        $this->assertEquals($output,8784399);
    }
}