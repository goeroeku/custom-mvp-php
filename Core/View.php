<?php
namespace Core;

class View{
    protected static $data;

    const VIEWS_PATH = "../App/Views/";

    public static function render($template)
    {
        ob_start();
        if(self::$data !== null){
            extract(self::$data);
        }
        include(ROOT_PROJECT . "/App/Views/" . ucfirst($template) . ".php");
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }

    public static function set($name, $value)
    {
        self::$data[$name] = $value;
    }
}