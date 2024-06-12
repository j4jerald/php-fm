<?php

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

//Boostrapig the app

define("APP_DIR",__DIR__);

require_once("core/config.php");

if(file_exists("lib/vendor/autoload.php")){
    //Composer Directory AutoLoad
    require_once("lib/vendor/autoload.php");
}

//App Directory AutoLoad
require_once("core/autoload.php");

require_once("core/app.php");
