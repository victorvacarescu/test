<?php

require_once ('../helper.php');

arataErori();

$idCaracteristici = $_GET['idCaracteristici'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM caracteristici WHERE Id=".$idCaracteristici;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/features/listare_caracteristici.php");
die();

?>


