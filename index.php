<?php
require("session.php");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Moscow Districts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon/favicon-16x16.png">

    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="layout/styles/preloader.css" rel="stylesheet" type="text/css" media="all">
</head>

<body id="top">
<?php include "./preloader.php" ?>
<header>
    <div style="color: white">
        <nav id="mainav">

                <?php
                if ($session_user != false){
                    $content = '<ul style="display: inline; padding-left: 30%">
                <li class="active"><a href="index.php">Главная</a></li>
                <li><a href="map.php">Карта</a></li><li><a href="feedback.php">Обратная связь</a></li></ul>
                <ul style="display: inline; padding-left: 30%">
                <li><a href="session_end.php">Выйти</a></li>
            </ul>';
                }else{
                    $content = '<ul style="display: inline; padding-left: 30%">
                <li class="active"><a href="index.php">Главная</a></li>
                <li><a href="map.php">Карта</a></li></ul>
            <ul style="display: inline; padding-left: 30%">
                <li><a href="authorisation.php">Войти</a></li>
            </ul>';
                }
                echo $content;
                ?>
        </nav>
    </div>
</header>
<div class="bgded" style="background-image:url('images/backgrounds/moscow2.jpg');">
    <div class="wrapper overlay">
        <article id="pageintro" class="hoc clear">

            <h3 class="heading">Лучший район Москвы по качеству воды</h3>
            <p>Найдите самое подходящее место для приобретения дома</p>
            <div><a class="btn" href="map.php">Найти</a></div>

        </article>
    </div>

</div>

<div class="wrapper row3">
    <section class="hoc container clear">

        <div class="sectiontitle">
            <h6 class="heading">Наши преимущества</h6>
            <br>
            <p>Мы предлагаем шесть основных критериев оценки качества воды</p>
        </div>
        <ul class="nospace group elements">
            <li class="one_third first">
                <article>
                    <h6 class="heading">Наличие запаха при 20 и 60 градусах</h6>
                    <p>Узнайте, будет ли пахнуть ваша вода</p>
                </article>
            </li>
            <li class="one_third">
                <article>
                    <h6 class="heading">Наличие цветности и мутности</h6>
                    <p>Узнайте, будет ли вода из под крана чистой на вид</p>
                </article>
            </li>
            <li class="one_third">
                <article>
                    <h6 class="heading">Водородный показатель (pH)</h6>
                    <p>Важный критерий, оценивающий кислотность воды</p>
                </article>
            </li>
            <li class="one_third first">
                <article>
                    <h6 class="heading">Наличие железа и хлора</h6>
                    <p>Важно знать, что в вашей воде мало тяжёлых элементов</p>
                </article>
            </li>
            <li class="one_third">
                <article>
                    <h6 class="heading">Термотолерантные бактерии</h6>
                    <p>Узнайте, есть ли в вашей воде бактерии, устойчивые к высоким температурам</p>
                </article>
            </li>
            <li class="one_third">
                <article>
                    <h6 class="heading">Общее микробное число</h6>
                    <p>Убедитесь, что в вашей воде минимальное число микробов</p>
                </article>
            </li>
        </ul>

    </section>
</div>

<div class="wrapper row4">
    <footer id="footer" class="hoc clear">
        <div style="display: flex; ">
        <p class="footer_text">Приложение составленно на основе данных из открытых источников:</p>
            <ul class="footer_links">
                <li><a href="https://github.com/infoculture/mosopendata">Репозиторий сбора открытых данных с сайта <a href="https://data.mos.ru" target="_blank">data.mos.ru</a></a></li>
            </ul>
        </div>
    </footer>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/preloader.js"></script>
<script crossorigin="anonymous" src="https://kit.fontawesome.com/44de4fd467.js"></script>
</body>
</html>