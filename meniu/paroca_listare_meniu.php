<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$db = conectareLaBazaDeDate();

$elementeMeniu = getTabel($db, 'meniu');

?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Listare Meniu</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="http://www.menut.ro/meniu/paroca_adaugare_meniu.php">Adauga Meniu</a>
                </div>
                <div class="col-md-12">
                    <?php if (!empty($elementeMeniu)){ ?>
                        <table class="table table-striped">
                            <tr>
                                <td><strong>Nume</strong></td>
                                <td><strong>Actiuni</strong></td>
                            </tr>
                            <?php foreach ($elementeMeniu as $element){ ?>
                            <tr>
                                <td><?php echo $element['Nume']?></td>
                                <td>
                                    <a class="btn btn-primary" href="http://www.menut.ro/meniu/paroca_modificare_meniu.php?idMeniu=<?php echo $element['Id']?>">Modifica</a> <!-- php?idMeniu -->
                                    <button class="btn btn-danger" onclick="stergeMeniu('<?php echo $element['Id']?>')">Sterge</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    <?php } else { ?>
                        <p>Nu exista inregistrari</p>
                    <?php }?>
                </div>
            </div>
<script>
    function stergeMeniu(idMeniu){
        if (confirm('Sunteti sigur ca doriti stergerea inregistrarii?')){
            window.location = "http://www.menut.ro/meniu/paroca_stergere_meniu.php?idMeniu="+idMeniu;
        }
    }
</script>
 <?php require_once ('../footer.php');