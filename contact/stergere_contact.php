<?php
require ('../helper.php');
arataErori();

$idContact = $_GET['idContact'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM contact WHERE Id=".$idContact;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/contact/listare_contact.php");

die();

?>