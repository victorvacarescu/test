<?php

require_once ('../helper.php');
require_once ('../validare_formular.php');
verificaDacaEsteLogat();
arataErori();
$salveaza = false;

$campuriValidare = array(

    "titlu"=> array("regula"=>"required"   ,"valoare"=>"","mesaj"=>""),
    "pret" => array("regula"=>"required"   ,"valoare"=>"","mesaj"=>""),
    "text" => array("regula"=>""           ,"valoare"=>"","mesaj"=>""),
);

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if($raspunsValidare['formularReusit']){
        $titlu      =   $_POST['titlu'];
        $pret       =   $_POST['pret'];
        $data       =   date("Y-m-d H:i:s");

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO preturi (Titlu, Pret, DataInregistrare) VALUES ('".$titlu."','".$pret."','".$data."')";

        mysqli_query($db, $sql_statement);

        $salveaza = true;
    }
}

?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Pret</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/pricing/listare_pret.php">Inapoi</a>
                </div>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Titlu</label>
                            <input class="form-control" type="text" name="titlu" value="<?=arataValoare('titlu',$campuriValidare)?>"/>
                            <?=arataEroareFormular("titlu",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Pret</label>
                            <input class="form-control" type="text" name="pret" value="<?=arataValoare('pret',$campuriValidare)?>"/>
                            <?=arataEroareFormular("pret",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea name="text" rows="5" class="form-control"><?=arataValoare('text',$campuriValidare)?>
                            </textarea>
                            <?=arataEroareFormular("text",$campuriValidare)?>
                        </div>
                        <input type="hidden" name="flag" value="set">
                        <input class="btn btn-success" type="submit" value="Salveaza"/>
                    </form>
                </div>
            </div>
<script>
    <?php if($salveaza){ ?>
    alert ('Rubrica Preturi adaugata cu succes!');
    <?php } ?>
</script>
 <?php require_once ('../footer.php');
