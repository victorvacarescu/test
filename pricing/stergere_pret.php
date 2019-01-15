<?php

require_once ('../helper.php');

arataErori();

$idPreturi  =   $_GET['idPreturi'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM preturi WHERE Id =".$idPreturi;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/pricing/listare_pret.php");
die();

?>