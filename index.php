<?php
//session_start();
require_once ('helper.php');
require_once ('validare_formular.php');
//var_dump($_SESSION);

arataErori();

$db = conectareLaBazaDeDate();

//selectez valorile din meniu
$sql_statement = "SELECT * FROM meniu";
$result = mysqli_query($db, $sql_statement);
$arrayMenu = array();

while($row = mysqli_fetch_assoc($result))
{
    $arrayMenu[] = $row;
}

//selectez valorile din servicii
$sql_statement = "SELECT * FROM servicii"; //definesc query-ul cu care selectez
$result = mysqli_query($db, $sql_statement); //execut query-ul pe care l-am definit si obtin in $result rezultatul din baza de date
$arrayServicii = array(); //definesc array-ul care imi va tine valorile pe care le folosesc in listarea paginii!  ### de unde stie sa ia valorile din acest array si nu din altele?   ########

while($row = mysqli_fetch_assoc($result)) //folosesc o bucla while care sa imi transforme rezultatul din db in ceva cu care pot lucra mai usor->respectiv $arrayServicii
{
    $arrayServicii[] = $row;
}

$sql_statement = "SELECT * FROM preturi";
$result = mysqli_query($db, $sql_statement);
$arrayPret = array();

while($row = mysqli_fetch_assoc($result))
{
    $arrayPret[] = $row; // de ce nu se foloseste [] si in pagina de listare?
}

//features
$sql_statement          = "SELECT * FROM caracteristici";
$result                 = mysqli_query($db, $sql_statement);
$arrayCaracteristici    = array();

while   ($row = mysqli_fetch_assoc($result)){
    $arrayCaracteristici[] = $row;
}

//portfolio
$sql_statement          = "SELECT * FROM portofoliu";
$result                 = mysqli_query($db, $sql_statement);
$arrayPortfolio         = array();

while   ($row = mysqli_fetch_assoc($result)){
    $arrayPortfolio[] = $row;
}

//blog
$sql_statement = "SELECT * FROM blog";
$result         = mysqli_query($db, $sql_statement);
$arrayBlog = array();

while ($row = mysqli_fetch_assoc($result)){
    $arrayBlog[] = $row;
}

//contact


$salveaza = false;

$campuriValidare = array(

    "name" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "subject" => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "email"  => array("regula"=>"is_email", "valoare"=>"", "mesaj"=>""),
    "message"  => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "select"  => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),
    "radio"  => array("regula"=>"required", "valoare"=>"", "mesaj"=>""),

);

if (isset($_POST['flag'])){

    $raspunsValidare = valideaza_formular($campuriValidare);
    $campuriValidare = $raspunsValidare['inputs'];

    if ($raspunsValidare['formularReusit']){

        $name       = mysqli_real_escape_string($db, $_POST['name']);
        $subject    = mysqli_real_escape_string($db, $_POST['subject']);
        $email      = mysqli_real_escape_string($db, $_POST['email']);
        $message    = mysqli_real_escape_string($db, $_POST['message']);
        $select     = mysqli_real_escape_string($db, $_POST['select']);
        $radio      = mysqli_real_escape_string($db, $_POST['radio']);
        $data       = date("Y-m-d H:i:s");

        $db = conectareLaBazaDeDate();

        $sql_statement = "INSERT INTO contact (Nume, Email, Subiect, Mesaj, DataInregistrare, Selection, Radio) VALUES ('" . $name . "','" . $email . "','" . $subject . "','" . $message . "','" . $date . "','".$select."','".$radio."')";        mysqli_query($db, $sql_statement);

        $salveaza = true;

        $scroleaza_jos = false;
    } else {
        $scroleaza_jos = true;
    }

}

