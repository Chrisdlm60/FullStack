<?php
include ('Magasin.class.php');

    class Employe{

        // Attributs
        protected $_Nom;
        private $_Prenom;
        private $_DateEmbauche;
        private $_Fonction;
        private $_Salaire;
        private $_Service;
        private $_magasin;
        private $_Enfant;

        // Méthodes
        public function __construct(string $nom, $prenom,$date,$fonction,$salaire,$service, $magasin, $enfant)
        {
            $this->_Nom = $nom;
            $this->_Prenom = $prenom;
            $this->_Salaire = $salaire;
            $this->_DateEmbauche = $date;
            $this->_Fonction = $fonction;
            $this->_Service = $service;
            $this->_magasin = $magasin;
            $this->_Enfant = $enfant;
        }

        public function getNom(){
            return $this->_Nom;
        }

        public function getMagasin(){
            return $this->_magasin;
        }
        public function getEnfant(){
            return $this->_Enfant;
        }

        public function getAnciennete($nom){

            $Anciennete = 2022 - $this->_DateEmbauche;

            return $Anciennete;
        }

        public function getPrime($date,$nom){
            if ($date == "30/11"){
                $_PrimeAnciennete = 0;
                $_PrimeSalaire = ($this->_Salaire * 5 )/ 100;
                $Anciennete = $this->getAnciennete($nom);
                
                if($Anciennete > 1){
                    $_PrimeAnciennete = ($this->_Salaire * (2 * $Anciennete))/ 100;
                }
                $Prime = $_PrimeAnciennete + $_PrimeSalaire;
                echo ("<br>L'ordre de transfert réussi d'un montant de ".$Prime."€");
            }
        }
        public function CH_Vacances($nom){
            $Ancien = $this->getAnciennete($nom);
            if($Ancien > 1)
                return "<br> Elligible aux cheques vacances";
            else
                return "<br> Non Elligible aux cheques vacances";

        }

        public function CH_Noel($nom){
            $enfant = $this->getEnfant($nom);

            echo '<br>';
            if (!empty($enfant)){
                echo $this->_Nom.' '.$this->_Prenom.': <br>';
                for($i=0;$i < count($enfant); $i++){
                    if($enfant[$i] < 10 || ($enfant[$i] > 10 && $enfant[$i] < 16) || ($enfant[$i] >= 16 && $enfant[$i] <= 18)){
                        if($enfant[$i] < 10){
                            echo "Elligible à un cheque de 20€.<br>";
                        }
                        else if($enfant[$i] > 10 && $enfant[$i] < 16){
                            echo "Elligible à un cheque de 30€.<br>";
                        }
                        else if($enfant[$i] >= 16 && $enfant[$i] <= 18){
                            echo"Elligible à un cheque de 50€.<br>";
                        }
                    }
                }
            }
        }

    }

?>