<?php

require_once ('../helper.php');

require_once ('../validare_formular.php');

verificaDacaEsteLogat();

arataErori();

$salveaza = false;

$campuriValidare = array(

    "categorie" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),

);

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']){

        $db = conectareLaBazaDeDate();
        $categorie  = mysqli_real_escape_string($db, $_POST['categorie']);
        $data   = date("Y-m-d H:i:s");



        $sql_statement = "INSERT INTO categorie_portofoliu (Categorie, DataInregistrare) VALUES ('" . $categorie . "','" . $data . "')";
        mysqli_query($db, $sql_statement);

        $salveaza = true;
    }

}

?>

<?php require_once ('../header.php');?>
<div class="row">
    <div class="col-md-6">
        <h1>Adaugare Categorie Portofoliu</h1>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-warning" href="http://www.menut.ro/categorie_portofoliu/listare_categorie_portofoliu.php">Inapoi</a>
    </div>
    <div class="col-md-12">
        <form action="" method="POST">
            <div class="form-group">
                <label>Categorie</label>
                <input type="text" class="form-control" name="categorie" value="<?=arataValoare('categorie',$campuriValidare)?>"/>
                <?=arataEroareFormular("categorie",$campuriValidare)?>
            </div>
            <input type="hidden" name="flag" value="set"/>
            <input type="submit" value="Salveaza" class="btn btn-success"/>
        </form>
    </div>
</div>
<script>
    <?php if($salveaza){?>
    alert ('Rubrica Categorie Portofoliu adaugata cu succes!');
    <?php } ?>
</script>
<?php require_once ('../footer.php');?>
