@extends('layout')
@section('title')
    Загрузка
@endsection
@section('main_content')
    <?php
    function console_log($data){
    if(is_array($data) || is_object($data)){
    echo("<script>console.log('".json_encode($data)."');</script>");
    } else {
    echo"<script>console.log(`$data`);</script>";
    }
    }
    function json_load_by_url($url)
    {
    $contents = strip_tags(file_get_contents($url));
    return json_decode($contents, true);
    //echo $contents_mass[0]['title'] . PHP_EOL;
    //print_r($contents_mass);
    }
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
        }
        else return $link;
    }
    function posts_load_to_db($link,$mass)
    {
        $summ=0;
        foreach($mass as $elem)
        {
            //foreach($elem  as $key => $value)
            $sql = mysqli_query($link, "INSERT INTO `posts` (`id`,`userId`,`title`,`body`) VALUES ('{$elem['id']}','{$elem['userId']}','{$elem['title']}','{$elem['body']}')");

            //echo "[{$key}] => {$value} <br/>";
            if (!$sql) {
                console_log('Произошла ошибка: ' . mysqli_error($link) );
            }else $summ=$summ+1;
        }
        return $summ;

    }
    function comments_load_to_db($link,$mass)
    {
        $summ=0;
        foreach($mass as $elem)
        {
            //foreach($elem  as $key => $value)
            $sql = mysqli_query($link, "INSERT INTO `comments` (`id`,`postId`,`name`,`email`,`body`) VALUES ('{$elem['id']}','{$elem['postId']}','{$elem['name']}','{$elem['email']}','{$elem['body']}')");

            //echo "[{$key}] => {$value} <br/>";
            if (!$sql) {
                console_log('Произошла ошибка: ' . mysqli_error($link) );
            }else $summ=$summ+1;
        }
        return $summ;

    }

    $link=connect_to_db();
    $json_p = json_load_by_url("http://jsonplaceholder.typicode.com/posts");
    $json_c = json_load_by_url("http://jsonplaceholder.typicode.com/comments");
    console_log("Загружено ".posts_load_to_db($link,$json_p)." записей и ".comments_load_to_db($link,$json_c)." комментариев");

?>
@endsection
