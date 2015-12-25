<?php
/**
 * Created by PhpStorm.
 * User: hammad
 * Date: 12/5/2015
 * Time: 6:40 PM
 */

function __autoload($class){


    $classPath=str_replace('\\', '/',$class);

    $classPath= dirname(__FILE__).'/../../'.$classPath.'.php';

    require_once($classPath);
}