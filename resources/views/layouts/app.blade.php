<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>

    <!-- Подключение CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <!-- Подключение шаблонов -->
    @yield("index")
    @yield("login-form")

    <!-- Подключение JS -->
    <script src="{{ asset('js/openForm.js') }}"></script>
</body>
</html>