<!-- Подключение шаблона сборщика -->
@extends("layouts.app")

<!-- Секция -->
@section("index")
    <!-- Общий контейнер -->
    <div class="main-wrapper">

    <!-- Затеняющий фон -->
    <div class="overlay"></div>

    <!-- Навигации -->
    <div class="cms-navigation">
        <div class="cms-navigation--top">
            <h2>CMS</h2>
            <img src="{{ asset('images/anton.png') }}" alt="User image">
            <p>{{ $user->login ?? '' }}</p> 
        </div>

        <nav>
            <a href="{{ route('index_page') }}">Dashboard</a>
            <hr>
            <a href="">In proccess..</a>
            <hr>
            <a href="">In proccess..</a>
            <hr>
            <a href="">In proccess..</a>
            <hr>
        </nav>
    </div>

    <!-- Основная часть -->
    <div class="dashboard">
        <div class="create">
            <!-- Кнопка создания нового пользователя -->
            <button type="button" id="openForm-btn">Create new user</button>
        </div>

        <div class="create-user--form">
            <form action="{{ route('addUser_form') }}" method="POST">
                <h2>Create new user</h2>
                @csrf 
                <label for="">Login</label>
                <input type="text" name="login" placeholder="Jhony McGill">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="****">
                <label for="">Confirm password</label>
                <input type="password" name="rePassword" placeholder="****">
                <label for="">Access</label>
                <select name="access" id="access">
                    <!-- Сделать вывод из таблицы с правами доступа -->
                    <option value="Admin">Admin</option>
                    <option value="Staff">Staff</option>
                </select>

                <button type="submit">Create new user</button>
                <a type="button" id="closeForm-btn" href="javascript:void(0)">Close the form</a>
            </form>
        </div>

        <!-- Вывод ошибок из формы -->
        @if($errors->any())
        <div class="alert">
            @foreach($errors->all() as $el)
                <ul>
                    <li>{{ $el }}</li>
                </ul>
            @endforeach
        </div>
        @endif

        <!-- Вывод успешной сессии -->
        @if(session("success"))
            <div class="alert success">
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="dashboard-info">
            <table>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total sales</th>
                        <th>Successful sales</th>
                        <th>Unsuccessful sales</th>
                        <th>Expenses</th>
                        <th>Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Сделать вывод из БД -->
                    <tr>
                        <td>August</td>
                        <td>289</td>
                        <td>173</td>
                        <td>116</td>
                        <td class="expenses">-7.632$</td>
                        <td class="profit">+9.811$</td>
                        </tr>
                    <tr>
                        <td>August</td>
                        <td>289</td>
                        <td>173</td>
                        <td>116</td>
                        <td class="expenses">-7.632$</td>
                        <td class="profit">+9.811$</td>
                    </tr>
                    <tr>
                        <td>August</td>
                        <td>289</td>
                        <td>173</td>
                        <td>116</td>
                        <td class="expenses">-7.632$</td>
                        <td class="profit">+9.811$</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div> 
@endsection