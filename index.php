<?php
require_once('functions.php');
require_once('lots.php');

$page_content = include_template('index.php', [
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'adv_info'=>$adv_info]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'title' => 'Главная страница',
    'is_auth'=>$is_auth,
    'user_name' => $user_name
]);

print($layout_content);


?>
