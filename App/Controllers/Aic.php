<?php
namespace App\Controllers;

use Core\View;

class Aic{
    function index(){
        View::set("title", "Judul Saja");
        View::render("home");
    }
    function baru(){
        View::render("viewaic");
    }
}