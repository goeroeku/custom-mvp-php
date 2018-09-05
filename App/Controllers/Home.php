<?php
namespace App\Controllers;

use \Core\View,
    \Core\Controller;

class Home{
    function __construct(){
        echo __CLASS__;
        /* View::set("title", "Custom MVC");
        View::render("home"); */
    }

    function index(){
        View::set("title", "Custom MVC");
        View::render("home");
    }

    function home1(){
        View::set("title", "Custom MVC");
        View::render("home1");
    }
}