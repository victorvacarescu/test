<?php
require_once ('helper.php');

arataErori();
$mesaj = "";

if (isset($_POST['flag'])) {
    $db = conectareLaBazaDeDate();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql_statement = "SELECT * FROM utilizatori WHERE Nume = '$username' AND Parola = '$password'";
    $result = mysqli_query($db, $sql_statement);

    if ($result->num_rows != 1){
        $mesaj = "Utilizatorul nu este inregistrat!";
    } else {
        $user = mysqli_fetch_assoc($result);

        $_SESSION['idUser'] = $user['Id'];

        header("location: http://www.menut.ro/dashboard.php");
    }
}

?>
<!--
TO DO:
 - la submit formular sa verifice emailul si parola in tabelul utilizatori
 - daca informatiile sunt bune:
    - salvezi in $_SESSION id-ul utilizatorului logat, numele lui si o variabila booleana numita logat (true)
    - redirect catre dashboard
 - daca informatiile nu sunt bune mesaj de eroare pe pagina de admin
 - in header.php sa verifici mereu daca $_SESSION['logat'] este adevarat, ma lasi pe pagina, iar daca nu ma trimiti pe pagina de login
 - in meniu sa am un link catre o pagina de logout care imi sterge tot ce se afla in $_SESSION si ma redirectioneaza catre admin.php
 -->
<!---->
<?php require_once ('header.php'); ?>
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h1 class="text-center">Admin</h1>
                </div>
                <div class="col-md-4 offset-md-4">
                    <form action="" target="" method="POST">
                        <?php if(!empty($mesaj)) echo "<p>".$mesaj."</p>" ?>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="username" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="password" required/>
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <input type="hidden" name="flag" value="set"/>
                                <input type="submit" class="btn btn-success"/>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="btn btn-danger" href="">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<?php require_once('footer.php'); ?>
