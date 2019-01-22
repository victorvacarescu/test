<html>
<head>
    <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.css">
    <script src="../assets/libs/jquery3.js"></script>
    <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        .eroare{
            font-size:12px;
            color:red;
        }
    </style>
</head>
<body>
<div class="container">

   <?php if (isset($_SESSION['idUser'])){ ?>
    <nav class = "navbar navbar-expand-md navbar-light bg-light mb-3 border">
        <span class="navbar-brand h1 mb-0">Link-uri Continut</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#continut" aria-controls="continut" aria-expanded="false" aria-label="toggle">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="continut">
            <div class="navbar-nav">
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/meniu/paroca_listare_meniu.php"                        >Listare Meniu</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/services/listare_servicii.php"                         >Listare Servicii</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/pricing/listare_pret.php"                              >Listare Preturi</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/blog/listare_blog.php"                                 >Listare Blog</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/contact/listare_contact.php"                           >Listare Contact</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/portfolio/listare_portofoliu.php"                      >Listare Portofoliu</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/categorie_portofoliu/listare_categorie_portofoliu.php" >Listare Categorie Portofoliu</a>
                <a class="nav-item nav-link active text-primary" href="http://www.menut.ro/features/listare_caracteristici.php"                   >Listare Caracteristici</a>
                <a class="nav-item nav-link active text-danger"  href="http://www.menut.ro/logout.php"                                            >Logout</a>
            </div>
        </div>
    </nav>
<?php } ?>