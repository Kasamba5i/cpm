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
    /* CHECKPOINT */
    /************************/
    function ajouter_un_checkpoint(){
        $retour = 0;
        
        $nom = strtoupper($_REQUEST["nom"]);
        $localisation = strtoupper($_REQUEST["localisation"]);
        
        $sql = "INSERT INTO t_checkpoint (nom, localisation) VALUES ('".$nom."', '".$localisation."')";
        
        //$retour = se_connecter()->query($sql);
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }
    
    if ($_GET["operation"]=="ajouter_un_checkpoint") {
        $resultat = ajouter_un_checkpoint();
    }

    echo $resultat;
?>