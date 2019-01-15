<?php

require_once ('../helper.php');

arataErori();

$idPortofoliu    =   $_GET['idPortofoliu'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM portofoliu WHERE Id = " . $idPortofoliu;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/portfolio/listare_portofoliu.php");
die();

?>