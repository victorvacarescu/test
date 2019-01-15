<?php

require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$db = conectareLaBazaDeDate();

$intrariCaracteristici = getTabel($db, 'caracteristici');

?>

<?php require_once ('../header.php');?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Listare Caracteristici</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="http://www.menut.ro/features/adaugare_caracteristici.php">Adaugare Caracteristici</a>
                </div>
                <?php if(!empty($intrariCaracteristici)){ ?>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <td><strong>Sigla</strong></td>
                            <td><strong>Titlu</strong></td>
                            <td><strong>Text</strong></td>
                            <td><strong>Actiuni</strong></td>
                        </tr>
                        <?php foreach ($intrariCaracteristici as $intrari){ ?>
                        <tr>
                            <td><?= $intrari['Sigla'] ?></td>
                            <td><?= $intrari['Titlu'] ?></td>
                            <td><?= $intrari['Text' ] ?></td>
                            <td>
                                <a class="btn btn-primary" href="http://www.menut.ro/features/modificare_caracteristici.php?idCaracteristici=<?=$intrari['Id']?>">Modfica</a>
                                <button class="btn btn-danger" onclick="stergeCaracteristici(<?=$intrari['Id']?>)">Sterge</button>
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
                    function stergeCaracteristici(idCaracteristici){
                        if (confirm('Sunteti sigur ca doriti stergerea inregistrarii?')){
                            window.location = "http://www.menut.ro/features/stergere_caracteristici.php?idCaracteristici="+idCaracteristici;
                        }
                    }
                </script>
<?php require_once ('../footer.php');?>


