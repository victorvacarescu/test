<?php

require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$idServicii = $_GET['idServicii'];
$salveaza = false;

$db = conectareLaBazaDeDate();

if(isset($_POST['flag']))
{
    $sigla = $_POST['sigla'];
    $titlu = $_POST['titlu'];
    $text  = $_POST['text'];

    $sql_statement = "UPDATE servicii SET Sigla = '{$sigla}', Titlu = '{$titlu}', Text = '{$text}' WHERE Id = {$idServicii}";
    mysqli_query($db, $sql_statement);
    $salveaza = true;
}

$elementeServicii = getTableWhere($db, 'servicii', $idServicii);

?>

<?php require_once ('../header.php'); ?>
        <div class="row">
            <div class="col-md-6">
                <h1>Modificare Servicii</h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-warning" href="http://www.menut.ro/services/listare_servicii.php">Inapoi</a>
            </div>
            <?php if (!empty($elementeServicii)){ ?>
            <div class="col-md-12">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Sigla</label>
                        <input class="form-control" type="text" name="sigla" value="<?php echo $elementeServicii['Sigla'];?>"/>
                    </div>
                    <div class="form-group">
                        <label>Titlu</label>
                        <input class="form-control" type="text" name="titlu" value="<?php echo $elementeServicii['Titlu'];?>"/>
                    </div>
                    <div class="form-group">
                        <label>Text</label>
                        <input class="form-control" type="text" name="text" value="<?php echo $elementeServicii['Text'];?>"/>
                    </div>
                    <input type="hidden" value="set" name="flag"/>
                    <input type="submit" class="btn btn-success" value="Salveaza"/>
                </form>
            </div>
            <?php } else { ?>
            <div class="col-md-12">
                <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idServicii?></span>
            </div>
            <?php } ?>
        </div>
<script>
    <?php if($salveaza){ ?>
    alert('Modificare efectuata cu succes!');
    <?php } ?>
</script>
<?php require_once ('../footer.php'); ?>
