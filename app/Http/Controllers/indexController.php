<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\sales_accounting;

class indexController extends Controller {
    // Отображение главной страницы
    public function indexPage() {
        // Подключение к модели
        $sales_accounting = sales_accounting::all();
        
        // Редирекет
        return view("index", ["sales_accounting" => $sales_accounting]);
    }
}
