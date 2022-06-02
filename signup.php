<?php
require_once('data.php');
require_once('functions.php');


$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $message = $_POST['message'];
    $avatar = $_FILES['avatar']['name'];
    if (empty($email)) {
        $error['email'] = 'form__item--invalid';
        $error['form'] = 'form--invalid';
    }

    if (empty($password)) {
        $error['password'] = 'form__item--invalid';
        $error['form'] = 'form--invalid';
    }

    if (empty($name)) {
        $error['name'] = 'form__item--invalid';
        $error['form'] = 'form--invalid';
    }

    if (empty($message)) {
        $error['message'] = 'form__item--invalid';
        $error['form'] = 'form--invalid';
    }

    if(!empty($email) && !empty($password) && !empty($name) && !empty($message) && !empty($avatar))
    {
        $query = "INSERT INTO user(registration_date, email, name, password, avatar, contact) VALUES (now(), '$email', '$name', '$password', '$avatar', '$message')";
        $result = mysqli_query($link, $query);
        if ($result) {
            move_uploaded_file($_FILES['avatar']['tmp_name'], 'img/' . $_FILES['avatar']['name']);
            header('location: ../login.php');
        }
    }
}
    $page_content = include_template('signup.php', [
        'category_ru' => $category_ru,
        'category_eng' => $category_eng,
        'adv_info' => $adv_info,
        'error' => $error]);

    $layout_content = include_template('layout.php', [
        'page_content' => $page_content,
        'category_ru' => $category_ru,
        'category_eng' => $category_eng,
        'title' => 'Регистрация',
        'user_id' => $user_id
    ]);

print($layout_content);
