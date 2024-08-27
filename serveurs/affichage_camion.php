<?php
    require_once("base_de_donnees.php");

    $resultat = "";

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

    if ($_GET["operation"]=="afficher_tous_les_camions") {
        $resultat = afficher_tous_les_camions(se_connecter());
    }
    elseif ($_GET["operation"]=="filtrer_les_camions") {
        $resultat = filtrer_les_camions(se_connecter(), $_GET['plaque']);
    }

    echo $resultat;
?>
