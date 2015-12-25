<?php

/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/5/2015
 */
$pathFromPHPUnit=dirname(__FILE__);
require_once($pathFromPHPUnit."/../../config/config.php");

class customersLivingWithinASpecifiedDistanceTest extends PHPUnit_Framework_TestCase
{
    public function testInvalidArgumentForSetMaximumAllowedDistanceInMetresMethod(){
        $test= new \exercises\gps\services\customersLivingWithinASpecifiedDistance;
        $this->setExpectedException('Exception');
        $test->setMaximumAllowedDistanceInMetres("this is an invalid argument");
    }

    public function testFileNotSet(){
        $test= new \exercises\gps\services\customersLivingWithinASpecifiedDistance;
        $this->setExpectedException('Exception');
        $test->getFileLocation();
    }

    public function testGetCustomersWithinASpecifiedDistanceFromPointA(){
        $gpsPoint['A']= new \exercises\gps\entities\gpsPoint();
        $gpsPoint['A']->setLatitude(53.3381985);
        $gpsPoint['A']->setLongitude(-6.2592576);
        $findUsersLivingWithinDistanceFromPointA= new \exercises\gps\services\customersLivingWithinASpecifiedDistance() ;
        $findUsersLivingWithinDistanceFromPointA->setCoordinatesOfPointA($gpsPoint['A']);
        $findUsersLivingWithinDistanceFromPointA->setMaximumAllowedDistanceInMetres("100000");
        $pathToFile=dirname(__FILE__)."/../data/gistfile1.txt";// please update your path accordingly
        $findUsersLivingWithinDistanceFromPointA->setLocationOfJSONFileContainingCustomerData($pathToFile);
        $this->assertFileExists($pathToFile);
        $outputArray=$findUsersLivingWithinDistanceFromPointA->getCustomersWithinASpecifiedDistanceFromPointA();
    }



}




/*

*/
