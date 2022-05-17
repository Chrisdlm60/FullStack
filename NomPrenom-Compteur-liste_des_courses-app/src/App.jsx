import React, { useState } from 'react';

const App = (props) => {

        const [nom, setNom] = useState("");
        const [prenom, setPrenom] = useState("");
        const [compteur, setCompteur] = useState("");
        const [addListe, setListe] = useState("");

        let Liste = [];
        for (var i = 1; i < 6; i++) {
            Liste[i] = "Liste " + i;
        }

        const handleChangeNom = (evt) => {
            setNom(evt.target.value);
        }
        const handleChangePrenom = (evt) => {
            setPrenom(evt.target.value);
        }
        const handleChangeCompteur = (evt) => {

            // Permet au premier clic de passer 
            //la valeur directement de evt.target.value 
            // à 1 au lieu de 0
            if (compteur === '' || 0)
                evt.target.value++;
            setCompteur(evt.target.value++);
        }

        const handleChangeListe = (evt) => {
            setListe(evt.target.value);
        }

        const handleAddListe = () => {

            let myliste = document.getElementById("addliste").value;

            let cible = document.getElementById("liste");
            let li = document.createElement('li');

            li.append(myliste)
            cible.append(li)

        }

        return ( <
                div >
                <
                div >
                Bonjour &
                nbsp; <
                span className = 'bolder' > { nom } { prenom } <
                /span> <
                /div> <
                div className = "Nom" >
                <
                input type = "text"
                placeholder = "nom"
                value = { nom }
                onChange = { handleChangeNom }
                /> <
                input type = "text"
                placeholder = "prenom"
                value = { prenom }
                onChange = { handleChangePrenom }
                /> <
                /div> <
                br / > < br / >
                <
                div className = "Compteur" >
                <
                button type = "button"
                onClick = { handleChangeCompteur } > Compteur < /button> <
                input type = "text"
                value = { compteur | 0 }
                name = "compteur"
                id = "compteur"
                readOnly / >

                <
                /div> <
                br / > < br / >
                <
                div className = "Liste" >
                <
                label htmlFor = "liste" > Ajouter dans la liste: < /label> <
                input type = "text"
                value = { addListe }
                onChange = { handleChangeListe }
                onKeyUp = { handleChangeListe }
                name = "addliste"
                id = "addliste" / >
                <
                button type = "button"
                onClick = { handleAddListe } > Ajouter < /button>

                <
                br / > < br / >

                <
                ol id = "liste" > {
                    Liste.map((item, i) => < li key = { i } > { item } < /li>)}</ol >

                        <
                        /div> <
                        br / > < br / >
                        <
                        /div>
                    );
                }

                export { App };