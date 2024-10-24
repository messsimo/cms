<!-- Подключение шаблона сборщика -->
@extends("layouts.app")

<!-- Секция -->
@section("login-form")
    <!-- Форма входа -->
    <div class="login-form">
        <form action="{{ route('login_form') }}" method="POST">
            <!-- Ключ безопасности -->
            @csrf

            <h2>Log In</h2>

            <label for="login">Login</label>
            <input type="text" name="login" placeholder="Jhony McGill">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="******">

            <!-- Вывод оповещений -->
            @if($errors->any)
            <div class="alert">
                <ul>
                    @foreach($errors->all() as $el)
                    <li>{{ $el }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <button type="submit">Log In</button>
        </form>
    </div>
@endsection