<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/5/2015
 * Time: 1:13 PM
 */

namespace exercises\flatten\services;


/**
 * Class swissKnife, ideally should be put inside a singleton mechanism and used for doing various kinds of data processing
 *
 * @package exercises\flatten\services
 */
class swissKnife
{
    /**
     * @var array
     */
    private static $flattenedArray=array();

    /**
     * This function takes in a multi-dimensional array and passes it to the private function
     * validateAndFlattenMultidimensionalArray which returns a flattened Array. This function
     * is required in addition to the latter for resetting the value of self::$flattenedArray,
     * otherwise we would not be able to reuse the instantiated object method for flattening
     * subsequent arrays.
     *
     * @param $arrayToBeFlattened , multi-dimensional array passed
     * @return array , contains a flattened Version of the passed multi-dimensional array
     * @throws \Exception , if array contains a non-integer
     */
    public function flattenArray($arrayToBeFlattened){
        $flattenedArray=swissKnife::validateAndFlattenMultidimensionalArray($arrayToBeFlattened);
        self::$flattenedArray=array();
        return $flattenedArray;

    }

    /**
     * This private function takes in a multi-dimensional array and flattens it.
     *
     * @param $arrayToBeFlattened , multi-dimensional array passed
     * @return array , contains a flattened Version of the passed multi-dimensional array
     * @throws \Exception , if array contains a non-integer
     */
    private function validateAndFlattenMultidimensionalArray($arrayToBeFlattened) {
        foreach ($arrayToBeFlattened as $value){
            if(!is_array($value)){
                if(is_int($value)) {
                    self::$flattenedArray[] = $value;
                }
                else{
                    throw new \Exception("The array should only contain Integers.");
                }
            }
            else{
                $this->validateAndFlattenMultidimensionalArray($value);
            }
        }
        return self::$flattenedArray ;
    }
}