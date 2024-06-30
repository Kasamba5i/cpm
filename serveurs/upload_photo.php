<?php
    function enregistrer_photo(){
        $retour = "";

        $src = $_FILES["f_photo"]["tmp_name"];
        $dst = "../photo_id/".$_FILES["f_photo"]["name"];
        if(move_uploaded_file($src, $dst)==true){
            $retour = "1:photo_id/".$_FILES["f_photo"]["name"];
        }
        else{
            $retour = "0:ERREUR";
        }

        return $retour;
    }

    echo enregistrer_photo();
?>