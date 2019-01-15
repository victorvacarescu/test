<?php

require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$idCaracteristici   =   $_GET['idCaracteristici'];

$save               =   false;

$db = conectareLaBazaDeDate();

if (isset($_POST['flag'])){

    $sigla = $_POST['sigla'];
    $titlu = $_POST['titlu'];
    $text  = $_POST['text' ];

    $sql_statement = "UPDATE caracteristici SET Sigla = '{$sigla}', Titlu = '{$titlu}', Text = '{$text}' WHERE Id =".$idCaracteristici;
    mysqli_query($db, $sql_statement);

    $save = true;
}

$elementeCaracteristici = getTableWhere($db, 'caracteristici', $idCaracteristici);

?>

<?php require_once('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Modificare Caracteristici</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/features/listare_caracteristici.php">Inapoi</a>
                </div>
                <?php if (!empty($elementeCaracteristici)){ ?>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Sigla</label>
                            <input class="form-control" type="text" name="sigla" value="<?=$elementeCaracteristici['Sigla'];?>">
                        </div>
                        <div class="form-group">
                            <label>Titlu</label>
                            <input class="form-control" type="text" name="titlu" value="<?=$elementeCaracteristici['Titlu'];?>">
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea class="form-control" type="text" name="text" rows="5" placeholder="<?=$elementeCaracteristici['Text'];?>"></textarea>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" value="Save" class="btn btn-success">
                    </form>
                </div>
                <?php } else { ?>
                <div class="col-md-12">
                    <span class="badge badge-warning">Nu exista informatii despre id-ul <?= $idCaracteristici?></span>
                </div>
                <?php } ?>
            </div>
<script>
    <?php if($save){?>
    alert('Modificare efectuata cu succes!');
    <?php } ?>
</script>
 <?php require_once ('../footer.php'); ?>
