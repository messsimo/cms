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
            @if($user->access == "Admin") 
                <button type="button" id="openForm-btn">Create new user</button>
            @else 
            @endif
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
                    @foreach($sales_accounting_pagination as $el)
                    <tr>
                        <td>{{ $el->month_year }}</td>
                        <td>{{ $el->total_sales }}</td>
                        <td>{{ $el->success_sales }}</td>
                        <td>{{ $el->success_sales }}</td>
                        <td class="expenses">-{{ number_format($el->expenses) }}$</td>
                        <td class="profit">+{{ number_format($el->profit) }}$</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">
                {{ $sales_accounting_pagination->links('vendor.pagination.custom') }}
            </div>
        </div>

        <div class="charts">
            <!-- График продаж -->
            <canvas id="myChart"></canvas>
        </div>
    </div>
    </div> 

    <!-- Подключение библиотеки Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Преобразование данных в JSON-формат
        const salesData = @json($sales_accounting);

        // Данные для графика
        const labels = salesData.map(el => el.month_year); 
        const success_sales = salesData.map(el => el.success_sales);
        const unsuccess_sales = salesData.map(el => el.unsuccess_sales);

        // График с данными
        const ctx = document.getElementById("myChart").getContext("2d");
        const myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [{
                    label: "Success sales",
                    data: success_sales,
                    backgroundColor: '#4CAF50',
                    borderColor: '#4CAF50',
                    borderWidth: 1
                },
                {
                    label: "Unsuccess sales",
                    data: unsuccess_sales,
                    backgroundColor: '#FF6B6B',
                    borderColor: '#FF6B6B',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }   
            }
        });
    </script>
@endsection