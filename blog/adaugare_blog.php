<?php
require_once ('../helper.php');
verificaDacaEsteLogat();
$salveaza = false;

arataErori();

if (isset($_POST['flag'])){

    $img        =   $_POST['img'  ];
    $month      =   $_POST['month'];
    $year       =   $_POST['year' ];
    $title      =   $_POST['title'];
    $text       =   $_POST['text' ];
    $date       =   date("Y-m-d H:i:s");

    $db = conectareLaBazaDeDate();

    $sql_statement = "INSERT INTO blog (NumeImg, Luna, An, Titlu, Text, DataInregistrare) VALUES ('".$img."','".$month."','".$year."','".$title."','".$text."','".$date."')";

    mysqli_query($db, $sql_statement);

    $salveaza = true;
}

?>

<?php require ('../header.php');?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Adaugare Blog</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/blog/listare_blog.php">Inapoi</a>
                </div>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Nume Imagine</label>
                            <input type="text" class="form-control" name="img"/>
                        </div>
                        <div class="form-group">
                            <label for="">Luna</label>
                            <input type="text" class="form-control" name="month"/>
                        </div>
                        <div class="form-group">
                            <label for="">An</label>
                            <input type="text" class="form-control" name="year"/>
                        </div>
                        <div class="form-group">
                            <label for="">Titlu</label>
                            <input type="text" class="form-control" name="title"/>
                        </div>
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" name="text" rows="4"></textarea>
                        </div>
                        <input type="hidden" value="set" name="flag"/>
                        <input type="submit" value="Salveaza" class="btn btn-success"/>
                    </form>
                </div>
            </div>
            <script>
                <?php if ($salveaza){ ?>
                alert ('Rubrica Blog adaugata cu succes!');
                <?php } ?>
            </script>
 <?php require_once ('../footer.php');?>
