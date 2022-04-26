<?php

    include 'classes/Employe.class.php';

    // Déclaration objet entreprise
    // Nom, Adresse, Code postal, Ville, Identifiant, restauration possible
    $Bricolage = new Magasin('Bricolage',"18 rue Champs Elysee",75006,"Paris",1,"non");
    $BricoMarche = new Magasin('BricoMarche','28 rue les Halles',59000,'Lille',2,"oui");
    $BricoDepot = new Magasin('BricoDepot',"64 rue des Antilles",13005,"Marseille",3,"non");

    // Déclaration objet employe
    // Nom, Prenom, Annee d'embauche, fonction, salaire, service, magasin affilié, enfants
    $Dupont = new Employe("Dupont","Jacques",2001,"directeur",45000,"direction",$Bricolage,[16,13]);
    $Karine = new Employe("Lemarchand","Karine",2005,"Secretaire",30000,"direction",$BricoMarche,[6]);
    $Pierre = new Employe("Durand","Pierre",2004,"Chef d'equipe",32000,"Employe",$BricoDepot,[]);
    $Paul = new Employe("Montier","Paul",2022,"Employe",20000,"Employe",$BricoDepot,[15,12,8]);
    $Jack = new Employe("Daniel","Jack",2009,"Employe",25000,"Employe",$Bricolage,[19]);

    // $listemagasins = [$Bricolage, $BricoMarche, $BricoDepot];
    
    // foreach ($listemagasins as $magasin) {
    //     if ($magasin->getId() == $Dupont->getMagasin()) {
            // $magDupont = $magasin;
    //     }
    // }
    // var_dump($magDupont);

    // echo $magDupont->Restauration();

    if(isset($_POST['ok']))
    {
        $date = $_POST['jour']."/".$_POST['mois'];

        echo $date."<br>";

        echo ($Dupont->getPrime($date,$Dupont->getNom()));
        echo ("<br>\n");
        echo ($Karine->getPrime($date,$Karine->getNom()));
        echo ("<br>\n");
        echo ($Pierre->getPrime($date,$Pierre->getNom()));
        echo ("<br>\n");
        echo ($Paul->getPrime($date,$Paul->getNom()));
        echo ("<br>\n");
        echo ($Jack->getPrime($date,$Jack->getNom()));
    }

    echo "<br><br>";

    echo "Mr Dupont: ";
    echo $Dupont->getMagasin()->Restauration();

    echo $Dupont->CH_Vacances($Dupont->getNom());

    echo "<br><br>";

    echo $Karine->getNom().": ";
    echo $Karine->getMagasin()->Restauration();

    echo "<br><br>";

    echo "Paul: ";
    echo $Paul->getMagasin()->Restauration();
    // Paul a 3 enfants le premier est agé de 16ans, le second 12ans, le dernier 8ans

    echo "<br><br>";

    echo "Chéque Noël: <br><br>";

    $Dupont->CH_Noel($Dupont->getNom());
    $Karine->CH_Noel($Karine->getNom());
    $Pierre->CH_Noel($Pierre->getNom());
    $Paul->CH_Noel($Paul->getNom());
    $Jack->CH_Noel($Jack->getNom());
?>

<form name="prime" method="post">
    <label for="jour">Jour :</label>
    <input type="number" name="jour" id="jour" min=1 max=31>
    <label for="mois">Mois :</label>
    <input type="number" name="mois" id="mois" min=1 max=12>


    <input type="submit" name="ok" value="ok">
</form>
