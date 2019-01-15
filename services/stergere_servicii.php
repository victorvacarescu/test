<?php

require_once ('../helper.php');

arataErori();

$idServicii =   $_GET['idServicii'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM servicii WHERE Id = $idServicii";

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/services/listare_servicii.php");
die();

?>


