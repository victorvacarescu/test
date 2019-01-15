<?php

require_once ('../helper.php');
verificaDacaEsteLogat();
arataErori();
echo $_SESSION['idUser'];
$db = conectareLaBazaDeDate();
$intrariBlog = getTabel($db, 'blog');

?>

<?php require_once ('../header.php'); ?>
            <div class="row">
                <div class="col-md-6">
                    <h1>Listare Blog</h1>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-success" href="http://menut.ro/blog/adaugare_blog.php">Adaugare Blog</a>
                </div>
                <?php if (!empty($intrariBlog)){ ?>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <td><strong>Imagine</strong></td>
                            <td><strong>Luna</strong></td>
                            <td><strong>An</strong></td>
                            <td><strong>Titlu</strong></td>
                            <td><strong>Text</strong></td>
                            <td><strong>Actiuni</strong></td>
                        </tr>
                        <?php foreach ($intrariBlog as $intrari){ ?>
                        <tr>
                            <td><?=$intrari['NumeImg']?></td>
                            <td><?=$intrari['Luna']?></td>
                            <td><?=$intrari['An']?></td>
                            <td><?=$intrari['Titlu']?></td>
                            <td><?=$intrari['Text']?></td>
                            <td>
                                <a class="btn btn-primary" href="http://www.menut.ro/blog/modificare_blog.php?idBlog=<?=$intrari['Id']?>">Modifica</a>
                                <button class="btn btn-danger" onclick="stergeBlog(<?=$intrari['Id']?>)">Sterge</button>
                            </td>
                        </tr>
                        <?php }?>
                    </table>
                <?php } else { ?>
                    <p>Nu exista inregistrari</p>
                    <?php }?>
                </div>
            </div>
                <script>
                    function stergeBlog(idBlog){
                        if (confirm("Sunteti sigur ca doriti stergerea inregistrarii?")){
                            window.location = "http://www.menut.ro/blog/stergere_blog.php?idBlog="+idBlog;
                        }
                    }
                </script>
      <?php require_once ('../footer.php');?>
