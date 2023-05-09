<?php include('db_connection.php');
require('session.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Moscow Districts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="layout/styles/preloader.css" rel="stylesheet" type="text/css" media="all">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">

    <script crossorigin="anonymous" src="https://kit.fontawesome.com/44de4fd467.js"></script>
</head>

<body style="background-color: aliceblue">
<?php include "./preloader.php" ?>
<header>
    <div style="color: black">
        <nav id="mainav" style="background: none; border: none">
            <ul style="display: inline; padding-left: 30%">
                <li><a href="index.php">Главная</a></li>
                <li class="active"><a href="map.php">Карта</a></li>
                <?php
                if ($session_user != false) {
                    $content = '<li><a href="feedback.php">Обратная связь</a></li></ul>
                <ul style="display: inline; padding-left: 30%">
                <li><a href="session_end.php">Выйти</a></li>
            </ul>';
                } else {
                    $content = '</ul>
            <ul style="display: inline; padding-left: 30%">
                <li><a href="authorisation.php">Войти</a></li>
            </ul>';
                }
                echo $content;
                ?>
        </nav>
    </div>
</header>

<div style="text-align: center">
    <p>Добавьте информацию о вашем районе</p>
    <form action="" method="post">
        <label>
            <select name="district">
                <?php
                $result = mysqli_query($connect, 'SELECT regname FROM regnames');
                while ($district = mysqli_fetch_array($result)) {
                    echo '<option value="' . $district['regname'] . '">' . $district['regname'] . '</option>';
                }
                ?>
            </select>
        </label>
        <?php
        $result = mysqli_query($connect, 'SELECT * FROM indicators');
        while ($district = mysqli_fetch_array($result)) {
            echo '<p>' . $district['ind_name'] . '</p><input name="' . $district['ind_name'] . '">';
        }
        ?>
        <button type="submit">Отправить</button>
    </form>
</div>

<?php
if ($_POST and $_POST['district']) {
    $result = mysqli_query($connect, 'SELECT * FROM indicators');
    while ($district = mysqli_fetch_array($result)) {
        if ($_POST[str_replace(' ', '_', $district['ind_name'])])
        if (!mysqli_query($connect, "INSERT INTO users_data (ind_name, value, regname) VALUES ('" . $district['ind_name'] . "', '". $_POST[str_replace(' ', '_', $district['ind_name'])] ."', '". $_POST['district'] ."')")) {
            die("Error happens");
        }
    }
}
?>

<div class="tooltip"></div>
<script src="layout/scripts/preloader.js"></script>
<script src="layout/scripts/map.js"></script>

</body>
</html>