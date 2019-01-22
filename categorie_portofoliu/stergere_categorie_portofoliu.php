<?php

require_once ('../helper.php');

arataErori();

$idCategorie    =   $_GET['idCategorie'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM categorie_portofoliu WHERE Id = " . $idCategorie;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/categorie_portofoliu/listare_categorie_portofoliu.php");

die();

?>