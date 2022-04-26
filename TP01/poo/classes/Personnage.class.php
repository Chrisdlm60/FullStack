<?php

    class Personnage {
        private $_Nom;
        private $_Prenom;
        private $_Age;
        private $_Sexe;

        public function setNom($Fname){
            $this->_Nom = $Fname;
        }
        public function setPrenom($Lname){
            $this->_Prenom = $Lname;
        }
    }