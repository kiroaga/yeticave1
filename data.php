<?php
session_start();
$user_id = $_SESSION['user'] ?? '';
$user='';

$link = mysqli_connect('127.0.0.1', 'root','','yeticave');
mysqli_set_charset($link, 'utf8');

$query_cat = 'SELECT * FROM category';
$result_cat = mysqli_query($link, $query_cat);
$category_ru = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);

$query_lot = 'SELECT id_lot as id, lot.name as lot, category.name as cat, image, start_price, description from lot inner join category on lot.id_category = category.id_category';
$result_lot = mysqli_query($link, $query_lot);
$adv_info = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);

if ($user_id) {
    $query_user = 'SELECT avatar, name from user where id_user =' . $user_id;
    $result_user = mysqli_query($link, $query_user);
    $user = mysqli_fetch_assoc($result_user);
}
?>

