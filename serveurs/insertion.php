<?php
    $resultat = "";
    
    /* CODE DE CONNEXION A LA BASE DE DONNEES */
    function se_connecter(){
        $conn = mysqli_connect("localhost","root","","db_cpm");
        return $conn;
    }

    /** */
    function compter_lignes($nom_table){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT COUNT(*) AS nbre FROM " . $nom_table . "");
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;

        return $retour;
    }

    /*
    function creer_id($nbre){
        $id = "";

        // VERIFIER LE NOMBRE DE CARACTERES QUI CONSTITUE NOMBRE DE CAMION
        if (strlen($nbre)==1) {
            $id = "CAM00" . $nbre;
        }
        elseif (strlen($nbre)==2) {
            $id = "CAM0" . $nbre;
        }
        elseif (strlen($nbre)==3) {
            $id = "CAM" . $nbre;
        }

        return $id;
    }
    */

    function ajouter_camion(){
        $retour = "";
        
        $plaque = $_REQUEST["plaque"];
        $chauffeur = $_REQUEST["chauffeur"];
        $capacite = $_REQUEST["capacite"];
        $contact = $_REQUEST["contact"];
        
        $sql = "INSERT INTO t_camion (plaque, capacite, chauffeur, contact) VALUES ('".$plaque."', '".$capacite."', '".$chauffeur."', '".$contact."')";
        
        $resultat = se_connecter()->query($sql);

        return $retour;
    }

    function ajouter_utilisateur(){
        $retour = "ajouter_utilisateur";
        return $retour;
    }

    if ($_REQUEST["operation"]=="ajouter_camion") {
        $resultat = ajouter_camion();
    }
    elseif ($_REQUEST["operation"]=="ajouter_utilisateur") {
        $resultat = ajouter_utilisateur();
    }

    echo $resultat;
?>