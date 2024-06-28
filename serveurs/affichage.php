<?php
    $resultat = "";

    /* CODE DE CONNEXION A LA BASE DE DONNEES */
    function se_connecter(){
        $conn = mysqli_connect("localhost","root","","db_cpm");
        return $conn;
    }

    /** */
    function afficher_tous_les_camions(){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT * FROM t_camion");
        
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

    function filtrer_les_camions($plaque){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT * FROM t_camion WHERE plaque LIKE '" . $plaque . "%'");
        
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

    function compter_lignes($nom_table){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT COUNT(*) AS nbre FROM " . $nom_table);
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;

        return $retour;
    }

    if ($_REQUEST["operation"]=="afficher_tous_les_camions") {
        $resultat = afficher_tous_les_camions();
    }
    elseif ($_REQUEST["operation"]=="filtrer_les_camions") {
        $resultat = filtrer_les_camions($_GET['plaque']);
    }
    elseif ($_REQUEST["operation"]=="compter_lignes") {
        $resultat = compter_lignes($_REQUEST["table"]);
    }

    echo $resultat;
?>
