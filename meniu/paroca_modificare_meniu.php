<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();
$idMeniu    = $_GET['idMeniu'];

$isSaved    = false;

$db = conectareLaBazaDeDate();

if(isset($_POST['flag']))
{
    $nume = $_POST['nume'];
    $sql_statement = "UPDATE meniu SET Nume = '{$nume}' WHERE Id=".$idMeniu;
    mysqli_query($db, $sql_statement);
    $isSaved = true;
}

$elementeMeniu = getTableWhere($db, 'meniu', $idMeniu);

?>


<?php require_once ('../header.php'); ?>
        <div class="row">
            <div class="col-md-6">
                <h1>Modificare Meniu</h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-warning" href="http://www.menut.ro/meniu/paroca_listare_meniu.php">Inapoi</a>
            </div>
            <?php if (!empty($elementeMeniu)){ ?>
            <div class="col-md-12">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Meniu</label>
                        <input type="text" name="nume" class="form-control" value="<?php echo $elementeMeniu['Nume'];?>"/>
                    </div>
                    <input type="hidden" name="flag" value="set"/>
                    <input type="submit" class="btn btn-success" value="Save"/>
                </form>
            </div>
            <?php } else { ?>
            <div class="col-md-12">
                <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idMeniu?></span>
            </div>
            <?php } ?>
        </div>
<script>
    <?php if($isSaved){ ?>
    alert('Modificare efectuata cu succes!');
    <?php } ?>
</script>
<?php require_once ('../footer.php');
