<?php
require ("conf.php");
  $kask=$yhendus->prepare("SELECT Id, Sort, Color, BuyPriceForOne, SalePriceForOne, Number FROM flowers");
  $kask->bind_result($Id, $Sort, $Color, $BuyPriceForOne, $SalePriceForOne, $Number);
  $kask->execute();
 
  if ($yhendus->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
<!doctype html>
<html>
<head>
    <title>Продажа цветов</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <!--<a href="input.php">Вход</a><br>
    <a href="output.php">Выход</a>-->
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<h1>Продажа цветов</h1><br>
  
<table>
    <?php
   
    /*
    echo "<table cellspacing=0 cellpadding=0 border=1>";
    echo "<tr>";
    echo     "<th>#</th>";
    echo     "<th>Номер фур</th>";
    echo     "<th>Входящая масса</th>";
    echo     "<th>Выходящая масса</th>";
    echo     "<th>Входящ.+Выходящ. масса</th>";
    echo "</tr>";
    while($kask->fetch()){
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>Фура  №$autonr</td>";
        echo "<td>".$sisenemismass," кг."."</td>";
        echo "<td>".$lahkumismass," кг."."</td>";
        echo "<td>".($sisenemismass-$lahkumismass)."</td>";
        echo "</tr>";
    }
    echo "</table>"*/
    ?>
</table>
    <a href="regist_user.php">Регистрация</a><br>
    <a href="LogIn.php">Войти</a><br><br>
  
    <a href="admin_panel.php">Админская панель(цветы)</a><br>
    <a href="admin_panel_sale.php">Админская панель(продажа)</a><br><br>
 
    <a href="sale_page.php">Продажа</a><br>
</body>
<?php
$yhendus->close();
?>
  <br>
<!--<a href="Viljaladu.docx">Вордовский файл</a>-->
</html>