/*// CONTACT
$name_error = $email_error = $subject_error =  $message_error ="";
$name = $email = $subject = $message = $date ="";
$valid = true;

if (isset($_POST['flag'])) {
    //name
    if (empty($_POST["name"])) {
        $name_error = "*Name is required";
        $valid = false;
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_error = "*Only letters and white space allowed";
            $valid = false;
        }
    }
    //email
    if (empty($_POST["email"])) {
        $email_error = "*Email is required";
        $valid = false;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "*Invalid email format";
            $valid = false;
        }
    }
    //subject
    if (empty($_POST["subject"])) {
        $subject_error = "*Subject is required";
        $valid = false;
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $message_error = "*Message is required";
        $valid = false;
    } else {
        $message = test_input($_POST["message"]);
    }

    $date = date('Y-m-d H:i:s');
}

if ($valid){
    $sql_statement = "INSERT INTO contact (Nume, Email, Subiect, Mesaj, DataInregistrare) VALUES ('" . $name . "','" . $email . "','" . $subject . "','" . $message . "','" . $date . "')";
    mysqli_query($db, $sql_statement);
    $_SESSION['arataMesaj'] = "arat";
    //header('Location: http://menut.ro/index.php');
}*/

//$ip = showIpAdress();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Paroca - One Page Template</title>
    <link rel="icon" href="http://daitheme.com/template/paroca-demo/images/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/mycss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="assets/libs/jquery3.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- header -->
    <header>
      <!-- navbar -->
      <nav class="navbar navbar-default fixed-top navbar-expand-lg navbar-light p-2 mb-5 rounded" style="background-color: transparent;">
        <div class="container">
          <a class="navbar-brand" href="#" style="font-size: 30px;">Paroca<span>.</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <!--<span class="sr-only"></span>-->
              <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <?php if (!empty($arrayMenu)) { ?>
            <ul class="navbar-nav" style="font-size: 18px;">
               <?php foreach ($arrayMenu as $menu)
               { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?php echo $menu['Nume']?></a>
                </li>
            <?php } ?>
            </ul>
            <?php } ?>
          </div>
        </div>
      </nav>
    </header>
    <!-- end header -->
    <section>
        <div class="canvas vertical-center">
          <div class="jumbo-content">
            <div class="container text-center">
              <div class="row">
                <div class="col-md-12">
                  <div class="card-body" style="color: white;">
                    <h2 class="card-title mt-5">CREATIVE TEMPLATES</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis esse quam obcaecati explicabo. Quae, eum.</p>
                    <a href="#" class="btn btn-danger border-light p-2 pl-3 pr-3">Read More</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- services -->
    <div class="services container-fluid bg-light pt-1">
      <div class="container mt-5">
        <h3 class="mb-5 mt-5">Services</h3>
          <?php if (!empty($arrayServicii)) { ?>
            <div class="card-deck">
                <?php foreach ($arrayServicii as $servicii) { ?>
                    <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                      <div class="card-body">
                        <i class="<?php echo $servicii['Sigla']?>"></i>
                        <h5 class="card-title"><?php echo $servicii['Titlu']?></h5>
                        <p class="card-text"><?php echo $servicii['Text']?></p>
                      </div>
                    </div>
                 <?php } ?>
            </div>
          <?php } ?>
      </div>
    </div>
    <!-- end services -->
    <!-- portfolio -->
    <div class="portfolio container">
      <h3 class="mt-5 mb-5">Portfolio</h3>
      <div class="portfolio-menu">
        <button class="btn btn-danger">All</button>
        <button class="btn btn-outline-danger">Web Design</button>
        <button class="btn btn-outline-danger">Illustration</button>
        <button class="btn btn-outline-danger">Photography</button>
      </div>
      <div class="container-fluid mb-5 mt-5" style="padding-left: 0px;">
        <div class="row">
            <?php if (!empty($arrayPortfolio)){ foreach ($arrayPortfolio as $element){?>

          <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
            <img src="http://www.menut.ro/assets/img/portfolio/<?=$element['Imagine'];?>" class="img-fluid shadow rounded" alt="<?=$element['Imagine'];?>">
          </div>
            <?php } } ?>
        </div>
      </div>
    </div>
    <!-- end porfolio -->
    <!-- pricing -->
    <div class="pricing container-fluid bg-light pt-2">
      <div class="container mt-5">
        <h3 class="mb-5 mt-5">Pricing Table</h3>
          <?php if(!empty($arrayPret)){ ?>
            <div class="card-deck">
                  <?php foreach ($arrayPret as $pret){?>
                <div class="card text-center shadow p-3 mb-5 bg-white rounded">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $pret['Titlu'] ?></h4>
                    <hr style="height:1px; border-top:2px solid red; width: 15%;"/>
                    <div class="price">
                    <p style="font-size: 42px; color: red;"><span style="font-size: 20px; color: black; position: relative; margin-right: 5px; top: -11px;">$</span><?php echo $pret['Pret']?></p>
                    </div>
                    <div class="card-text text-center mb-3">
                    <?=nl2br($pret['Text'])?>
                    </div>
                    <a href="#" class="btn btn-danger border-light pl-3 pr-3">Order Now</a>
                </div>
            </div>
                  <?php } ?>
          <?php } ?>
      </div>
    </div>
    <!-- end pricing -->
    <!-- testimonials -->
    <section style="background-color: black">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div id="carouselExampleControls"  class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <div class='col-md-8 offset-md-2 text-center'>
                      <p style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente fuga, iure reprehenderit architecto officiis eveniet in maiores, saepe odit dolor rem itaque voluptatibus laboriosam laudantium voluptatum repellat asperiores accusantium cumque.</p>
                      <img class="rounded-circle" src="assets/img/testimonial1.png" alt="First slide">
                      <h4  style="color: white;">Moralles</h4>
                      <div class="stars">
                        <ul>
                          <li>
                            <i class="fa fa-star"></i>
                          </li>
                          <li>
                            <i class="fa fa-star"></i>
                          </li>
                          <li>
                            <i class="fa fa-star"></i>
                          </li>
                          <li>
                            <i class="fa fa-star"></i>
                          </li>
                          <li>
                            <i class="fa fa-star"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end testimonials -->
    <!-- features -->
    <div class="container-fluid bg-light pt-2">
      <div class="container mt-5">
        <h3 class="mb-5 mt-5">Features</h3>
        <?php if (!empty($arrayCaracteristici)){ ?>

                <?php   $deckInchis = false;
                        foreach ($arrayCaracteristici as $k=>$caracteristici){
                            $k++;
                            if($k == 1){
                                echo "<div class='card-deck'>";
                            }
                    ?>
                          <div class="card text-left p-3 mb-5 shadow bg-white rounded" >
                            <div class="card-body">
                              <i class="<?=$caracteristici['Sigla']?>"></i>
                              <h5 class="card-title"><?=$caracteristici['Titlu']?></h5>
                              <p class="card-text"><?=$caracteristici['Text']?></p>
                            </div>
                          </div>

                <?php  if($k%3 == 0 && $k>1){
                            echo "</div>";
                            $deckInchis = true;
                            if($k < count($caracteristici)){
                                echo "<div class='card-deck'>";
                                $deckInchis = false;
                            }
                       }

                  }
                  if(!$deckInchis) echo "</div>";
                  ?>
        <?php }?>
      </div>
    </div>
    <!-- end features -->
    <!-- blog -->
    <div class="container-fluid pt-2">
      <div class="container mt-5">
        <h3 class="mb-5 mt-5">Our Blog</h3>
        <?php if (!empty($arrayBlog)){ ?>
        <div class="card-deck">
          <? foreach ($arrayBlog as $blog){ ?>
          <div class="row card border-light text-left mb-5 bg-light rounded">
              <img class="card-img-top" src="assets/img/<?= $blog['NumeImg']?>" alt="work1">
              <div class="my-position-absolute bg-danger text-white text-center">
                <p><?= $blog['Luna']?></p>
                <p><?= $blog['An']?></p>
              </div>
            <div class="card-body">
              <h5 class="card-title"><?= $blog['Titlu']?></h5>
              <p class="card-text"><?= $blog['Text']?></p>
            </div>
          </div>
          <?php } ?>
        </div>
      <?php } ?>
      </div>
    </div>
    <!-- end blog -->
    <!-- contact -->
    <div class="contact container-fluid bg-light pt-2">
      <div class="container mt-5 pb-3">
        <h3 class="mb-5 mt-5">Get in Touch</h3>
        <div class="row">
          <div class="col-md-8 col-lg-12">
            <form action="" method="POST" id="form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="md-form">
                            <input type="text" id="name" name="name" class="form-control border-0" placeholder="Name" value="<?=arataValoare('name',$campuriValidare)?>"/>
