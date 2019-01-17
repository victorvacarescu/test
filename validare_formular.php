<?php

//validare email
//mysqli_real_escape_string in fiecare pagina
//functia din form_process in helper
//VALUE in fiecare input din fiecare pagina
//verificare adaugare_blog nu pastreaza login-ul.
//DA adaugare pagina caracteristici in meniu din admin.
//adaugare buton radio/check si un select, plus validare
//DA  GIT rezolvare email pentru push.

function valideaza_formular($inputs){
    $ret = true;

    foreach($inputs as $numePost=>$reguli){
        $regulaAplicata = $reguli['regula'];
        $mesaj          = "";

        if($regulaAplicata == 'required'){
            if(trim($_POST[$numePost]) == ""){
                $ret            = false;
                $mesaj          = "Camp obligatoriu.";
            }
        }

        if($regulaAplicata == 'is_numeric'){
            if(!ctype_digit($_POST[$numePost])){
                $ret            = false;
                $mesaj          = "Campul poate contine doar cifre.";
            }
        }

        $inputs[$numePost]["valoare"] = $_POST[$numePost];
        $inputs[$numePost]["mesaj" ] = $mesaj;
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
