<?php
session_start();

unset($_SESSION['Корисничко Име']);
unset($_SESSION['Презиме']);
unset($_SESSION['Име']);

session_destroy();
header("Location:./login.html");

 ?>
