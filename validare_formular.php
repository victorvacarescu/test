<?php
require_once ('helper.php');
//adaugare buton radio/check si un select, plus validare
//DA validare email
//DA functia din form_process in helper
//DA mysqli_real_escape_string in fiecare pagina
//DA VALUE in fiecare input din fiecare pagina
//DA verificare adaugare_blog nu pastreaza login-ul.
//DA adaugare pagina caracteristici in meniu din admin.
//OARECUM GIT rezolvare email pentru push.

function valideaza_formular($inputs){

    $ret = true;

    foreach($inputs as $numePost=>$reguli){
        $regulaAplicata = $reguli['regula'];
        $mesaj          = "";

        if($regulaAplicata == 'required') {
            if (isset($_POST[$numePost])) {
                if (test_input($_POST[$numePost]) == "") {
                    $ret = false;
                    $mesaj = "Camp obligatoriu";
                }
            } else {
                $ret = false;
                $mesaj = "Camp obligatoriu";
            }
        }

        if($regulaAplicata == 'is_numeric'){
            if(!ctype_digit($_POST[$numePost])){
                $ret            = false;
                $mesaj          = "Campul poate contine doar cifre";
            }
        }

        if ($regulaAplicata == 'is_email'){
            if (isset($_POST[$numePost])) {
                $email = test_input($_POST[$numePost]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $ret            = false;
                    $mesaj          = "Campul poate contine doar adresa e-mail";
                }
            }
        }

       if(isset($_POST[$numePost])){
           $inputs[$numePost]["valoare"] = $_POST[$numePost];
           $inputs[$numePost]["mesaj" ] = $mesaj;
       } else {
           $inputs[$numePost]["valoare"] = "";
           $inputs[$numePost]["mesaj" ] = $mesaj;
       }
    }

    $return = array(
        "formularReusit" => $ret,
        "inputs"         => $inputs
    );

    return $return;
}

function arataEroareFormular($camp,$inputs){
    $mesajValidare = $inputs[$camp]['mesaj'];

    if(!empty($mesajValidare))
        return "<p class='eroare'>{$mesajValidare}</p>";
    else
        return "";
}

function arataValoare($camp,$inputs){
    $valoareInput = $inputs[$camp]['valoare'];

    return $valoareInput;
}

function arataValoareSelect($camp,$valoare)
{
    if (isset ($_POST[$camp])) {
        if ($_POST[$camp] == $valoare)
            return "selected='selected'";
        else
            return "";
    }
}

function arataValoareRadio($camp,$valoare)
{
    if (isset ($_POST[$camp])) {
        if ($_POST[$camp] == $valoare)
            return "checked";
        else
            return "";
    }
}
