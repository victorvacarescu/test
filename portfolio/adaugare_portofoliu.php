<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();
$salveaza = false;

$error = "";

if (isset($_POST['flag']))
{
    $nume           = $_POST['nume'];
    $data           = date("Y-m-d H:i:s");
    $server         = 'localhost';
    $numeImagine    = "";

    if (!empty($_FILES['imagine']['name'])){
        $tmp_name = $_FILES ["imagine"]["tmp_name"];
        $filename = $_FILES['imagine']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $extensions = array('jpg','png','gif','jpeg','JPG');
        $destinatie = "../assets/img/portfolio/.$filename";
        if (in_array($ext, $extensions)) {
            move_uploaded_file($tmp_name, $destinatie);
            $numeImagine = $filename;
        } else {
            $error = "Extensie nepermisa";
        }

    }

//    print_r ($_FILES);
//    die();

    if (empty($error)){

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO portofoliu (Nume, Imagine, DataInregistrare) VALUES ('".$nume."','".$numeImagine."','".$data."')";
        mysqli_query($db, $sql_statement);

        $salveaza = true;
        }
}

?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Portofoliu</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/portfolio/listare_portofoliu.php">Inapoi</a>
                </div>
                <div class="col-md-12">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Nume Portofoliu</label>
                            <input type="text" name="nume" class="form-control" <!--value="--><?/*=$numeImagine */?>"/>
                        </div>
                        <div class="form-group">
                            <label>Imagine</label>
                            <input type="file" name="imagine">
                            <?php if (!empty($error)) {echo "<p>".$error."</p>";}?>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" class="btn btn-success" value="Salveaza"/>
                    </form>
                </div>
            </div>
<script>
    <?php if($salveaza){ ?>
    alert('Rubrica Portofoliu adaugata cu succes!');
    <?php } ?>
</script>
 <?php require_once ('../footer.php');
