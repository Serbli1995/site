<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/" id="welcome">Задание</a>
                <a class="nav-link active" href="/download" id="download">Загрузка</a>
                <a class="nav-link active" href="/search" id="search">Поиск</a>
        </div>
    </div>
</nav>

<body class="bg-dark text-white">

@yield('main_content')
</body>

</html>
