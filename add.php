<?php
require_once('functions.php');
require_once('data.php');

$error = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['lot-name'] && $_POST['message'] && $_FILES['image'] && $_POST['lot-rate'] && $_POST['lot-date'] && $_POST['lot-step']) {
            $file = $_FILES['image']['name'];
            $temp = $_FILES['image']['tmp_name'];
            $type = $_FILES['image']['type'];
            $path = __DIR__.'/img'.$file;
                move_uploaded_file($temp, $path);
                $query = 'INSERT INTO lot VALUES (1, $_POST[category], null, CURRENT_DATE, $_POST[lot_name], $_POST[message], $path, $_POST[lot_rate], $_POST[lot_date], $_POST[lot-step])';
                $result_add = mysqli_query($link, $query);
                if ($result_add) {
                    header('location:index.php');
                } else {
                    header('location:index.php');
                }
    } else{
        if (empty($_POST['lot-name']))
            array_push($error ,'1');
        if (empty($_POST['message']))
            array_push($error ,'2');
        if (empty($_POST['image']))
            array_push($error ,'3');
        if (empty($_POST['lot-rate']))
            array_push($error ,'4');
        if (empty($_POST['lot-date']))
            array_push($error ,'5');
        if (empty($_POST['lot-step']))
            array_push($error ,'6');
    }
}

$page_content = include_template('add.php', [
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'adv_info'=>$adv_info,
    'error'=>$error]);

$layout_content = include_template('layout.php', [
    'page_content' => $page_content,
    'category_ru'=>$category_ru,
    'category_eng'=>$category_eng,
    'title' => 'Добавить лот',
    'is_auth'=>$is_auth,
    'user_name' => $user_name,
]);


print($layout_content);
?>
