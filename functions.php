<?php
$is_auth = rand(0, 1);
$user_name = 'Kirill'; // укажите здесь ваше имя

/*$category_ru = array('Доски и лыжи','Крепления','Ботинки','Одежда','Инструменты','Разное'); // Массив с категориями на русском*/
$category_eng = array('boards', 'attachment', 'boots', 'clothing', 'tools','other'); // Массив с категориями на английском
/*
$adv_info = [
    ["Name"=>'2014 Rossignol District Snowboard',"Category"=>$category_ru[0], "Price"=>10999, "URL"=>'img/lot-1.jpg'],
    ["Name"=>'DC Ply Mens 2016/2017 Snowboard',"Category"=>$category_ru[0], "Price"=>159999, "URL"=>'img/lot-2.jpg'],
    ["Name"=>'Крепления Union Contact Pro 2015 года размер L/XL',"Category"=>$category_ru[1], "Price"=>8000, "URL"=>'img/lot-3.jpg'],
    ["Name"=>'Ботинки для сноуборда DC Mutiny Charocal',"Category"=>$category_ru[2], "Price"=>10999, "URL"=>'img/lot-4.jpg'],
    ["Name"=>'Куртка для сноуборда DC Mutiny Charocal',"Category"=>$category_ru[3], "Price"=>7500, "URL"=>'img/lot-5.jpg'],
    ["Name"=>'Маска Oakley Canopy',"Category"=>$category_ru[5], "Price"=>5400, "URL"=>'img/lot-6.jpg']
];*/





function interval (){
    $date_now = strtotime("now");
    $date_of_end = strtotime("today +1 day - 1 second - 3 hours");
    $interval = $date_of_end-$date_now;
    $date_format = date('H:i', $interval);
    $result = $date_format;
    return $result;
}

function price ($price) {
    $price = ceil($price);
    if ($price >= 1000){
        $result = number_format($price, 0,'',' ');
    }
    else $result = $price;
    return $result .'<b class="rub">р</b>';
}



function include_template($name, $data) {
$name = 'templates/' . $name;
$result = '';
if (!file_exists($name)) {
return $result;
}
ob_start();
extract($data);
require($name);
$result = ob_get_clean();
return $result;
}
?>
