<?php
require_once('functions.php');
require_once('lot.php');
require_once('lots.php');

$layout_content = include_template('lot.php', [
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'title' => 'Пока так',
    'is_auth'=>$is_auth,
    'user_name' => $user_name
]);

print($layout_content);
?>
