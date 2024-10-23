<!-- Подключение шаблона сборщика -->
@extends("layouts.app")

<!-- Секция -->
@section("index")
    <h1>Index page</h1>
    <a href="{{ route('login_page') }}">Log In</a>
@endsection