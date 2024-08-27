<?php
    $resultat = "";

    function afficher_date_heure_sys(){
        return date('Y-m-d H:i:s');
    }

    function generer_id_course(){
        $code_date_heure_sys = str_replace(array('-', ':'), '', afficher_date_heure_sys());
        $code_date_heure_sys = str_replace(array(' '), 'i', $code_date_heure_sys);
        $id_course = "KME" . $code_date_heure_sys;

        return $id_course;
    }

    //echo afficher_date_heure_sys();
    //echo generer_id_course();

    //SORTIE
    if($_GET["operation"]=="afficher_date_heure_sys"){
        $resultat = afficher_date_heure_sys();
    }
    elseif($_GET["operation"]=="generer_id_course"){
        $resultat = generer_id_course();
    }
    
    echo $resultat;
?>