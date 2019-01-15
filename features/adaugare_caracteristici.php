<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
$salveaza = false;

arataErori();

if (isset($_POST['flag']))
{
    $sigla      =   $_POST['sigla'];
    $titlu      =   $_POST['titlu'];
    $text       =   $_POST['text'];
    $data       =   date("Y-m-d H:i:s");

    $db = conectareLaBazaDeDate();

    $sql_statement = "INSERT INTO caracteristici (Sigla, Titlu, Text, DataInregistrare) VALUES ('".$sigla."','".$titlu."','".$text."','".$data."')";
    mysqli_query($db, $sql_statement);

    $salveaza = true;
}

?>

<?php require_once ('../header.php');?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Caracteristici</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/features/listare_caracteristici.php">Inapoi</a>
                </div>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Sigla</label>
                            <input type="text" class="form-control" name="sigla"/>
                        </div>
                        <div class="form-group">
                            <label>Titlu</label>
                            <input type="text" class="form-control" name="titlu"/>
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea name="text" rows="4" class="form-control"></textarea>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" value="Salveaza" class="btn btn-success"/>
                    </form>
                </div>
            </div>
            <script>
                <?php if($salveaza){?>
                alert('Rubrica Caracteristici adaugata cu succes!');
                <?php } ?>
            </script>
       <?php require_once ('../footer.php');?>
