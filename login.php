<?php
require_once('functions.php');
require_once('data.php');
if(!isset($_SESSION)){
    session_start();
}
$errors = [];
$ermsg = [];
$pattern = "/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = $_POST['email'];
    $password = $_POST['password'];

    if (empty($mail)){
        $errors['mail'] = 'form__item--invalid';
        $errors['form'] = 'form--invalid';
    }
    else {
        if(!preg_match($pattern, $mail))
        {
            $errors['mail'] = 'form__item--invalid';
            $ermsg['mail'] = '<span style="color:red">Неправильный формат почты</span>';
            $errors['form'] = 'form--invalid';
        }
        else
        {
            $query_id = 'SELECT id_user FROM user where email = "'.$mail.'"';
            $result_id = mysqli_query($link, $query_id);
            if ($result_id)
            {
                $query_login = "SELECT * from user where email = '$mail'and password='$password'";
                $result_login = mysqli_query($link, $query_login);
                if (mysqli_num_rows($result_login))
                {
                    $ID = mysqli_fetch_assoc($result_login);
                    $_SESSION['user'] = $ID['id_user'];
                    $user_name = $ID['name'];
                    header("Location: index.php");
                }
            }
            else
            {
                $ermsg['mail'] = '<span style="color:red">Нет такого аккаунта</span>';
            }
        }
    }

    if (empty($password)){
        $errors['password'] = 'form__item--invalid';
        $errors['form'] = 'form--invalid';
    }
}
$page_content = include_template('login.php', [
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'adv_info'=>$adv_info,
    'errors'=>$errors,
    'ermsg'=>$ermsg
]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'title' => 'Авторизация',
    'user_name' => $user_name

]);



print($layout_content);
?>
