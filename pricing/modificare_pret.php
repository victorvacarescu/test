<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$idPret     =   $_GET['idPret'];
$save       =   false;

$db = conectareLaBazaDeDate();

if(isset($_POST['flag']))
{
    $titlu = $_POST['titlu'];
    $pret  = $_POST['pret'];
    $text  = $_POST['text'];

    $sql_statement = "UPDATE preturi SET Titlu = '{$titlu}',Pret = '{$pret}',Text = '{$text}' WHERE Id=".$idPret;
    mysqli_query($db, $sql_statement);

    $save = true;
}

$elementePret = getTableWhere($db, 'preturi', $idPret);

?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Modificare Pret</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/pricing/listare_pret.php">Inapoi</a>
                </div>
                <?php if (!empty($elementePret)){ ?>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Titlu</label>
                            <input class="form-control" type="text" name="titlu" value="<?=$elementePret['Titlu'];?>">
                        </div>
                        <div class="form-group">
                            <label>Pret</label>
                            <input class="form-control" type="text" name="pret" value="<?=$elementePret['Pret'];?>">
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea class="form-control" type="text" name="text" rows="5" placeholder="<?=$elementePret['Text'];?>"></textarea>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" value="Save" class="btn btn-success"/>
                    </form>
                </div>
                <?php } else { ?>
                <div class="col-md-12">
                    <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idPret?></span>
                </div>
                <?php } ?>
            </div>
<script>
    <?php if($save){ ?>
    alert('Modificare efectuata cu succes!');
    <?php }?>
</script>
<?php require_once ('../footer.php');


