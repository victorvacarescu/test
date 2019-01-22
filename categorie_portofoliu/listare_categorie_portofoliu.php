<?php

require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$db = conectareLaBazaDeDate();
$intrariCategorie = getTabel($db, 'categorie_portofoliu');

?>

<?php require_once ('../header.php'); ?>
<div class="row">
    <div class="col-md-6">
        <h1>Listare Categorie Portofoliu</h1>
    </div>
    <div class="col-md-6 text-right">
        <a class="btn btn-success" href="http://www.menut.ro/categorie_portofoliu/adaugare_categorie_portofoliu.php">Adaugare Categorie Portofoliu</a>
    </div>
    <?php if (!empty($intrariCategorie)){ ?>
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <td><strong>Categorie</strong></td>
                <td><strong>Actiuni</strong></td>
            </tr>
            <?php foreach ($intrariCategorie as $intrari){ ?>
                <tr>
                    <td><?=$intrari['Categorie']?></td>
                    <td>
                        <a class="btn btn-primary" href="http://www.menut.ro/categorie_portofoliu/modificare_categorie_portofoliu.php?idCategorie=<?=$intrari['Id']?>">Modifica</a>
                        <button class="btn btn-danger" onclick="stergeCategorie(<?=$intrari['Id']?>)">Sterge</button>
                    </td>
                </tr>
            <?php }?>
        </table>
        <?php } else { ?>
            <p>Nu exista inregistrari</p>
        <?php }?>
    </div>
</div>
<script>
    function stergeCategorie(idCategorie){
        if (confirm("Sunteti sigur ca doriti stergerea inregistrarii?")){
            window.location = "http://www.menut.ro/categorie_portofoliu/stergere_categorie_portofoliu.php?idCategorie="+idCategorie;
        }
    }
</script>
<?php require_once ('../footer.php');?>
