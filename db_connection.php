<?php
$connect = mysqli_connect("std-mysql.ist.mospolytech.ru", "std_1989_water", "12345678", "std_1989_water");
mysqli_set_charset($connect, "utf8");
if ($connect == False) {
    die("Cannot connect DB");
}

