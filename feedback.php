<?php require('db_connection.php');
require("session.php");
if (!empty($_POST)) {
    $result = mysqli_query($connect, "INSERT INTO feedbacks (user_login_id, user_name, text) VALUES (
                '" . $session_user['id'] . "',
                '" . $_POST["name"] . "',
                '" . $_POST["text"] . "')"
            );
        header("Location: index.php");
    }

$user_role = $session_user['role'];
if ($user_role == 'user') {
    $content = '<div class="auth" style="width: 30%">
<form action="feedback.php" method="post">
            <p class="auth_header"><b>Обратная связь</b></p><br>
            <p class="auth_text"><strong>Ваше имя: </strong>
                <input type="text" maxlength="15" size="18%" name="name"></p><br>
            <p class="auth_text"><strong>Напишите нам: </strong>
                <textarea name="text" cols="18%" rows="5"></textarea></p><br>
            <div style="display: flex; justify-content: center">
                <button class="submitbutton" type="submit">Отправить</button>
            </div>
        </form>
        </div>';
} else if ($user_role == 'admin') {
    $feedbacks = mysqli_query($connect, "SELECT * FROM feedbacks;");
    $content = '<div class="auth" style="width: 60%">
        <h3>Письма пользователей</h3>
        <table class="fb_table">
    <tr><td class="col1">Номер</td><td class="col2-3">Логин</td><td class="col2-3">Имя</td><td class="message">Сообщение</td></tr>';
        while ($fb = mysqli_fetch_assoc($feedbacks)){
            $name = mysqli_query($connect, "SELECT login FROM users WHERE id =".$fb['user_login_id'] );
            $login = mysqli_fetch_assoc($name);

            $content .= '
            <tr>
                <td class="col1">'.$fb['id'].'</td><td class="col2-3">'.$login['login'].'
                 </td><td class="col2-3">'.$fb['user_name'].'</td><td class="message">'.$fb['text'].'</td>
            </tr>';
        }
        $content .= '</table></div>';
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Moscow Districts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="./layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="./layout/styles/preloader.css" rel="stylesheet" type="text/css" media="all">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">

</head>

<body style="background-image: url('./images/backgrounds/moscow3.jpg'); background-size: 100%"
">
<?php include "./preloader.php" ?>
<header>
    <div class="navbar">
        <nav id="mainav" style="margin-left: 1em; color: white; background: none; border: none">
            <ul style="text-align: left">
                <li><a href="index.php">< На главную</a></li>
            </ul>
        </nav>
    </div>
</header>
<div style="display: flex; justify-content: center">
        <?php echo $content?>

</div>
<script src="./layout/scripts/preloader.js"></script>
</body>
</html>
