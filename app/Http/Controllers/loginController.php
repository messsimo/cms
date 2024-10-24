<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\users;

class loginController extends Controller {
    // Функция отображения страницы
    public function loginPage() {
        return view("login");
    }

    // Функция обработки формы
    public function processingForm(Request $req) {
        // Валидация
        $req->validate([
            "login" => "required|min:4|string",
            "password" => "required|min:4|string|alpha_num"
        ]);

        // Подключение к модели
        $users = new users();

        // Получение данных из формы
        $login = $req->input("login");
        $password = $req->input("password");

        // SQL запрос на наличие юзера в таблице
        $user = users::where("login", $login)->get();

        // Переадрессация в случае наличия пользователя
        if ($user) {
            $user = $user->first();
            if (password_verify($password, $user->password)) {
                return view("index", ["user" => $user]);
            }
        }

        // Переадрессация в случае ошибок входа 
        return view("login")->withErrors("Login and Password not found");
    }
}