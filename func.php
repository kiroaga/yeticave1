<?php
require_once('functions.php');
require_once('data.php');

$success_send = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    if (searchUserByEmail($email, $users)) {
        $code = uniqid();
        $url = "http://" . $_SERVER['HTTP_HOST'] . "/forgot.php?code=" . $code;
        $message = "Ссылка на восстановление пароля: " . $url;

        $_SESSION['pass'] = [$email, $code];
        mail($email, "Восстановление пароля", $url);

        $success_send = true;
    }
}
$page_content = include_template('send.php', ['success' => $success_send]);
$layout_content = include_template('layout.php', [
    'content'    => $page_content,
    'categories' => [],
    'title'      => 'GifTube - Восстановление пароля'
]);



function searchUserByEmail($email, $users) {
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {
            $result = $user;
            break;
        }
    }

    return $result;
}
