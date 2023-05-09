<?php include('db_connection.php');
$result = mysqli_query($connect, 'SELECT regname FROM regnames');
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
<div class="infobg">
    <div class="info">
        <img src="images/backgrounds/img.png" alt="close" class="close_info">
        <?php while ($district = mysqli_fetch_array($result)) {
            $name = $district['regname'];
            $adm_dist = $district['regname'];
            $text = '';
            $reg_info = mysqli_query($connect, 'SELECT DISTINCT * FROM `all.csv` WHERE regname = "' . $name . '" and ind_name NOT LIKE "%Неизвестно%"');
            ?>
            <?php
            if ($name) {
                $name = strtr($name, [' ' => '']);
                $text = '<div class="info_text_hidden" id = "' . $name . '">
                <h2 class="info_header"></h2>
                <div style="display: flex; justify-content: center">
                <div style="display: flex; justify-content: center"><div>';
                if ($indicator = mysqli_fetch_array($reg_info)) {
                    while ($indicator = mysqli_fetch_array($reg_info)) {
                        $text .= '<p>' . $indicator["ind_name"] . ': ' . $indicator["value"] . '</p>';
                    }
                    $text .= '<p>Также вы можете обновить или добавить данные по <a class="add_info_link" href="add_info.php">ссылке</a></p>';
                    $text .= '</div></div></div></div>';
                } else {
                    $text .= '<p>Данных об этом районе пока нет, но вы можете их добавить по <a class="add_info_link" href="add_info.php">ссылке</a></p></div></div></div></div>';
                }
                echo $text;
            }
        }
        ?>
    </div>
</div>

<div style="text-align: center">
    <p>Нажмите на интересующий район, чтобы узнать информацию о нём</p>
    <div class="map">
        <?php include('svg.php') ?>
        <img src="images/backgrounds/Msk_blank.svg" alt="" style="z-index: 1">
    </div>
</div>

<div class="tooltip"></div>
<script src="layout/scripts/preloader.js"></script>
<script src="layout/scripts/map.js"></script>

</body>
</html>