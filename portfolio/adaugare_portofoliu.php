<?php
require_once ('../helper.php');

require_once ('../validare_formular.php');

verificaDacaEsteLogat();

arataErori();
$db = conectareLaBazaDeDate();

$salveaza = false;

$campuriValidare = array(

    "nume"      => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "select"    => array("regula"=>"required", "valoare"=>"", "mesaj"=>"")

);

$error = "";

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']) {

        $nume = mysqli_real_escape_string($db, $_POST['nume']);
        $idCategoriePortofoliu = mysqli_real_escape_string($db, $_POST['select']);
        $data = date("Y-m-d H:i:s");
        $numeImagine = "";

        if (!empty($_FILES['imagine']['name'])) {
            $tmp_name = $_FILES ["imagine"]["tmp_name"];
            $filename = $_FILES['imagine']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $extensions = array('jpg', 'png', 'gif', 'jpeg', 'JPG');
            $destinatie = "../assets/img/portfolio/$filename";
            if (in_array($ext, $extensions)) {
                move_uploaded_file($tmp_name, $destinatie);
                $numeImagine = $filename;
            } else {
                $error = "Extensie nepermisa";
            }

        }

//    print_r ($_FILES);
//    die();

        if (empty($error)) {
            $sql_statement = "INSERT INTO portofoliu (Nume, Imagine, IdCategoriePortofoliu,DataInregistrare) VALUES ('" . $nume . "','" . $numeImagine . "','".$idCategoriePortofoliu."','" . $data . "')";
            mysqli_query($db, $sql_statement);

            $salveaza = true;
        }
    }
}

$intrariCategoriePortofoliu = getTabel($db, 'categorie_portofoliu');


?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Portofoliu</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/portfolio/listare_portofoliu.php">Inapoi</a>
                </div>
<!--                <div class="col-md-12">-->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nume Portofoliu</label>
                                    <input type="text" name="nume" class="form-control" <?=arataValoare('nume',$campuriValidare)?>"/>
                                    <?=arataEroareFormular("nume",$campuriValidare)?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Categorie Portofoliu</label>
                                    <?php if (!empty($intrariCategoriePortofoliu)){ ?>
                                    <select name="select" id="">
                                        <option value="" <?=arataValoareSelect('select', "")?>>Select</option>
                                        <?php foreach ($intrariCategoriePortofoliu as $categorie){ ?>
                                        <option value="<?=$categorie['Id'];?>" <?=arataValoareSelect('select', $categorie['Id']);?>><?= $categorie['Categorie']; ?></option>
                                        <?php }?>
                                    </select>
                                <?php } echo arataEroareFormular('select', $campuriValidare); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Imagine</label>
                            <input type="file" name="imagine">
                            <?php if (!empty($error)) {echo "<p>".$error."</p>";}?>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" class="btn btn-success" value="Salveaza"/>
                    </form>
<!--                </div>-->
            </div>
<script>
    <?php if($salveaza){ ?>
    alert('Rubrica Portofoliu adaugata cu succes!');
    <?php } ?>
</script>
 <?php require_once ('../footer.php');
