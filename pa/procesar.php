<?php 

$date1=$_POST['fecha1'];

$date2=$_POST['fecha2'];



echo $date1."<br>";
echo $date2."<br>";

 header("Location:inicio.php?open=Resultados&d1=$date1&d2=$date2");

?>