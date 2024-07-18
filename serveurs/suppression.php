<?php
    require_once("base_de_donnees.php");

    $resultat = "";
    
    /* CODE DE CONNEXION A LA BASE DE DONNEES */
    /*
    function se_connecter(){
        $conn = mysqli_connect("localhost","root","","db_cpm","3308");
        return $conn;
    }
    */

    /** COMPTER LE NOMBRE DE LIGNES DISPONIBLES */
    function compter_lignes($nom_table){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT COUNT(*) AS nbre FROM " . $nom_table . "");
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;

        return $retour;
    }

    /***********************/
    /* CAMION */
    /***********************/
    /* SUPPRIMER UN CAMION */
    function supprimer_un_camion(){
        $retour = 0;
        $idcamion = $_REQUEST["idcamion"];
        $lignes_disponibles = compter_lignes("t_camion");

        if($lignes_disponibles>1){
            $sql = "DELETE FROM t_camion WHERE idcamion=" . $idcamion . "";
        }
        elseif($lignes_disponibles==1){
            $sql = "TRUNCATE TABLE t_camion";
        }
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }

    /* SUPPRIMER TOUS LES CAMIONS */
    function supprimer_tous_les_camions(){
        $retour = 0;
        
        $lignes_disponibles = compter_lignes("t_camion");

        if($lignes_disponibles>0){
            $sql = "TRUNCATE TABLE t_camion";
        }
        else{
            $retour = 1;
        }
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }

    /***********************/
    /* CHECKPOINT */
    /***********************/
    /* SUPPRIMER UN CHECKPOINT */
    function supprimer_un_checkpoint(){
        $retour = 0;
        $idcheckpoint = $_REQUEST["idcheckpoint"];
        $lignes_disponibles = compter_lignes("t_checkpoint");

        if($lignes_disponibles>1){
            $sql = "DELETE FROM t_checkpoint WHERE idcheckpoint=" . $idcheckpoint . "";
        }
        elseif($lignes_disponibles==1){
            $sql = "TRUNCATE TABLE t_checkpoint";
        }
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }

    /* SUPPRIMER TOUS LES CHECKPOINTS */
    function supprimer_tous_les_checkpoints(){
        $retour = 0;
        
        $lignes_disponibles = compter_lignes("t_checkpoint");

        if($lignes_disponibles>0){
            $sql = "TRUNCATE TABLE t_checkpoint";
        }
        else{
            $retour = 1;
        }
        
        $retour = mysqli_query(se_connecter(), $sql);

        return $retour;
    }
    
    /***********************/
    /* UTILISATEUR */
    /***********************/
    /* SUPPRIMER UN UTILISATEUR */
    function supprimer_un_utilisateur(){
        $retour = 0;
        
        $idutilisateur = $_REQUEST["idutilisateur"];
        $lignes_disponibles = compter_lignes("t_utilisateur");
        
        if($lignes_disponibles>1){
            $sql = "DELETE FROM t_utilisateur WHERE idutilisateur=" . $idutilisateur . "";
        }
        elseif($lignes_disponibles==1){
            $sql = "TRUNCATE TABLE t_utilisateur";
        }
        
        $retour = mysqli_query(se_connecter(), $sql);
        
        return $retour;
    }

    if ($_REQUEST["operation"]=="supprimer_un_camion") {
        $resultat = supprimer_un_camion();
    }
    elseif ($_REQUEST["operation"]=="supprimer_tous_les_camions") {
        $resultat = supprimer_tous_les_camions();
    }
    elseif ($_REQUEST["operation"]=="supprimer_un_checkpoint") {
        $resultat = supprimer_un_checkpoint();
    }
    elseif ($_REQUEST["operation"]=="supprimer_tous_les_checkpoints") {
        $resultat = supprimer_tous_les_checkpoints();
    }
    elseif ($_REQUEST["operation"]=="supprimer_un_utilisateur") {
        $resultat = supprimer_un_utilisateur(se_connecter());
    }

    echo $resultat;
?>