<?php require('db_connection.php');



if (!empty($_POST)) {
    $result = mysqli_query($connect, "SELECT * FROM users WHERE
        login='" . $_POST["login"] . "'
    ");

    $user = mysqli_fetch_assoc($result);

    if (password_verify($_POST["password"], $user['password'])) {
        session_start();
        $_SESSION["user"] = $user;
        header("Location: index.php");
    } else {
        echo '<script>';
        echo 'alert("Неверный пароль")';
        echo '</script>';
    }
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

<body style="background-image: url('./images/backgrounds/moscow3.jpg'); background-size: 100%">
<?php include "./preloader.php" ?>
<header>
    <div>
        <nav id="mainav" style="margin-left: 1em; color: white; background: none; border: none">
            <ul style="text-align: left">
                <li><a href="index.php">< На главную</a></li>
            </ul>
        </nav>
    </div>
</header>


<div style="display: flex; justify-content: center">
    <div class="auth">
        <form action="authorisation.php" method="post">
            <p class="auth_header"><b>Авторизация</b></p><br>
            <p class="auth_text"><strong>Логин: </strong>
                <input type="text" maxlength="15" size="23em" name="login"></p><br>
            <p class="auth_text"><strong>Пароль: </strong>
                <input type="password" maxlength="25" size="20em" name="password"></p><br>
            <div style="display: flex; justify-content: center">
                <button type="submit" class="submitbutton">Войти</button>
            </div>
        </form>
        <div class="reg">
            <p class="unreg">Ещё не проходили регистрацию?</p>
            <a href="registration.php" class="auth_reg">Регистрация</a>
        </div>
    </div>
</div>


<script src="./layout/scripts/preloader.js"></script>
</body>
</html>
