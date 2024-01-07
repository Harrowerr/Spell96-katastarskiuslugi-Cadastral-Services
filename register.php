<?php
require_once "dbconfig.php";

if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['lozinka']) && isset($_POST['korisnicko_ime']) && isset($_POST['submit']))
{

$ime=$_POST['ime'];
$prezime=$_POST['prezime'];
$korisnicko_ime=$_POST['korisnicko_ime'];
$lozinka=$_POST['lozinka'];

$loz_enc = password_hash($lozinka,PASSWORD_DEFAULT);

$sql = "INSERT INTO `korisnik` (`Име`, `Презиме`, `Корисничко Име`, `Лозинка`) VALUES('$ime','$prezime','$korisnicko_ime','$loz_enc')";

if (mysqli_query($con,$sql))
echo "Registration complete";
else {
echo "Unsuccessful Registration.";

}
}
 ?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="login.css">
    <meta charset="utf-8">
    <title>Регистрација</title>
  </head>
<body style="background: url('images/img_5.jpg'); background-size: 100% 100%;" link="^000" alink="^017bf5" vlink="^000">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
    <div align ="center" class="form">
      <h2>Регистрација</h2>
      <input type="text" name="ime" placeholder="Внесете вашето име">
      <input type="text" name="prezime" placeholder="Внесете вашето презиме"><br>
      <input type="username" name="korisnicko_ime" required placeholder="Внесете корисничкото име">
      <input type="password" name="lozinka" required placeholder="Внесете вашата лозинка"><br><br><br>
      <input type="submit" name="submit" class ="btnn" value="Испрати"><br><br>
      <a href="./login.html" class="back">Назад</a>

    </div>
  </form>

  </body>
</html>
