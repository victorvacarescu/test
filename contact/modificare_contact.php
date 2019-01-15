<?php

require_once ('../helper.php');

verificaDacaEsteLogat();

arataErori();

$idContact    = $_GET['idContact'];

$save    = false;

$db = conectareLaBazaDeDate();

if(isset($_POST['flag'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $text = $_POST['message'];

    $sql_statement = "UPDATE contact SET Nume = '{$name}', Email = '{$email}', Subiect = '{$subject}', Text = '{$text}' WHERE Id =".$idContact;
    mysqli_query($db, $sql_statement);

    $save = true;

}

$elementeContact = getTableWhere($db, 'contact', $idContact);

?>

<?php require_once ('../header.php');?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Modificare Contact</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/contact/listare_contact.php">Inapoi</a>
                </div>
                <?php if (!empty($elementeContact)){ ?>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Nume</label>
                            <input class="form-control" type="text" name="name" value="<?= $elementeContact['Nume'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input class="form-control" type="text" name="email" value="<?= $elementeContact['Email'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="">Subiect</label>
                            <input class="form-control" type="text" name="subject" value="<?= $elementeContact['Subiect'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" type="text" name="message" rows="5" placeholder="<?= $elementeContact['Mesaj'] ?>"></textarea>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" value="Salveaza" class="btn btn-success">
                    </form>
                </div>
                <?php } else { ?>
                <div class="col-md-12">
                    <span class="badge badge-warning">Nu exista informatii pentru id-ul <?= $idContact ?></span>
                </div>
                <?php } ?>
            </div>
            <script>
                <?php if ($save){ ?>
                alert ("Modificare efetuata cu succes!");
                <?php } ?>
            </script>
   <?php require_once ('../footer.php');?>

