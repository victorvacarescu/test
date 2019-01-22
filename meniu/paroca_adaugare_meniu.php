<?php

require_once ('../helper.php');

require_once ('../validare_formular.php');

verificaDacaEsteLogat();

arataErori();

$salveaza = false;

$campuriValidare = array(

    "nume" => array("regula"=>"required", "valoare"=>"", "mesaj"=>"")

);

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']) {

        $nume = mysqli_real_escape_string($db, $_POST['nume']);
        $data = date("Y-m-d H:i:s");

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO meniu (Nume, DataInregistrare) VALUES ('" . $nume . "','" . $data . "')";
        mysqli_query($db, $sql_statement);

        $salveaza = true;

    }
}
?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Meniu</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/meniu/paroca_listare_meniu.php">Inapoi</a>
                </div>
                <div class="col-md-12"> <!--row nou?-->
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Nume Meniu</label>
                            <input type="text" name="nume" class="form-control" value="<?=arataValoare('nume',$campuriValidare)?>"/>
                            <?=arataEroareFormular("nume",$campuriValidare)?>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" class="btn btn-success" value="Salveaza"/>
                    </form>
                </div>
            </div>
<script>
    <?php if($salveaza){?>
    alert('Rubrica Meniu adaugata cu succes!');
    <?php } ?>
</script>
 <?php require_once ('../footer.php');
