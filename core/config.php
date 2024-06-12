<?php

if( $_SERVER['HTTP_HOST']=="localhost"){
    //Local ENV DB and Other configs
    define('DB_HOST','mysql');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','your_password');
    define('DB_DATABASE_NAME','you_db');
}else{
    //Production ENV DB and Other configs    
    define('DB_HOST','mysql');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','your_password');
    define('DB_DATABASE_NAME','you_db');
}

