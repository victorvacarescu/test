<?php

require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$db = conectareLaBazaDeDate();

$intrariServicii = getTabel($db, 'servicii');

?>

<?php require_once ('../header.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Listare Servicii</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="http://www.menut.ro/services/adaugare_servicii.php">Adaugare Servicii</a>
        </div>
        <div class="col-md-12">
            <?php if (!empty($intrariServicii)){ ?>
            <table class="table table-striped">
                <tr>
                    <td><strong>Sigla</strong></td>
                    <td><strong>Titlu</strong></td>
                    <td><strong>Text</strong></td>
                    <td><strong>Actiuni</strong></td>
                </tr>
                <?php foreach ($intrariServicii as $intrari){ ?>
                <tr>
                    <td><?php echo $intrari['Sigla']?></td>
                    <td><?php echo $intrari['Titlu']?></td>
                    <td><?php echo $intrari['Text']?></td>
                    <td>
                        <a class="btn btn-primary" href="http://www.menut.ro/services/modificare_servicii.php?idServiciu=<?php echo $intrari['Id']?>">Modifica</a>
                        <button class="btn btn-danger" onclick="stergeServicii(<?php echo $intrari['Id']?>)">Sterge</button>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <?php } else{ ?>
                <p>Nu exista inregistrari</p>
            <?php } ?>
        </div>
    </div>
<script>
    function stergeServicii(idServicii){
        if (confirm('Sunteti sigur ca doriti stergerea inregistrarii?')){
            window.location = "http://www.menut.ro/services/stergere_servicii.php?idServicii="+idServicii;
        }
    }
</script>
<?php require_once ('../footer.php');
