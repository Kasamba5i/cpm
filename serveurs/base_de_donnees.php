<?php
    /* CODE DE CONNEXION A LA BASE DE DONNEES */
    /************************/
    function se_connecter(){
        $adresse_bdd = "localhost";
        $utilisateur_bdd = "root";
        $motdepasse_bdd = "";
        $nom_bdd = "db_cpm";
        $port_mysql = /*"3308"*/ "3306";

        $conn = mysqli_connect($adresse_bdd,$utilisateur_bdd,$motdepasse_bdd,$nom_bdd,$port_mysql);
        //$conn = mysqli_connect($adresse_bdd,$utilisateur_bdd,$motdepasse_bdd,$nom_bdd);

        return $conn;
    }
?>