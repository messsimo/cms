<!-- Подключение шаблона сборщика -->
@extends("layouts.app")

<!-- Секция -->
@section("index")
    <!-- Общий контейнер -->
    <div class="main-wrapper">
    <!-- Блок навигации -->
    <div class="cms-navigation">
        <div class="cms-navigation--top">
            <h2>CMS</h2>
            <img src="{{ asset('images/anton.png') }}" alt="User image">
            <!-- Заменить Admin в <p> на динамический параметр вошедщего юзера-->
            <p>Admin</p> 
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




    </div> 
@endsection