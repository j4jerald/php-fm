<?php

use core\Route;
use app\controllers\ApplicationController;

Route::get("/",[ApplicationController::class,"home"]);

/*
    //Supported Request menthods get and post

    //EXAMPLE
    
    //To Route all /product/* paths to ProductController - Category information

    Route::get("/product/{*}",[ProductController::class,"category"]);

    //To Route all /product/catgory_name/product_name paths to ProductController - Product information

    Route::get("/product/{*}/{*}",[ProductController::class,"product"]);

    //To Post a comment

    Route::post("/comment",[ProductController::class,"add_comment"]);

    //API exmaple

    Route::post("/api/list",[ApiController::class,"list"]);

*/


/* 404 Page - Not found route */

echo "Page not found!";
