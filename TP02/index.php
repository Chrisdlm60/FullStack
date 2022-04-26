<?php
    require 'controller/Controller.php';

    try {
        if(isset($_GET['action'])) {
            if($_GET['action'] == 'billet'){
                if(isset($_GET['id'])){
                    $idBillet = intval($_GET['id']);
                    if ($idBillet != 0)
                        billet($idBillet);
                    else
                        throw new Exception("id billet non valide");
                }else
                    throw new Exception("id billet non défini");
            }else
                throw new Exception("action non valide");
        }else {
            accueil();
        }
    
    }catch(Exception $e) {
        erreur($e->getMessage());
    }

?>
