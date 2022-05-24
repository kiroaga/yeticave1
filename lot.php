<?php
require_once('functions.php');
require_once('lot.php');
require_once('data.php');

$query_adv = 'SELECT lot.id_lot as id, step, bet.amount as cost,lot.name as lot, category.name as cat, image as img,
description from lot inner join category on lot.id_category = category.id_category inner join bet on lot.id_lot = bet.id_lot where lot.id_lot = '. $_GET['page'];
$result_adv = mysqli_query($link, $query_adv);
$adv = mysqli_fetch_assoc($result_adv); //Получение данных из бд о лоте

if(empty($adv)) {
    $query_adv = 'SELECT step, lot.id_lot as id, start_price as cost,lot.name as lot, category.name as cat, image as img,
    description from lot inner join category on lot.id_category = category.id_category where lot.id_lot = '. $_GET['page'];
    $result_adv = mysqli_query($link, $query_adv);
    $adv = mysqli_fetch_assoc($result_adv);} //Получение данных из бд о лоте, если нет ни одной ставки на лот

if (!in_array($_GET['page'], $adv))
{
    header('Location: pages/404.html'); //Страница 404, если нет страницы по искомой ссылке
}

$layout_content = include_template('lot.php', [
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'title' => $adv['lot'],
    'is_auth'=>$is_auth,
    'user_name' => $user_name,
    'adv' => $adv]);


print($layout_content);
?>
