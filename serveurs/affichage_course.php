<?php
    require_once("base_de_donnees.php");

    $resultat = "";

    //RECUPERER LE NOM DU CHECKPOINT SELECTIONNE
    function recuperer_nom_checkpoint($bdd, $idcheckpoint){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_checkpoint WHERE idcheckpoint=".$idcheckpoint);
        
        foreach($rows as $row):
            $retour = $row["nom"];
        endforeach;

        return $retour;
    }


    /**************************/
    /* COURSE */
    /**************************/
    function afficher_toutes_les_courses($bdd){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_course");
        
        foreach($rows as $row):
            $id = $row["idcourse"];
            //$retour = $retour . '<tr onclick="detailler_course(\'' . $id . '\');">
            $retour = $retour . '<tr onclick="detailler_course(\'' . $id . '\');" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">
            
                <td>' . $row["idcourse"] . '</td>
                <td>' . $row["typecourse"] . '</td>
                <td>' . recuperer_nom_checkpoint(se_connecter(),$row["source"]) . '</td>
                <td>' . recuperer_nom_checkpoint(se_connecter(),$row["destination"]) . '</td>
                <td>' . $row["plaque"] . '</td>
                <td>' . $row["datecourse"] . '</td>
            </tr>';
        endforeach;

        return $retour;
    }

    function detailler_course($bdd, $idcourse) {
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT details, contact FROM t_course WHERE idcourse='" . $idcourse . "'");
        
        foreach($rows as $row):
            $retour = '1:' . $row["contact"] . ':' . $row["details"];
        endforeach;

        return $retour;
    }

    function filtrer_les_courses($bdd, $idcourse){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT * FROM t_course WHERE idcourse LIKE '" . $idcourse . "%' OR idcourse LIKE '%" . $idcourse . "%'");
        
        foreach($rows as $row):
            $id = $row["idcourse"];
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
                    <span style="cursor: pointer;" onclick="supprimer_course(' . $row['idcourse']  . ');" class="btn btn-danger">-</span>
                </div>
            </li>';
        endforeach;

        return $retour;
    }

    if ($_GET["operation"]=="afficher_toutes_les_courses") {
        $resultat = afficher_toutes_les_courses(se_connecter());
    }
    elseif ($_GET["operation"]=="filtrer_les_courses") {
        $resultat = filtrer_les_courses(se_connecter(), $_GET['plaque']);
    }
    elseif ($_GET["operation"]=="detailler_course") {
        $resultat = detailler_course(se_connecter(), $_GET['idcourse']);
    }

    echo $resultat;
?>
