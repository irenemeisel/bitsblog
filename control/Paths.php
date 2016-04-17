<?php

/**
 * Created by PhpStorm.
 * User: enea
 * Date: 4/7/16
 * Time: 3:28 PM
 */

class Paths
{
    private static $instance;
    private $paths;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Paths();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->paths = array(
            "database" => "model/",
            "user" => "model/",
            "post" => "model/",
            "pageblocks" => "views/",
            "session" => "control/",
            "login" => ""
            );
    }

    public function getPathOf($filename) {
        return array_key_exists($filename, $this->paths) ? $this->paths[$filename].$filename.".php" : "";
    }
}