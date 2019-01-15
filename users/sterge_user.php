<?php

require_once ('../helper.php');

arataErori();

$idUtilizator = $_GET['idUtilizator'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM  utilizatori WHERE Id=".$idUtilizator;

mysqli_query($db,$sql_statement);

header("Location: http://www.menut.ro/users/listare_user.php");
die();

?>


