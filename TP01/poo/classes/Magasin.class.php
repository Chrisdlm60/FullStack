<?php
class Magasin{
    // Attributs
    protected $_NomEnt;
    protected $_Adresse;
    protected $_CP;
    protected $_Ville;
    protected $_Id;
    protected $_Repas;

    // Méthodes
    public function __construct($nom,$adresse,$cp,$ville,$id,$repas)
    {
        
        $this->_NomEnt = $nom;
        $this->_Adresse = $adresse;
        $this->_CP = $cp;
        $this->_Ville = $ville;
        $this->_Id = $id;
        $this->_Repas = $repas;

    }

    public function getId(){
        return $this->_Id;
    }

    public function Restauration(){

        if($this->_Repas == "non"){
            echo "<br> Elligible aux tickets restaurants";
        }
        else {
            echo "<br> La restauration se fait sur place";
        }
    }
}