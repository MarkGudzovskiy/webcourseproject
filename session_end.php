<?php
require "session.php";
$session_user = false;
$_SESSION["user"] = null;
echo $session_user;
header("Location: index.php");
