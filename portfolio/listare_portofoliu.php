<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();

$db = conectareLaBazaDeDate();

$elementePortofoliu = getTabel($db, 'portofoliu');

?>

<?php require_once ('../header.php'); ?>
    <div class="row">
        <div class="col-md-6">
            <h1>Listare Portofoliu</h1>
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-success" href="http://www.menut.ro/portfolio/adaugare_portofoliu.php">Adauga portofoliu</a>
        </div>
        <div class="col-md-12">
            <?php if (!empty($elementePortofoliu)){ ?>
                <table class="table table-striped">
                    <tr>
                        <td><strong>Nume</strong></td>
                        <td><strong>Actiuni</strong></td>
                    </tr>
                    <?php foreach ($elementePortofoliu as $element){ ?>
                        <tr>
                            <td><?php echo $element['Nume']?></td>
                            <td>
                                <a class="btn btn-primary" href="http://www.menut.ro/portfolio/modificare_portofoliu.php?idPortofoliu=<?php echo $element['Id']?>">Modifica</a>
                                <button class="btn btn-danger" onclick="stergePortofoliu('<?php echo $element['Id']?>')">Sterge</button>
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
        function stergePortofoliu(idPortofoliu){
            if (confirm('Sunteti sigur ca doriti stergerea inregistrarii?')){
                window.location = "http://www.menut.ro/portfolio/stergere_portofoliu.php?idPortofoliu="+idPortofoliu;
            }
        }
    </script>
<?php require_once ('../footer.php');

