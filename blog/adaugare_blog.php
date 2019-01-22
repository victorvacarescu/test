<?php

require_once ('../helper.php');

require_once ('../validare_formular.php');

verificaDacaEsteLogat();

arataErori();

$salveaza = false;

$campuriValidare = array(

    "img"   => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "month" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "year"  => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "title" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "text"  => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),

);

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']) {

        $img    = mysqli_real_escape_string ($db, $_POST['img'  ]);
        $month  = mysqli_real_escape_string ($db, $_POST['month']);
        $year   = mysqli_real_escape_string ($db, $_POST['year' ]);
        $title  = mysqli_real_escape_string ($db, $_POST['title']);
        $text   = mysqli_real_escape_string ($db, $_POST['text' ]);
        $date   = date("Y-m-d H:i:s");

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO blog (NumeImg, Luna, An, Titlu, Text, DataInregistrare) VALUES ('" . $img . "','" . $month . "','" . $year . "','" . $title . "','" . $text . "','" . $date . "')";
        mysqli_query($db, $sql_statement);

        $salveaza = true;

    }
}

?>

<?php require_once ('../header.php');?>
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
                            <input type="text" class="form-control" name="img" value="<?=arataValoare('img',$campuriValidare)?>"/>
                            <?=arataEroareFormular("img",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label for="">Luna</label>
                            <input type="text" class="form-control" name="month" value="<?=arataValoare('month',$campuriValidare)?>"/>
                            <?=arataEroareFormular("month",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label for="">An</label>
                            <input type="text" class="form-control" name="year" value="<?=arataValoare('year',$campuriValidare)?>"/>
                            <?=arataEroareFormular("year",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label for="">Titlu</label>
                            <input type="text" class="form-control" name="title" value="<?=arataValoare('title',$campuriValidare)?>"/>
                            <?=arataEroareFormular("title",$campuriValidare)?>
                        </div>
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" name="text" rows="4"><?=arataValoare('text',$campuriValidare)?>
                            </textarea>
                            <?=arataEroareFormular("text",$campuriValidare)?>
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
