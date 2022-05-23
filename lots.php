<?php
$link = mysqli_connect('127.0.0.1', 'root','','yeticave');
mysqli_set_charset($link, 'utf8');

$query_cat = 'SELECT * FROM category';
$result_cat = mysqli_query($link, $query_cat);
$category_ru = mysqli_fetch_all($result_cat, MYSQLI_ASSOC);

$query_lot = 'SELECT id_lot lot.name as lot, category.name as cat, image, start_price, description from lot inner join category on lot.id_category = category.id_category';
$result_lot = mysqli_query($link, $query_lot);
$adv_info = mysqli_fetch_all($result_lot, MYSQLI_ASSOC);
?>

