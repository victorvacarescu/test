<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();
$db = conectareLaBazaDeDate();
$intrariContact = getTabel($db,'contact');

?>

<?php require_once('../header.php');?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Listare Contact</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="http://www.menut.ro/index.php">Adaugare Contact</a>
                </div>
                <?php if (!empty($intrariContact)){ ?>
                <div class="col-md 12">
                    <table class="table table-striped">
                        <tr>
                            <td><strong>Nume</strong></td>
                            <td><strong>E-mail</strong></td>
                            <td><strong>Subiect</strong></td>
                            <td><strong>Mesaj</strong></td>
                            <td><strong>Actiuni</strong></td>
                        </tr>
                        <?php foreach ($intrariContact as $intrari){ ?>
                        <tr>
                            <td><?= $intrari['Nume'   ] ?></td>
                            <td><?= $intrari['Email'  ] ?></td>
                            <td><?= $intrari['Subiect'] ?></td>
                            <td><?= $intrari['Mesaj'  ] ?></td>
                            <td>
                                <a class="btn btn-primary" href="http://www.menut.ro/contact/modificare_contact.php?idContact=<?=$intrari['Id']?>">Modifica</a>
                                <button class="btn btn-danger" onclick="stergeContact(<?=$intrari['Id']?>)">Sterge</button>
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
                function stergeContact(idContact) {
                    if (confirm("Sunteti sigur ca doriti stergerea inregistrarii?")){
                        window.location = "http://www.menut.ro/contact/stergere_contact.php?idContact="+idContact;
                    }
                }
            </script>

<?php require_once ('../footer.php'); ?>
