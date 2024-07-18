<?php
    require("base_de_donnees.php");

    $resultat = "";

    //RECUPERER LE NOM DU CHECKPOINT SELECTIONNE
    function recuperer_nom_checkpoint($idcheckpoint){
      $retour = "";
      
      $rows = mysqli_query(se_connecter(), "SELECT * FROM t_checkpoint WHERE idcheckpoint=".$idcheckpoint);
      
      foreach($rows as $row):
          $retour = $row["nom"];
      endforeach;

      return $retour;
    }

    /**************************/
    /* COMPTER LES UTILISATEURS */
    /**************************/
    function compter_utilisateurs($bdd){
      $retour = "";
      
      $rows = mysqli_query($bdd, "SELECT COUNT(*) AS nbre FROM t_utilisateur");
      
      foreach($rows as $row):
          $retour = $row["nbre"];
      endforeach;

      return $retour;
    }

    /* RECUPERER LE TYPE DE COMPTE DE L'UTILISATEUR SELECTIONNE */
    function recuperer_type_compte($idutilsateur){
        $retour = "";
        
        $rows = mysqli_query(se_connecter(), "SELECT typecompte FROM t_utilisateur WHERE idutilisateur=" . $idutilsateur);
        
        foreach($rows as $row):
            if ($row["typecompte"]=="ADMIN") {
                $retour = "ADMINISTRATEUR";
            }
            else{
                $retour = "SUPERVISEUR" ;
            }
        endforeach;

        return $retour;
    }

    
    /**************************/
    /* UTILISATEUR */
    /**************************/
    function afficher_tous_les_utilisateurs($bdd){
      $retour = "";
      $compteur = 0;
      
      $rows = mysqli_query($bdd, "SELECT * FROM t_utilisateur");
      
      foreach($rows as $row):
        $idutilisateur = $row["idutilisateur"];
        $typecompte = recuperer_type_compte($idutilisateur);
        $lieuaffectation = recuperer_nom_checkpoint($row["idcheckpoint"]);

        $retour = $retour . '<tr class="">
          <td>
            <img class="d-block mx-auto mb-4 rounded-circle" src="'.$row["photo"].'" alt="" width="57" height="57">
          </td>
          <td>'.$row["nom"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["telephone"].'</td>
          <td>'.$typecompte.'</td>
          <td>'.$lieuaffectation.'</td>
          <td>
            <span style="cursor: pointer;" onclick="supprimer_un_utilisateur(' . $idutilisateur  . ');" class="btn btn-danger">-</span>
          </td>
        </tr>';
      endforeach;

      return $retour;
    }
    
    function filtrer_les_utilisateurs($bdd, $nom){
      $retour = "";
      
      $rows = mysqli_query($bdd, "SELECT * FROM t_utilisateur WHERE nom LIKE '" . $nom . "%' OR nom LIKE '%" . $nom . "%'");
      
      foreach($rows as $row):
        $idutilisateur = $row["idutilisateur"];
        $typecompte = recuperer_type_compte($idutilisateur);
        $lieuaffectation = recuperer_nom_checkpoint($row["idcheckpoint"]);

        $retour = $retour . '<tr class="">
          <td>
            <img class="d-block mx-auto mb-4 rounded-circle" src="'.$row["photo"].'" alt="" width="57" height="57">
          </td>
          <td>'.$row["nom"].'</td>
          <td>'.$row["email"].'</td>
          <td>'.$row["telephone"].'</td>
          <td>'.$typecompte.'</td>
          <td>'.$lieuaffectation.'</td>
          <td>
            <span style="cursor: pointer;" onclick="supprimer_un_utilisateur(' . $idutilisateur  . ');" class="btn btn-danger">-</span>
          </td>
        </tr>';
      endforeach;

      return $retour;
    }

    if ($_REQUEST["operation"]=="afficher_tous_les_utilisateurs") {
      $resultat = afficher_tous_les_utilisateurs(se_connecter());
    }
    elseif ($_REQUEST["operation"]=="filtrer_les_utilisateurs") {
      $resultat = filtrer_les_utilisateurs(se_connecter(), $_REQUEST["nom"]);
    }
    elseif ($_REQUEST["operation"]=="compter_utilisateurs") {
      $resultat = compter_utilisateurs(se_connecter());
    }

    echo $resultat;
?>
