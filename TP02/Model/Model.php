<?php
    function getBillets(){

        $bdd = getBdd();

        $billets = $bdd->query('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET order by BIL_ID desc');
        
        return $billets;
    }

    function getBdd(){
        $user = 'admin';
        $pass = "111289-Dlm";
        
        $bdd = new PDO("mysql:host=localhost:3306;dbname=MonBlog;charset=utf8",$user, $pass);

        return $bdd;
    }

    function getBillet($idbillet){
        $bdd = getBdd();

        $billet = $bdd->prepare('SELECT BIL_ID as id, BIL_DATE as date, BIL_TITRE as titre, BIL_CONTENU as contenu FROM T_BILLET WHERE BIL_ID =?;');
        $billet->execute(array ($idbillet));

        if ($billet->rowCount() == 1){
            return $billet->fetch();
        } else {
            throw new Exception("Aucun billet ne correspond à cet identifiant");
        }
    }

    function getComments($idbillet): PDOStatement {
        $bdd = getBdd();
        $comments = $bdd->prepare('SELECT COM_ID as id, COM_DATE as date,COM_AUTEUR as auteur, COM_CONTENU as contenu FROM T_COMMENTAIRE WHERE BIL_ID =?');
        $comments->execute(array($idbillet));

        return $comments;
    }