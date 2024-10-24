<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\users;

class usersController extends Controller {
    // Функция добавления пользователя
    public function addUser(Request $req) {
        // Валидация
        $req->validate([
            "login" => "required|min:4",
            "password" => "required|alpha_num|min:4",
            "rePassword" => "required|same:password",
            "access" => "required"
        ]);

        // Подключение к модели
        $users = new users();

        // Получение данных из формы
        $users->login = $req->input("login");
        $users->password = Hash::make($req->input("password")); // Хэш пароля
        $users->access = $req->input("access");

        // Сохранение данных в модель
        $users->save();

        // Редирект
        return redirect()->route('index_page')->with("success", "User was added");
    }
}
