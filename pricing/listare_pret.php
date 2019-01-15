<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$db = conectareLaBazaDeDate();

$intrari_preturi = getTabel($db, 'preturi');

?>

<?php require_once ('../header.php'); ?>
        <div class="row">
            <div class="col-md-6">
                <h1>Listare Pret</h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-success" href="http://www.menut.ro/pricing/adaugare_pret.php">Adaugare Preturi</a>
            </div>
            <div class="col-md-12">
                <?php if (!empty($intrari_preturi)){ ?>
                    <table class="table table-striped">
                        <tr>
                            <td><strong>Titlu</strong></td>
                            <td><strong>Pret</strong></td>
                            <td><strong>Text</strong></td>
                            <td><strong>Actiuni</strong></td>
                        </tr>
                        <?php foreach ($intrari_preturi as $intrari){ ?>
                        <tr>
                            <td><?php echo $intrari['Titlu']?></td>
                            <td><?php echo $intrari['Pret']?></td>
                            <td><?php echo $intrari['Text']?></td>
                            <td>
                                <a class="btn btn-primary" href="http://www.menut.ro/pricing/modificare_pret.php?idPret=<?=$intrari['Id']?>">Modifica</a>
                                <button class="btn btn-danger" onclick="stergePreturi(<?=$intrari['Id']?>)">Sterge</button>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                <?php } else{ ?>
                    <p>Nu exista inregistrari</p>
                <?php }?>
            </div>
        </div>
<script>
    function stergePreturi(idPreturi){
        if (confirm('Sunteti sigur ca doriti stergerea inregistrarii?')){
            window.location = "http://www.menut.ro/pricing/stergere_pret.php?idPreturi="+idPreturi;
        }
    }
</script>
<?php require_once ('../footer.php'); ?>
