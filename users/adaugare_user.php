<?php

require_once ('../helper.php');

require_once ('../validare_formular.php');

verificaDacaEsteLogat();

arataErori();

$salveaza = false;

$campuriValidare = array(

    "nume"      => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "prenume"   => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "email"     => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "parola"    => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),

);

if(isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']) {

        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $email = $_POST['email'];
        $parola = $_POST['parola'];
        $data = date("Y-m-d H:i:s");

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO utilizatori (Nume, Prenume, DataInregistrare, Parola,Email) VALUES  ('" . $nume . "','" . $prenume . "','" . $data . "','" . $parola . "','" . $email . "')";
        mysqli_query($db, $sql_statement);

        $amSalvat = true;
    }
}

?>
<?php require_once ('../header.php') ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare utilizator</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/users/listare_user.php">Inapoi</a>
                </div>
                <div class="col-md-12">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Nume</label>
                            <input type="text" name="nume" class="form-control" value="<?=arataValoare('nume',$campuriValidare)?>"/>
                            <?=arataEroareFormular("nume",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Prenume</label>
                            <input type="text" name="prenume" class="form-control" value="<?=arataValoare('prenume',$campuriValidare)?>"/>
                            <?=arataEroareFormular("prenume",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?=arataValoare('email',$campuriValidare)?>"/>
                            <?=arataEroareFormular("email",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <input type="text" name="parola" class="form-control" />
                            <?=arataEroareFormular("parola",$campuriValidare)?>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" class="btn btn-success" value="Salveaza" />
                    </form>
                </div>
            </div>
            <script>
                <?php if($amSalvat){ ?>
                alert('Utilizatorul a fost inregistrat!');
                <?php } ?>
            </script>
<?require_once ('../footer.php');