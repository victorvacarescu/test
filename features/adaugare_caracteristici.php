<?php

require_once ('../helper.php');

require_once ('../validare_formular.php');

verificaDacaEsteLogat();

arataErori();

$salveaza = false;

$campuriValidare = array(

    "sigla" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "titlu" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "text"  => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),

);

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']){

        $sigla  = mysqli_real_escape_string($db, $_POST['sigla']);
        $titlu  = mysqli_real_escape_string($db, $_POST['titlu']);
        $text   = mysqli_real_escape_string($db, $_POST['text']);
        $data   = date("Y-m-d H:i:s");

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO caracteristici (Sigla, Titlu, Text, DataInregistrare) VALUES ('" . $sigla . "','" . $titlu . "','" . $text . "','" . $data . "')";
        mysqli_query($db, $sql_statement);

        $salveaza = true;
    }

}

?>

<?php require_once ('../header.php');?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Caracteristici</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/features/listare_caracteristici.php">Inapoi</a>
                </div>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Sigla</label>
                            <input type="text" class="form-control" name="sigla" value="<?=arataValoare('sigla',$campuriValidare)?>"/>
                            <?=arataEroareFormular("sigla",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Titlu</label>
                            <input type="text" class="form-control" name="titlu" value="<?=arataValoare('titlu',$campuriValidare)?>"/>
                            <?=arataEroareFormular("titlu",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea name="text" rows="4" class="form-control"><?=arataValoare('text',$campuriValidare)?>
                            </textarea>
                            <?=arataEroareFormular("text",$campuriValidare)?>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" value="Salveaza" class="btn btn-success"/>
                    </form>
                </div>
            </div>
            <script>
                <?php if($salveaza){?>
                alert ('Rubrica Caracteristici adaugata cu succes!');
                <?php } ?>
            </script>
<?php require_once ('../footer.php');?>
