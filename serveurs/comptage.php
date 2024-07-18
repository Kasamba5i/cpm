<?php
    /**************************/
    /* COMPTER LE NOMBRE DE LIGNES DE LA TABLE SELECTIONNEE */
    /**************************/
    function compter_lignes($bdd, $nom_table){
        $retour = "";
        
        $rows = mysqli_query($bdd, "SELECT COUNT(*) AS nbre FROM " . $nom_table);
        
        foreach($rows as $row):
            $retour = $row["nbre"];
        endforeach;

        return $retour;
    }
?>