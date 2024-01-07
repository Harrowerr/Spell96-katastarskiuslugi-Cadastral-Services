<?php
require_once "dbconfig.php";
if(isset($_POST['submit']))
{
if(isset($_POST['korisnicko_ime']) && isset($_POST['lozinka']))
{
  $korisnicko_ime = $_POST['korisnicko_ime'];
  $lozinka = $_POST['lozinka'];
  $query = "SELECT * FROM `korisnik` WHERE `Корисничко Име`='$korisnicko_ime'";
  $result = mysqli_query($con,$query);
  if(!$result) die ('You are not registered!');
  else {
  $row = mysqli_fetch_row($result);

  $verify = password_verify($lozinka,$row[4]);

  if($verify)
  {
    echo "<h3>Здраво $row[1], сега сте најавени како $row[1] $row[2]</h3>";
    session_start();
    $_SESSION['Корисничко Име'] = $row[3];
    $_SESSION['Презиме'] = $row[2];
    $_SESSION['Име'] = $row[1];

    echo "<p><a href=index.html>Кликнете овде за да продолжите</a></p>";

    echo "<p><a href=logout.php>Одјави се</a></p>";

  }
  else
  die("<h3>Неважечка комбинација на корисничко име/лозинка</h3><p><a href=logout.php>Назад</a></p>");
}
}
}
?>
