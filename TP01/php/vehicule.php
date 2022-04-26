<?php

    class Vehicule {
        public $_marque;
        public $_vitesseMax;
        protected $_vitesseCourante;
        private $_nbPassagers;

        public function __construct($marque, $vMax = 200, $nbPassagers = 0)
        {
            $this->_marque = $marque;
            $this->_vitesseMax = $vMax;
            $this->_vitesseCourante = 0;
            $this->_nbPassagers = $nbPassagers;
        }

        public function demarrer() {

        }
        public function accelerer(int $nbKm){

        }
        public function avancer(int $nbKm){

        }
        public function ajouterPassager(){
            
        }
    }