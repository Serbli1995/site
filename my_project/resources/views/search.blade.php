@extends('layout')
@section('title')
    Поиск
@endsection
@section('main_content')
    <div class="container">
        @if($errors->any())
            <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
            </div>
        @endif

    <form method="post" action="/search" class="d-flex">
        @csrf
                <input type="text" class="form-control me-2" id="search" name="search" placeholder="Поиск (минимум 3 символа)" >
        <button class="btn btn-warning" type="submit">Поиск</button>
    </form>
    </div>
    @section('main_content')
        <?php
        function connect_to_db()
        {
        $host = 'localhost';
        $user = 'php_user';
        $pass = 'password';
        $db_name = 'db';
        $link = mysqli_connect($host, $user, $pass, $db_name);

        if (!$link) {
        echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
        exit;
        } else return $link;
        }

        $link = connect_to_db();
        $link->set_charset("utf8mb4");

        $result = $link->query('SELECT comments.postId, GROUP_CONCAT(comments.body) as body FROM comments WHERE (comments.body like "%laudanti%") GROUP BY comments.postId');
        while ($row = $result->fetch_assoc()) {
        echo '<p>Запись id=' . $row['postId'] . '. Текст: ' . $row['body'] . '</p>';
        }
        ?>
    @endsection
//SELECT comments.postId, GROUP_CONCAT(comments.body) as body FROM comments WHERE (comments.body like "%laudanti%") GROUP BY comments.postId

@endsection

