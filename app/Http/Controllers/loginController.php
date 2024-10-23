<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller {
    // Функция отображения страницы
    public function loginPage() {
        return view("login");
    }
}
