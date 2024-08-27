<?php
    require_once("base_de_donnees.php");
    $resultat = "";
    
    /**************************/
    /* LOGIN */
    /**************************/
    function acceder_au_site($bdd){
        $login = $_GET["username"];
        $mdp = $_GET["password"];
        
        //return $login.':'.$mdp;
        
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT idutilisateur, photo, typecompte FROM t_utilisateur WHERE nom='".$login."' AND motdepasse='".$mdp."'");
        
        foreach($rows as $row):
            $retour = $retour."".$row["idutilisateur"] .":".$login.":".$row["photo"].":".$row["typecompte"];
        endforeach;

        return $retour;
        /**/
    }

    if ($_GET["operation"]=="acceder_au_site") {
        $resultat = acceder_au_site(se_connecter());
    }
    
    echo $resultat;
?>