<?php

require_once ('../helper.php');

arataErori();

$idBlog = $_GET['idBlog'];

$db = conectareLaBazaDeDate();

$sql_statement = "DELETE FROM blog WHERE Id =".$idBlog;

mysqli_query($db, $sql_statement);

header("Location: http://www.menut.ro/blog/listare_blog.php");
die();

?>