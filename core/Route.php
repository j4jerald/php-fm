<?php

namespace core;

Route::autoload();
define("APP_ROOT_HOST",Route::routes()['root_host']);
class Route{

    private static $routes;

    public static function get($route,$callback=[]){
        if(!Route::validate('get',$route)){
            return;
        }
        Route::call_back($callback);
        exit;
    }

    public static function post($route,$callback=[]){
        if(!Route::validate('post',$route)){
            return;
        }
        Route::call_back($callback);
        exit;
    }

    public static function routes(){
        return Route::$routes;
    }
    
    public static function autoload(){
        if(!empty(Route::$routes)){
            return;
        }
        $route = ['method'=>strtolower($_SERVER['REQUEST_METHOD']),'root_host'=>"/",'full_uri'=>"",'uri'=>[]];
        $app_dir = str_replace(DIRECTORY_SEPARATOR,"/",array_slice(explode(DIRECTORY_SEPARATOR , APP_DIR),-1)[0]);
      
        $uri_path = parse_url($_SERVER['REQUEST_URI'])['path'];       
        
        $current_route = trim(str_replace("/".$app_dir,"", $uri_path ));
        $root = trim(trim(str_replace($current_route,"",$uri_path)),"/");
        $root = empty($root) ? "/" : "/{$root}/";

        if($current_route!="/"){
            $current_route = rtrim(strtolower($current_route),"/");        
            $route['uri'] = explode("/",ltrim($current_route,"/"));
        }        
        $route['full_uri'] = $current_route; 
        $route['root_host'] = $root;   
        Route::$routes = $route;
    }

    private static function call_back($callback){
        if(count($callback)==1){
            call_user_func($callback[0], Route::$routes);
        }else{
            call_user_func([new $callback[0],$callback[1]], Route::$routes);   
        }        
    }

    private static function validate($method,$route){
          if($method!==Route::$routes['method']){
            return false;
          }
          if(trim($route)==Route::$routes['full_uri']){
            return true;
          }else{
            if(strstr($route,'{*}')===false){
                return false;
            }
            $route = explode("/",trim(strtolower($route),"/"));
            if(count($route)!=count(Route::$routes['uri'])){
                return false;
            }
            foreach($route as $k=>$r){
                if(!isset(Route::$routes['uri'][$k])){
                    return false;
                }
                if($r==Route::$routes['uri'][$k] || $r=="{*}"){
                    continue;
                }else{
                    return false;
                }
               
            }
            return true;
          }
    }

}
