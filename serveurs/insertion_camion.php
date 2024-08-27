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
    /* CAMION */
    /************************/
    function ajouter_camion(){
        $retour = 0;
        
        $plaque = $_REQUEST["plaque"];
        $chauffeur = $_REQUEST["chauffeur"];
        $capacite = $_REQUEST["capacite"];
        $contact = $_REQUEST["contact"];
        
        $sql = "INSERT INTO t_camion (plaque, capacite, chauffeur, contact) VALUES ('".$plaque."', '".$capacite."', '".$chauffeur."', '".$contact."')";
        
        //$retour = se_connecter()->query($sql);
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }

    if ($_GET["operation"]=="ajouter_camion") {
        $resultat = ajouter_camion();
    }

    echo $resultat;
?>