<?php
require_once ('../helper.php');

verificaDacaEsteLogat();
arataErori();

$idCategorie    = $_GET['idCategorie'];

$isSaved    = false;

$db = conectareLaBazaDeDate();

if(isset($_POST['flag']))
{
    $categorie = $_POST['categorie'];
    $sql_statement = "UPDATE categorie_portofoliu SET Categorie = '{$categorie}' WHERE Id=".$idCategorie;
    mysqli_query($db, $sql_statement);
    $isSaved = true;
}

$elementeCategorie = getTableWhere($db, 'categorie_portofoliu', $idCategorie);

?>


<?php require_once ('../header.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Modificare Categorie Portofoliu</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-warning" href="http://www.menut.ro/categorie_portofoliu/listare_categorie_portofoliu.php">Inapoi</a>
        </div>
        <?php if (!empty($elementeCategorie)){ ?>
            <div class="col-md-12">
                <form method="POST" action="">
                    <div class="form-group">
                        <label>Categorie</label>
                        <input type="text" name="categorie" class="form-control" value="<?php echo $elementeCategorie['Categorie'];?>"/>
                    </div>
                    <input type="hidden" name="flag" value="set"/>
                    <input type="submit" class="btn btn-success" value="Save"/>
                </form>
            </div>
        <?php } else { ?>
            <div class="col-md-12">
                <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idCategorie?></span>
            </div>
        <?php } ?>
    </div>
    <script>
        <?php if($isSaved){ ?>
        alert('Modificare efectuata cu succes!');
        <?php } ?>
    </script>
<?php require_once ('../footer.php');
