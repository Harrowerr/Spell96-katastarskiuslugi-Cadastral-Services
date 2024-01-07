<?php
session_start();

if(isset($_SESSION['username']))
{
  $username = $_SESSION['Корисничко Име'];
  $surname = $_SESSION['Презиме'];
  $firstname = $_SESSION['Име'];

  echo "Welcome back $firstname.<br>
        Your full name is $firstname $surname. <br>
        Your username is '$username'.";

        echo "<p><a href=logout.php>Logout</a></p>";

}


 ?>
