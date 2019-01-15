<?php
require_once ('../helper.php');

arataErori();

$idUtilizator =  $_GET['idUtilizator'];
$save = false;

$db = conectareLaBazaDeDate();

if(isset($_POST['flag'])){
    $nume       = $_POST['nume'     ];
    $prenume    = $_POST['prenume'  ];
    $email      = $_POST['email'    ];
    $parola     = $_POST['parola'   ];

    $sql_statement = "UPDATE utilizatori SET Nume = '{$nume}', Prenume='{$prenume}',Email='{$email}',Parola='{$parola}' WHERE Id=" .$idUtilizator;
    mysqli_query($db, $sql_statement);

    $save = true;
}

$utilizator = getTableWhere($db, 'utilizatori', $idUtilizator);

?>

<?require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Modificare utilizator</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/users/listare_user.php">Inapoi</a>
                </div>
                <?php if (!empty($utilizator)){ ?>
                <div class="col-md-12">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Nume</label>
                            <input type="text" name="nume" class="form-control" value="<?=$utilizator['Nume']; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>Prenume</label>
                            <input type="text" name="prenume" class="form-control" value="<?=$utilizator['Prenume']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?=$utilizator['Email']; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <input type="text" name="parola" class="form-control" value="<?=$utilizator['Parola']; ?>" />
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" class="btn btn-success" value="Save" />
                    </form>
                </div>
                <?php } else { ?>
                    <div class="col-md-12">
                        <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idUtilizator?></span>
                    </div>
                <?php } ?>
            </div>
            <script>
                <?php if($save){ ?>
                alert('Modificare efectuata cu succes!');
                <?php } ?>
            </script>
<?php require_once ('../footer.php');?>