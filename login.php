<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="utf-8">
   <title>Najava</title>
    <link rel="stylesheet" href="login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="file:///E:/fontawesome/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="file:///E:/jquery.js"></script>
    <style>

  </style>
  </head>
  <body style="background: url('images/img_5.jpg'); background-size: 100% 100%;" link="^000" alink="^017bf5" vlink="^000">
  <form action="login.php" method="POST">


    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
  </body>
</html>


<?php
require_once "dbconfig.php";
if (isset($_POST['submit'])) {
  if (isset($_POST['korisnicko_ime']) && isset($_POST['lozinka'])) {
    $korisnicko_ime = $_POST['korisnicko_ime'];
    $lozinka = $_POST['lozinka'];
    $query = "SELECT * FROM `korisnik` WHERE `Корисничко Име`='$korisnicko_ime'";
    $result = mysqli_query($con, $query);
    if (!$result)
      die('You are not registered!');
    else {
      $row = mysqli_fetch_row($result);

      $verify = password_verify($lozinka, $row[4]); 
        
      if ($verify) {
        
        echo "<h2 align = center>Здраво $row[1], сега сте најавени како $row[1] $row[2]</h2>";
        session_start();
        $_SESSION['Корисничко Име'] = $row[3];
        $_SESSION['Презиме'] = $row[2];
        $_SESSION['Име'] = $row[1];

        echo "<h3 align = center ><a href=index.html>Кликнете овде за да продолжите</a></h3>";

        echo "<h3 align = center><a href=logout.php>Одјави се</a></h3>";

      } else
        die("<h3>Неважечка комбинација на корисничко име/лозинка</h3><p><a href=logout.php>Назад</a></p>");
    }
  }
}
?>