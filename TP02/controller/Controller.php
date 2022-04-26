<?php
    require 'Model/Model.php';

    // Affiche la liste de tous les billets du blog
    function Accueil(){
        $billets = getBillets();

        require 'view/vueAccueil.php';
    }

    // Affiche les détails sur un billet
    function billet($idBillet){
        $billet = getBillet($idBillet);
        $commentaires = getComments($idBillet);

        require 'view/vueBillet.php';
    }

    // Affiche une erreur
    function erreur($msgErreur){
        require 'view/vueErreur.php';
    }