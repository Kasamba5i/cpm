<?php
    $resultat = "";

    /* CODE DE CONNEXION A LA BASE DE DONNEES */
    function se_connecter(){
        $conn = mysqli_connect("127.0.0.1","root","","db_cpm","3308");
        return $conn;
    }

    /**************************/
    /* COMPTER  */
    /**************************/
    function compter_lignes($bdd, $nom_table){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT COUNT(*) AS nbre FROM " . $nom_table);
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;

        return $retour;
    }

    /**************************/
    /* CAMION */
    /**************************/
    function afficher_tous_les_camions($bdd){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_camion");
        
        foreach($rows as $row):
            $id = $row["idcamion"];
            $retour = $retour . '<li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0" id="plaqueimmatriculation">' . $row["plaque"] . '</h6>
                    <small class="text-muted" id="contact">+' . $row["contact"] . '</small>
                    <br>
                    <small class="text-muted" id="capactite">' . $row["capacite"] . ' tone(s)</small>
                    <br>
                    <small class="text-muted" id="nomchauffeur">' . $row["chauffeur"] . '</small>
                </div>
                <div>
                    <span style="cursor: pointer;" onclick="supprimer_un_camion(' . $row['idcamion']  . ');" class="btn btn-danger">-</span>
                </div>
            </li>';
        endforeach;

        return $retour;
    }

    function filtrer_les_camions($bdd, $plaque){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_camion WHERE plaque LIKE '" . $plaque . "%' OR plaque LIKE '%" . $plaque . "%'");
        
        foreach($rows as $row):
            $id = $row["idcamion"];
            $retour = $retour . '<li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0" id="plaqueimmatriculation">' . $row["plaque"] . '</h6>
                    <small class="text-muted" id="contact">' . $row["contact"] . '</small>
                    <br>
                    <small class="text-muted" id="capactite">' . $row["capacite"] . '</small>
                    <br>
                    <small class="text-muted" id="nomchauffeur">' . $row["chauffeur"] . '</small>
                </div>
                <div>
                    <span style="cursor: pointer;" onclick="supprimer_camion(' . $row['idcamion']  . ');" class="btn btn-danger">-</span>
                </div>
            </li>';
        endforeach;

        return $retour;
    }

    /**************************/
    /* CHECKPOINT */
    /**************************/
    function afficher_tous_les_checkpoints($bdd){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_checkpoint");
        
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

    /**  */
    function lister_les_checkpoints($bdd){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_checkpoint");
        
        foreach($rows as $row):
            $retour = $retour . '<option value=' . $row["idcheckpoint"] . '>' . $row["nom"] . ' - ' . $row["localisation"] . '</option>';
        endforeach;

        return $retour;
    }

    if ($_REQUEST["operation"]=="afficher_tous_les_camions") {
        $resultat = afficher_tous_les_camions(se_connecter());
    }
    elseif ($_REQUEST["operation"]=="filtrer_les_camions") {
        $resultat = filtrer_les_camions(se_connecter(), $_GET['plaque']);
    }
    elseif ($_REQUEST["operation"]=="compter_lignes") {
        $resultat = compter_lignes(se_connecter(), $_REQUEST["table"]);
    }
    elseif ($_REQUEST["operation"]=="afficher_tous_les_checkpoints") {
        $resultat = afficher_tous_les_checkpoints(se_connecter());
    }
    elseif ($_REQUEST["operation"]=="lister_les_checkpoints") {
        $resultat = lister_les_checkpoints(se_connecter());
    }
    elseif ($_REQUEST["operation"]=="filtrer_les_checkpoints") {
        $resultat = filtrer_les_checkpoints(se_connecter(), $_REQUEST["nom"]);
    }

    echo $resultat;
?>
