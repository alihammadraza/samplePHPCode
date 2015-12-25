<?php

/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/5/2015
 */
$pathFromPHPUnit=dirname(__FILE__);
require_once('/../../config/config.php');
use exercises\gps\services\customersLivingWithinASpecifiedDistance;
use exercises\gps\entities\gpsPoint;


class customersLivingWithinASpecifiedDistanceTest extends PHPUnit_Framework_TestCase
{
    public function testInvalidArgumentForSetMaximumAllowedDistanceInMetresMethod()
    {
        $test = new customersLivingWithinASpecifiedDistance;
        $this->setExpectedException('Exception');
        $test->setMaximumAllowedDistanceInMetres("this is an invalid argument");
    }

    public function testFileNotSet()
    {
        $test = new customersLivingWithinASpecifiedDistance;
        $this->setExpectedException('Exception');
        $test->getFileLocation();
    }

    public function testGetCustomersWithinASpecifiedDistanceFromPointA()
    {
        $gpsPoint['A'] = new gpsPoint();
        $gpsPoint['A']->setLatitude(53.3381985);
        $gpsPoint['A']->setLongitude(-6.2592576);
        $findUsersLivingWithinDistanceFromPointA = new customersLivingWithinASpecifiedDistance();
        $findUsersLivingWithinDistanceFromPointA->setCoordinatesOfPointA($gpsPoint['A']);
        $findUsersLivingWithinDistanceFromPointA->setMaximumAllowedDistanceInMetres("100000");
        $pathToFile = dirname(__FILE__) . "/../data/gistfile1.txt";// please update your path accordingly
        $findUsersLivingWithinDistanceFromPointA->setLocationOfJSONFileContainingCustomerData($pathToFile);
        $this->assertFileExists($pathToFile);
        $outputArray = $findUsersLivingWithinDistanceFromPointA->getCustomersWithinASpecifiedDistanceFromPointA();
    }

}
