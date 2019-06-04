<?php
require ("conf.php");

$TableName="flowers_regisr";
$Error=false;

if(isset($_REQUEST["Add"])) {
    $Name=$_REQUEST["Name"];
    $Mail=$_REQUEST["Mail"];
    $Password=$_REQUEST["Password"];

if($Name== "" || $Mail== "" || $Password== "")
    $Error=true;
if(!$Error) {
    $kask = $yhendus->prepare("INSERT INTO  flowers_regisr(Name,Mail,Password) value(?,?,?)");
    $kask->bind_param("sss", $Name, $Mail, $Password);
    $kask->execute();
    header("Location:  LogIn.php");  
}
}
?>
<!doctype html>
<html>
<head>
    <title>Регистрация</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
<h1>Регистрация</h1><br>
<form action="?">
    <input type="hidden" name="Add" value="True">
    Имя:<br>
    <input type="text" name="Name"><br>
    Почта:<br>
    <input type="text" name="Mail"><br>
    Пароль:<br>
    <input type="text" name="Password"><br>
    <input type="submit" value="Зарегистрации"><br><br><br>
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
