<?php
class Autoloader {
    public static function ClassLoader($className)
        {
             $path = 'classes/';
             require_once($path . $className . '.class.php');
        }
}