<!--                            <span class="text-danger font-weight-light"></span>-->
                            <?=arataEroareFormular("name",$campuriValidare)?>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="md-form">
                            <input type="text" id="email" name="email" class="form-control border-0" placeholder="Email" value="<?=arataValoare('email',$campuriValidare)?>"/>
<!--                            <span class="text-danger font-weight-light">--><?///*= "<h6>{$email_error}</h6>"; */?><!--</span>-->
                            <?=arataEroareFormular("email",$campuriValidare)?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="md-form">
                            <input type="text" id="subject" name="subject" class="form-control border-0" placeholder="Subject" value="<?=arataValoare('subject',$campuriValidare)?>"/>
<!--                            <span class="text-danger font-weight-light">--><?///*= "<h6>{$subject_error}</h6>"; */?><!--</span>-->
                            <?=arataEroareFormular("subject",$campuriValidare)?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="4" class="form-control md-textarea border-0" placeholder="Message"><?=arataValoare('message',$campuriValidare)?></textarea>
<!--                            <span class="text-danger font-weight-light">--><?///*= "<h6>{$message_error}</h6>"; */?><!--</span>-->
                            <?=arataEroareFormular("message",$campuriValidare)?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong>SURVEY</strong>
                    </div>
                    <br />
                    <div class="col-md-6">
                        Age:
                        <select name="select">
                            <option value=""  <?=arataValoareSelect('select',"")?> >Select</option>
                            <option value="1" <?=arataValoareSelect('select',"1")?>>20-30 years</option>
                            <option value="2" <?=arataValoareSelect('select',"2")?> >31-40 years</option>
                            <option value="3" <?=arataValoareSelect('select',"3")?>>41-50 years</option>
                        </select>
                        <?=arataEroareFormular("select",$campuriValidare)?>
                    </div>
                    <div class=" col-md-6">
                        Graduate:
                        <input type="radio" name="radio" value="Y" <?= arataValoareRadio('radio','Y') ?> />Yes
                        <input type="radio" name="radio" value="N" <?= arataValoareRadio('radio','N') ?>/>No
                        <?=arataEroareFormular("radio",$campuriValidare)?>
                    </div>
                </div>
                <br />
                <div class="container text-center mb-5">
                    <input type="hidden" name="flag" value="set" />
                    <button type="submit" class="btn btn-danger border-light p-2 pl-3 pr-3">Send Message</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
        <!-- end contact -->
        <!-- footer -->
    <footer style="background-color: black; color: white">
      <div class="container-fluid text-center pt-5 pb-5">
        <div class="container">
          <div class="col-md-12">
            <h2 class="mb-4">Paroca<span>.</span></h2>
              <div class="social mb-4 text-center">
                  <a href="#" class="mr-2 ml-2"><i class="fab fa-lg fa-facebook "></i></a>
                  <a href="#" class="mr-2 ml-2"><i class="fab fa-lg fa-instagram"></i></a>
                  <a href="#" class="mr-2 ml-2"><i class="fab fa-lg fa-linkedin"></i></a>
                  <a href="#" class="mr-2 ml-2"><i class="fab fa-lg fa-google"></i></a>
              </div>
              <p>Copyright © All Right Reserved</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- end footer -->
  </body>
  <script>
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 50) {
          $('.navbar').addClass('bg-white text-white');
        } else {
          $('.navbar').addClass('transparent, shadow').removeClass('bg-white');
        }
    });

    <?php if (isset($_SESSION['arataMesaj'])){ ?>
        alert('Mesajul a fost transmis!');
        console.log("da");

      <?php unset($_SESSION['arataMesaj']);
            } ?>

    <? if ($scroleaza_jos) {?>
        $('html, body').animate({
            scrollTop: $("#form").offset().top
        }, 400);
    <?php } ?>

  </script>
</html>

<!--
ok 1' creare pagina listare portofoliu
ok 2. in index php foreach pt nume foto si reglare col-md folosind chunk.
3. in /admin.php sa nu apara navbar cu linkuri cu if ceva -->
<!--4. creare fisier stergere portofoliu, in care la submit sa stearga fisierul de pe server, apoi din bd.-->

<!--intrebari:

<!--adaugare_portofoliu -> Nume Portfoliu -> input -> value = ?-->