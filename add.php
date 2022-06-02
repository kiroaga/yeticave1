<?php
require_once('functions.php');
require_once('data.php');

$error = array();
if (!empty($user_id)) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['lot-name']) && !empty($_POST['message']) && !empty($_FILES['image']['name']) && !empty($_POST['lot-rate']) && !empty($_POST['lot-date']) && !empty($_POST['lot-step'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], 'img/' . $_FILES['image']['name']);
            $id_user = 1;
            $id_category = $_POST['category'];
            $name = $_POST['lot-name'];
            $description = $_POST['message'];
            $image = 'img/' . $_FILES['image']['name'];
            $start_price = $_POST['lot-rate'];
            $end_date = $_POST['lot-date'];
            $step = $_POST['lot-step'];
            $query = "INSERT INTO lot (id_user, id_category, id_winner, create_date, name, description, image, start_price, end_date, step) VALUES
                (1, $id_category, null, now(), '$name', '$description', '$image', $start_price, '$end_date', $step)";
            $result_add = mysqli_query($link, $query);
            $query2 = 'SELECT id_lot from lot order by id_lot desc';
            $result_id = mysqli_query($link, $query2);
            $ID = $result_id->fetch_row()[0];
            if ($result_add) {
                header('Location:lot.php?page=' . $ID);
            } else {

            }
        } else {
            if (empty($_POST['lot-name']))
                array_push($error, '1');
            if (empty($_POST['message']))
                array_push($error, '2');
            if (empty($_POST['image']))
                array_push($error, '3');
            if (empty($_POST['lot-rate']))
                array_push($error, '4');
            if (empty($_POST['lot-date']))
                array_push($error, '5');
            if (empty($_POST['lot-step']))
                array_push($error, '6');
        }
    }

    $page_content = include_template('add.php', [
        'category_ru' => $category_ru,
        'category_eng' => $category_eng,
        'adv_info' => $adv_info,
        'error' => $error]);

    $layout_content = include_template('layout.php', [
        'page_content' => $page_content,
        'category_ru' => $category_ru,
        'category_eng' => $category_eng,
        'title' => 'Добавить лот',
        'user_name' => $user_name,
        'user_id'=>$user_id
    ]);
}
else
{
    $page_content = include_template('403.php',
    array());

    $layout_content = include_template('layout.php', [
        'page_content' => $page_content,
        'category_ru' => $category_ru,
        'category_eng' => $category_eng,
        'title' => 'Добавить лот',
        'user_name' => $user_name,
    ]);
}

print($layout_content);

?>
