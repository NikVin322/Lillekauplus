<?php
require ("conf.php");

$TableName="flowers_regisr";
$Error=false;

if(isset($_REQUEST["login"])) {
  ?>aaaa<br><?php
    /*$Namee=$_REQUEST["Name"];
    $Passwordd=$_REQUEST["Password"];*/
    $username = mysqli_real_escape_string($yhendus, $_REQUEST['username']);
    $password = mysqli_real_escape_string($yhendus, $_REQUEST['password']);
if($username == "" || $password == "")
    $Error=true;
  ?>aaa<br><?php
if(!$Error) {
  ?>aa<br><?php

    $password = md5($password);
    $query = "SELECT * FROM flowers_regisr WHERE username='$username' AND password='$password'";
    $results = mysqli_query($yhendus, $query);
  
if (mysqli_num_rows($results) == 1){
  ?>a<br><?php
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header("Location:  output.php"); 
}else {
      array_push($errors, "Wrong username/password combination");
}  
}
}
   
?>
<!doctype html>
<html>
<head>
    <title>Вход</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
<h1>Вход</h1><br>
<form action="?">
    <input type="hidden" name="login" value="True">
    Имя:<br>
    <input type="text" name="username" ><br>
    Пароль:<br>
    <input type="password" name="password"><br>
    <input type="submit" value="Войти" name="login_user"><br><br><br>
</form><br>
    <a href="regist_user.php">Регистрация</a><br>
    <a href="LogIn.php">Войти</a><br><br>
  
    <a href="admin_panel.php">Админская панель(цветы)</a><br>
    <a href="admin_panel_sale.php">Админская панель(продажа)</a><br><br>
 
    <a href="sale_page.php">Продажа</a><br>
<?php
$yhendus->close();
?>
  <br>
</body>
</html>





