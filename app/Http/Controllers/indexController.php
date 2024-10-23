<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class indexController extends Controller {
    // Отображение главной страницы
    public function indexPage() {
        return view("index");
    }
}
