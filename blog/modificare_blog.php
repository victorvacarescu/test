<?php

require_once ('../helper.php');

verificaDacaEsteLogat();

arataErori();

$idBlog =   $_GET['idBlog'];

$save   =   false;

$db = conectareLaBazaDeDate();

if (isset($_POST['flag'])){
    $img    =   $_POST['img'    ];
    $month  =   $_POST['month'  ];
    $year   =   $_POST['year'   ];
    $title  =   $_POST['title'  ];
    $text   =   $_POST['text'   ];

    $sql_statement = "UPDATE blog SET NumeImg = '{$img}', Luna = '{$month}', An = '{$year}', Titlu = '{$title}', Text = '{$text}' WHERE Id = ".$idBlog;
    mysqli_query($db, $sql_statement);

    $save = true;
}

$elementeBlog = getTableWhere($db,'blog',$idBlog);

?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Modificare Blog</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-warning" href="http://www.menut.ro/blog/listare_blog.php">Inapoi</a>
                </div>
                <?php if(!empty($elementeBlog)){ ?>
                <div class="col-md-12">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Nume Imagine</label>
                            <input type="text" class="form-control" name="img" value="<?=$elementeBlog['NumeImg'];?>"/>
                        </div>
                        <div class="form-group">
                            <label for="">Luna</label>
                            <input type="text" class="form-control" name="month" value="<?=$elementeBlog['Luna'];?>"/>
                        </div>
                        <div class="form-group">
                            <label for="">An</label>
                            <input type="text" class="form-control" name="year" value="<?=$elementeBlog['An'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Titlu</label>
                            <input type="text" class="form-control" name="title" value="<?=$elementeBlog['Titlu'];?>">
                        </div>
                        <div class="form-group">
                            <label for="">Text</label>
                            <textarea class="form-control" rows="4" name="text" placeholder="<?=$elementeBlog['Text'];?>"></textarea>
                        </div>
                        <input type="hidden" name="flag" value="set"/>
                        <input type="submit" value="Salveaza" class="btn btn-success"/>
                    </form>
                </div>
                    <?php  } else { ?>
                    <div class="col-md-12">
                        <span class="badge badge-warning">Nu exista informatii pentru id-ul <?=$idBlog?></span>
                    </div>
                <?php } ?>
            </div>
            <script>
                <?php if ($save){ ?>
                alert ("Modificare efectuata cu succes!");
                <?php } ?>
            </script>
<?php require_once ('../footer.php'); ?>
