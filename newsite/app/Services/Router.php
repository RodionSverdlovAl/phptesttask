<?php

namespace App\Services;
use App\Controllers\RegistrationController;
use App\Controllers\AuthController;

class Router
{
    private static $list = [];

    public static function page($uri, $page_name):void{
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
            "post" =>false
        ];
    }

    public static function post($uri, $class, $method):void{
        self::$list[] = [
            "uri"=>$uri,
            "class" => $class,
            "method"=>$method,
            "post" => true
        ];
    }

    public static function enable():void{
        $query =$_GET['q'];

       foreach(self::$list as $route){
           if($route["uri"] === '/'.$query){
               if($route["post"]===true && $_SERVER["REQUEST_METHOD"] === "POST"){
//                   if($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
                       $action = new $route["class"];
                       $method = $route["method"];
                       $action->$method($_POST);
                       die();
//                   }else{
//                       echo "Не ajax-запрос";
//                   }
               }else{
                   require_once "views/pages/".$route['page'].".php";
                   die();
               }
           }
       }
        self::not_found_page();
    }

    static private function not_found_page():void{
        require_once "views/errors/404.php";
        die();
    }

    public static function redirect($uri):void
    {
        header('Location:' . $uri);
    }
}