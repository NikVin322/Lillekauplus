<?php
require ("conf.php");
$TableName="Track";
$Error=false;
    if(isSet($_REQUEST["Upd"])) {
    $lahkumass=$_REQUEST["lahkumass"];
    $kask = $yhendus->prepare("UPDATE Track SET lahkumismass= ? WHERE id=?");
    /*$kommentaarilisa = "\n".$_REQUEST["kommentaarikast"]."\n";*/
    $kask->bind_param("ii", $lahkumass, $_REQUEST["Upd"]);
    $kask->execute();
}
?>
<!doctype html>
<html>
<head>
    <title>Админская панель(Продажа)</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <a href="regist_user.php">Регистрация</a><br>
    <a href="LogIn.php">Войти</a><br><br>
  
    <a href="admin_panel.php">Админская панель(цветы)</a><br>
    <a href="admin_panel_sale.php">Админская панель(продажа)</a><br><br>
 
    <a href="sale_page.php">Продажа</a><br>
    <!--<a href="output.php">Выход</a>-->
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<h1>Админская панель(Продажа)</h1><br>
<table>
    <?php  
    $kask=$yhendus->prepare("SELECT flowers_sale.Id, Flowers_id, BuyNumber, Date 
    FROM flowers_sale, flowers 
    WHERE flowers_sale.Flowers_id=flowers.id");
    $kask->bind_result($id, $flowers_id, $buynumber, $date);
    $kask->execute();
  
    echo "<table cellspacing=0 cellpadding=0 border=1>";
    echo "<tr>";
    /*echo     "<th>#</th>";*/
    echo     "<th>Сорт цветов</th>";
    echo     "<th>Кол. прод. цветов</th>";
    echo     "<th>Дата продажи</th>";
    echo "</tr>";
    while($kask->fetch()){
        echo "<tr>";
       /*echo "<td>".$id."</td>";*/
        echo "<td>".$flowers_id."</td>";/*я старался поставить нормальное вторичный ключ, но нужно больше времяни(скорее всего ошибка где-то в SELECT)*/
        echo "<td>".$buynumber."</td>";
        echo "<td>".$date."</td>";
        echo "</tr>";
    }
    echo "</table>";
    ?>
</table>
</body>
<?php
$yhendus->close();
?>
  <br>

</html>