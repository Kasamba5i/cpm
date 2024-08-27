<?php
    require("base_de_donnees.php");

    $resultat = "";

    /**************************/
    /* CHECKPOINT */
    /**************************/
    function afficher_tous_les_checkpoints($bdd){
        $retour = "";
        /**/
        $rows = mysqli_query($bdd, "SELECT * FROM t_checkpoint");
        
        foreach($rows as $row):
            $id = $row["idcheckpoint"];
            $retour = $retour . '<li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0" id="' . $id . '">' . $row["nom"] . '</h6>
                    <small class="text-muted" id="localisation">' . $row["localisation"] . '</small>
                </div>
                <div>
                    <span style="cursor: pointer;" onclick="supprimer_un_checkpoint(' . $row['idcheckpoint']  . ');" class="btn btn-danger">-</span>
                </div>
            </li>';
        endforeach;
        /**/
        return $retour;
    }

    function filtrer_les_checkpoints($bdd, $nom){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_checkpoint WHERE nom LIKE '" . $nom . "%' OR nom LIKE '%" . $nom . "%'");
        
        foreach($rows as $row):
            $id = $row["idcheckpoint"];
            $retour = $retour . '<li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0" id="nom">' . $row["nom"] . '</h6>
                    <small class="text-muted" id="localisation">' . $row["localisation"] . '</small>
                </div>
                <div>
                    <span style="cursor: pointer;" onclick="supprimer_un_checkpoint(' . $row['idcheckpoint']  . ');" class="btn btn-danger">-</span>
                </div>
            </li>';
        endforeach;

        return $retour;
    }

    /** LISTER LES CHECKPOINTS */
    function lister_les_checkpoints($bdd){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_checkpoint");
        
        foreach($rows as $row):
            $retour = $retour . '<option value=' . $row["idcheckpoint"] . '>' . $row["nom"] . '</option>';
        endforeach;
        
        return $retour;
    }

    //RECUPERER LE NOM DU CHECKPOINT SELECTIONNE
    function recuperer_nom_checkpoint($idcheckpoint){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT * FROM t_checkpoint WHERE idcheckpoint=".$idcheckpoint);
        
        foreach($rows as $row):
            $retour = $row["nom"];
        endforeach;

        return $retour;
    }

    //COMPTER LE NOMBRE DES CHECKPOINTS
    function compter_les_checkpoints($bdd) {
        $retour = 0;
        
        $rows = mysqli_query($bdd, "SELECT COUNT(*) AS nbre FROM t_checkpoint");
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;
        
        return $retour;
        
        //return "compter_les_checkpoints";
    }

    if ($_GET["operation"]=="compter_lignes") {
        $resultat = compter_lignes(se_connecter(), $_GET["table"]);
    }
    elseif ($_GET["operation"]=="afficher_tous_les_checkpoints") {
        $resultat = afficher_tous_les_checkpoints(se_connecter());
    }
    elseif ($_GET["operation"]=="lister_les_checkpoints") {
        $resultat = lister_les_checkpoints(se_connecter());
    }
    elseif ($_GET["operation"]=="filtrer_les_checkpoints") {
        $resultat = filtrer_les_checkpoints(se_connecter(), $_GET["nom"]);
    }
    elseif ($_GET["operation"]=="compter_les_checkpoints") {
        $resultat = compter_les_checkpoints(se_connecter());
    }

    echo $resultat;
?>
