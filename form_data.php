<?php
    $server = 'localhost';
    $username = 'menutro_victor';
    $database = 'menutro_test';
    $password = 'victorie00';

    
    $db = mysqli_connect($server, $username, $password, $database);
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $nume   = $_POST["name"];
    $email  = $_POST["email"];
    $mesaj  = $_POST["message"];

    $sql_statement = "INSERT INTO contact (Nume, Email, Mesaj) VALUES " . "('" . $nume . "','" . $email . "','" . $mesaj . "')";
  
    mysqli_query($db,$sql_statement);
    
?>