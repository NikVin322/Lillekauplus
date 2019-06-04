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
    <title>Админская панель(Цветы)</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <a href="regist_user.php">Регистрация</a><br>
    <a href="LogIn.php">Войти</a><br><br>
  
    <a href="admin_panel.php">Админская панель(цветы)</a><br>
    <a href="admin_panel_sale.php">Админская панель(продажа)</a><br><br>
  
    <a href="sale_page.php">Продажа</a><br>
  
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<h1>Админская панель(Цветы)</h1><br>
  <form action="?">
    <input type="hidden" name="Add" value="True">
    Новая Фура:<br>
    Номер фуры:<br>
    <input type="text" name="autonr"><br>
    Входящая масса:<br>
    <input type="text" name="sisenemismass"><br>
    <input type="submit" value="Ввести данные"><br><br><br>
 </form>
 <table>
    <?php  
    $kask=$yhendus->prepare("SELECT Id, Sort, Color, BuyPriceForOne, SalePriceForOne, Number FROM flowers");
    $kask->bind_result($id, $sort, $color, $buypriceforone, $salepriceforone, $number );
    $kask->execute();
  
    echo "<table cellspacing=0 cellpadding=0 border=1>";
    echo "<tr>";
    /*echo     "<th>#</th>";*/
    echo     "<th>Сорт цветов</th>";
    echo     "<th>Цвет цветов</th>";
    echo     "<th>Цена покупки цв.</th>";
    echo     "<th>Цена прод. цв.</th>";
    echo     "<th>Кол. цв. на скл.</th>";
    echo     "<th>Изменить</th>";
    echo "</tr>";
    while($kask->fetch()){
        echo "<tr>";
        /*echo "<td>".$id."</td>";*/
        echo "<td>".$sort."</td>";
        echo "<td>".$color."</td>";
        echo "<td>".$buypriceforone."</td>";
        echo "<td>".$salepriceforone."</td>";
        echo "<td>".$number."</td>";
        echo "<td><input type='button' value='Рассчитать' onClick='Update($id)'></td>";
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
