<?php
require_once ('helper.php');
$mysqli = conectareLaBazaDeDate();

if (isset($_POST['submit'])){

    $file = $_FILES['file'];
}

function print_test(array $test){
    echo "<table bgcolor 'lightgreen' border = '2' bordercolor = 'green' cellpadding = '10'>";

    foreach ($test as $key => $value) {
        echo '<tr><td>'.ucwords($key).'</td><td>'.ucwords($value).'</td></tr>';
    }
    echo '</table>';
}

$my_test = array('nume'=>'vacarescu', 'prenume'=>'victor', 'varsta'=>35, 'localitate'=>'bucuresti');

?>

<html>
    <head>
        <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.css">
        <script src="../assets/libs/jquery3.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
          <div class="row">
              <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <h2>PROBE UPLOAD</h2>
                    <input type="file" name="file"/>
                    <button type="submit" name="submit">Upload</button>
                </form>
              </div>
              <div class="col-md-6">
                <pre>
                    <?php var_dump($file); ?>
                </pre>
              </div>
          </div>

          <div class="row">
            <?php print_test($my_test); ?>
          </div>
        </div>
<div class="mt-3">
    <?php $result = showIpAdress();
    echo $result;
    ?>

</div>
    </body>
</html>


