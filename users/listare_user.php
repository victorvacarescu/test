<?php

require_once ('../helper.php');


arataErori();

$db = conectareLaBazaDeDate();

$arrayUtilizatori = getTabel($db, 'utilizatori');

?>
<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Listare utilizatori</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="http://www.menut.ro/users/adaugare_user.php">Adauga Utilizator</a>
                </div>
                <div class="col-md-12">

                    <?php if(!empty($arrayUtilizatori)){ ?>
                            <table class="table table-striped">
                                <tr>
                                    <td>Nume</td>
                                    <td>Prenume</td>
                                    <td>Email</td>
                                    <td>Parola</td>
                                    <td>Actiuni</td>
                                </tr>
                                <?php foreach($arrayUtilizatori as $utilizator) { ?>
                                        <tr>
                                            <td>
                                                <?php echo $utilizator['Nume'] ?>
                                            </td>
                                            <td>
                                                <?php echo $utilizator['Prenume'] ?>
                                            </td>
                                            <td>
                                                <?php echo $utilizator['Email'] ?>
                                            </td>
                                            <td>
                                                <?php echo $utilizator['Parola'] ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="http://www.menut.ro/users/editare_user.php?idUtilizator=<?php echo $utilizator['Id']?>">Modifica</a>
                                                <button class="btn btn-danger" onclick="stergeUtilizator('<?php echo $utilizator["Id"] ?>')">Sterge</button>
                                            </td>
                                        </tr>
                                <?php } ?>
                            </table>
                    <?php } else { ?>
                            <p>Nu exista utilizatori in baza de date.</p>
                    <?php } ?>
                </div>
            </div>
            <script>
                function stergeUtilizator(idUtilizator){
                    if(confirm('Sunteti sigur ca doriti stergerea inregistrarii?')){
                        window.location = "http://www.menut.ro/users/sterge_user.php?idUtilizator=" + idUtilizator;
                    }
                }
            </script>
 <?php require_once ('../footer.php');?>