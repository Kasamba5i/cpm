<?php
    require_once("base_de_donnees.php");
    include_once("affichage_date_heure.php");

    $resultat = "";
    
    /** */
    function compter_lignes($nom_table){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT COUNT(*) AS nbre FROM " . $nom_table . "");
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;

        return $retour;
    }

    /************************/
    /* COURSE */
    /************************/
    function ajouter_course(){
        $retour = 0;

        $idcourse = generer_id_course();
        $datecourse = $_GET["datecourse"];
        $typecourse = strtoupper($_GET["typecourse"]);
        $source = $_GET["source"];
        $destination = $_GET["destination"];
        $details = htmlspecialchars($_GET["details"]);
        $plaque = strtoupper($_GET["plaque"]);
        $contact = $_GET["contact"];

        $sql = "INSERT INTO t_course (idcourse, datecourse, typecourse, source, destination, details, plaque, contact) VALUES ('".$idcourse."', '".$datecourse."', '".$typecourse."', ".$source.", ".$destination.", '".$details."', '".$plaque."', '".$contact."')";
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }

    if ($_GET["operation"]=="ajouter_course") {
        $resultat = ajouter_course();
    }

    echo $resultat;
?>