<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$idPortofoliu    = $_GET['idPortofoliu'];

$isSaved    = false;

$db = conectareLaBazaDeDate();

$elementePortofoliu = getTableWhere($db, 'portofoliu', $idPortofoliu);

if (isset($_POST['flag'])){
    $name = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $denumire = $_POST['denumire'];
    $date       =   date("Y-m-d H:i:s");

    $sql_statement = "UPDATE portofoliu SET Nume = '{$denumire}', Imagine = '{$name}', DataInregistrare = '{$date}' WHERE Id=".$idPortofoliu;
    mysqli_query($db, $sql_statement);

    if (!empty($name)){
        $location = '../assets/img/portfolio/';

        if (move_uploaded_file($tmp_name, $location.$name)) {
            echo 'Uploaded!';
        } else {
            echo 'Error!';
        }

    } else {
        echo 'Please choose a file!';
    }

    $isSaved = true;
}

?>


<?php require_once ('../header.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Modificare Portofoliu</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-warning" href="http://www.menut.ro/portfolio/listare_portofoliu.php">Inapoi</a>
        </div>
        <?php if (!empty($elementePortofoliu)){ ?>

            <div class="col-md-4">
                <img src="http://www.menut.ro/assets/img/portfolio/<?=$elementePortofoliu['Imagine'];?>" class="img-fluid shadow rounded" alt="<?=$elementePortofoliu['Imagine'];?>">
            </div>

            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Modificare Nume</label><br>
                    <input type="text" name="denumire" value="<?=$elementePortofoliu['Nume'];?>"/><br><br>
                </div>
                    <input type="file" name="file"/>
                    <input type="hidden" name="flag" value="set"/><br><br>
                    <button class="btn btn-success" type="submit" name="submit">Upload</button>

            </form>

        <?php } else { ?>
            <div class="col-md-12">
                <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idPortofoliu?></span>
            </div>
        <?php } ?>
    </div>
    <script>
        <?php if($isSaved){ ?>
        alert('Modificare efectuata cu succes!');
        <?php } ?>
    </script>
<?php require_once ('../footer.php');

// afisare poza la fiecare nume si formular de upload fisier pentru inlocuire.