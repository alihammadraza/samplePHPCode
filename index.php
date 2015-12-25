<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/4/2015
 */


include('exercises/config/config.php');

echo "<h1> Customers Living within 100000 metres from 53.3381985,-6.2592576 </h1>";
$gpsPoint['A']= new \exercises\gps\entities\gpsPoint();
$gpsPoint['A']->setLatitude(53.3381985);
$gpsPoint['A']->setLongitude(-6.2592576);

$findUsersLivingWithinDistanceFromPointA= new \exercises\gps\services\customersLivingWithinASpecifiedDistance() ;
$findUsersLivingWithinDistanceFromPointA->setCoordinatesOfPointA($gpsPoint['A']);
$findUsersLivingWithinDistanceFromPointA->setMaximumAllowedDistanceInMetres(100000);
$findUsersLivingWithinDistanceFromPointA->setLocationOfJSONFileContainingCustomerData("exercises/gps/data/gistfile1.txt");
var_dump($findUsersLivingWithinDistanceFromPointA->getCustomersWithinASpecifiedDistanceFromPointA());
echo "<br/><br/><br/><br/>";


echo "<h1> Calculating distance in metres between gpsPoint 89,10 and gpsPoint 10,10 </h1>";
$gpsPoint['A']= new \exercises\gps\entities\gpsPoint();
$gpsPoint['A']->setLatitude(89);
$gpsPoint['A']->setLongitude(10);
$gpsPoint['B']= new \exercises\gps\entities\gpsPoint();
$gpsPoint['B']->setLatitude(10);
$gpsPoint['B']->setLongitude(10);
echo \exercises\gps\services\distanceBetweenTwoGPSPoints::getDistanceBetweenTwoPoints($gpsPoint['A'],$gpsPoint['B']) . " metres";
echo "<br/><br/><br/><br/>";


echo "<h1> Flattening the multidimensional array(11,22,array(array(33,44,array(55,66,77),88,99,111)),array(array(array(array(array(array(222,333)))))),444,555,666,777,array(888,999))</h1>";
$array=array(11,22,array(array(33,44,array(55,66,77),88,99,111)),array(array(array(array(array(array(222,333)))))),444,555,666,777,array(888,999));
$flattenMyArray= new \exercises\flatten\services\swissKnife();
var_dump($flattenMyArray->flattenArray($array));
echo "<br/><br/><br/><br/>";




?>

