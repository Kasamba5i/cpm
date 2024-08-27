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
    /* UTILISATEUR */
    /************************/
    function ajouter_un_utilisateur(){
        $retour = 0;
        
        $nom = strtoupper($_GET["nom"]);
        $email = $_GET["email"];
        $telephone = strtoupper($_GET["contact"]);
        $idcheckpoint = strtoupper($_GET["idcheckpoint"]);
        $cheminphoto = $_GET["cheminphoto"];
        $type_de_compte = strtoupper($_GET["type_de_compte"]);
        $motdepasse = strtoupper($_GET["motdepasse"]);
        
        $sql = "INSERT INTO t_utilisateur (nom, email, telephone, photo, idcheckpoint, typecompte, motdepasse) VALUES ('".$nom."', '".$email."', '".$telephone."', '".$cheminphoto."', ".$idcheckpoint.", '".$type_de_compte."', '".$motdepasse."')";
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }


    if ($_GET["operation"]=="ajouter_un_utilisateur") {
        $resultat = ajouter_un_utilisateur();
    }

    echo $resultat;
?>