<?php
    $resultat = "";
    
    /* CODE DE CONNEXION A LA BASE DE DONNEES */
    /************************/
    function se_connecter(){
        $conn = mysqli_connect("localhost","root","","db_cpm","3308");
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
    
    /************************/
    /* UTILISATEUR */
    /************************/
    function ajouter_un_utilisateur(){
        $retour = 0;
        
        $nom = strtoupper($_REQUEST["nom"]);
        $email = $_REQUEST["email"];
        $telephone = strtoupper($_REQUEST["contact"]);
        $idcheckpoint = strtoupper($_REQUEST["idcheckpoint"]);
        $cheminphoto = $_REQUEST["cheminphoto"];
        $type_de_compte = strtoupper($_REQUEST["type_de_compte"]);
        $motdepasse = strtoupper($_REQUEST["motdepasse"]);
        
        $sql = "INSERT INTO t_utilisateur (nom, email, telephone, photo, idcheckpoint, typecompte, motdepasse) VALUES ('".$nom."', '".$email."', '".$telephone."', '".$cheminphoto."', ".$idcheckpoint.", '".$type_de_compte."', '".$motdepasse."')";
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }

    if ($_REQUEST["operation"]=="ajouter_camion") {
        $resultat = ajouter_camion();
    }
    elseif ($_REQUEST["operation"]=="ajouter_un_checkpoint") {
        $resultat = ajouter_un_checkpoint();
    }
    elseif ($_REQUEST["operation"]=="ajouter_un_utilisateur") {
        $resultat = ajouter_un_utilisateur();
    }

    echo $resultat;
?>