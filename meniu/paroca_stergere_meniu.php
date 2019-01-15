<?php

require_once ('../helper.php');

arataErori();

$idMeniu    =   $_GET['idMeniu'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM meniu WHERE Id = " . $idMeniu;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/meniu/paroca_listare_meniu.php");
die();

?>