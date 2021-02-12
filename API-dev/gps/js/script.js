let mymap; // Variable qui permettra de stocker la carte
let marqueur; // Variable qui permettra de stocker le nouveau marqueur
let cercle; // Variable qui permettra de stocker le nouveau marqueur

let UpdateMarqueur; // Variable qui permettra de stocker l'dentifiant du marqueue en mouvement 

let TableauEmplacements; // tableau des emplacement 
let TableauMarqueur = [];// Variable qui permettra de stocker les marqueurs
let TableauCercle = [];// Variable qui permettra de stocker les marqueurs
let icone = []; // Variable qui permettra de stocker les icone des marqueurs
let villes

var stamen // PanelContrôle

// On attend que le DOM soit chargé
window.onload = () => {
    
    // Nous initialisons la carte et nous la centrons sur la mairie 
    mymap = L.map('Map').setView([48.61015, 7.49662], 17);
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
    //L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
        attribution: 'Carte fournie par OpenStreetMap.fr',
        minZoom: 12,
        maxZoom: 20,
        //layers: [OpenStreetMap_BlackAndWhite],
        //layers: [stamen], //// PanelContrôle      Gestion du panneau de contrôle
    }).addTo(mymap);

    // on ajoute l'echel de la carte 
    var scale = L.control.scale(); 
    scale.addTo(mymap); 
    
    // on ajoute la fonstion de recherche sur la carte
    var searchControl = L.esri.Geocoding.geosearch({
        title:"Recherche de localisation"   
        ,placeholder: "Recherche de lieux ou d’adresses"
        }).addTo(mymap);
    var searcResults = L.layerGroup().addTo(mymap);

    searchControl.on('results', function (data) {
        searcResults.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
            const searchResult = data.results[i].latlng;
            const searchMarker = L.marker(searchResult)
            searcResults.addLayer(searchMarker);
          
            document.querySelector("#lat").value = searchResult.lat;
            document.querySelector("#lon").value = searchResult.lng;
        }
      });




    // fin fonstion de recherche sur la carte

     // On écoute le clic sur la carte et on lance la fonction "mapClickListen"
     mymap.on('click', mapClickListen);
    
    // JPP cree une liste de marqueur pour Mairie / entre / parking / toilette / restoration / zone 1-4-*
    // On personnalise le marqueur 
//    var icone = L.icon({
//        iconUrl: "images/icone.png",
//        iconSize: [50, 50],
//        iconAnchor: [25, 50],
//        popupAnchor: [0, -50]
//    });

    // On personnalise le marqueur 
        var icone = L.icon({
            iconUrl: "images/icone.png",
            iconSize: [50, 50],
            iconAnchor: [25, 50],
            popupAnchor: [0, -50]
        })
        var icone0 =L.icon({
            iconUrl: "images/marker-icon0.png",
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [0, -41]
        });
        var icone1 = L.icon({// Mairie
           iconUrl: "images/government.png",
           iconSize: [33, 44],
           iconAnchor: [16, 44],
           popupAnchor: [0, -44]
       });
       var icone2 = L.icon({ //Entrée
        iconUrl: "images/tickets.png",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
        popupAnchor: [0, -44]
       });
       var icone3 = L.icon({ //Toilettes
        iconUrl: "images/employment.png",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
        popupAnchor: [0, -44]
       });
       var icone4 = L.icon({ //Poste de secours
        iconUrl: "images/health-medical.png",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
        popupAnchor: [0, -44]
       });
       var icone5 = L.icon({ //Parking
        iconUrl: "images/automotive.png",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
        popupAnchor: [0, -44]
       });
       var icone6 = L.icon({ //Restaurantion
        iconUrl: "images/restaurants.png",
        iconSize: [33, 44],
        iconAnchor: [16, 44],
        popupAnchor: [0, -44]
       });
        var icone20 = L.icon({
            iconUrl: "images/marker-icon2.png",
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [0, -41]
        });
   // on met les icone dans un tableau
  // icones={icone,icone1,icone2};
   icones=[icone,icone1,icone2,icone3,icone4,icone5,icone6,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2,icone2];

   ////// PanelContrôle Gestion du panneau de contrôle
   var info = L.control();   
   info.onAdd  = function name(mymap) {
       this._div = L.DomUtil.create('div','CartePanelContrôle');
       this._div.innerHTML += '<div style="text-align:center;"><span style="font-size:18px;">Points d\'intérêt</span><br /><span style="color:grey;font-size:14px;">(ville d\'Issy-Les-Moulineaux)</span></div>';
       this._div.innerHTML += '<hr/>';
       this._div.innerHTML += '<label for="zone">Type d element  .</label>';
       this._div.innerHTML += '<select name="zone" id="zone"><option value="1">Mairie</option><option value="2">Entrée</option><option value="3">Toilettes</option><option value="4">Poste de secours</option><option value="5">Parking</option><option value="6">Restaurantion</option><option value="11">Zone 1</option><option value="12">Zone 2</option><option value="13">Zone 3</option><option value="13">Zone 4</option></select>';
       this._div.innerHTML += '<div><label for="name">Nom</label><input type="text" name="name" id="name"></div>';
       this._div.innerHTML += '<hr/>';
       this._div.innerHTML += '<div><label for="lat">.Latitude </label><input type="text" name="lat" id="lat" readonly></div>';
       this._div.innerHTML += '<div><label for="lon">Longitude </label><input type="text" name="lon" id="lon" readonly></div>';
       this._div.innerHTML += '<hr/>';
       this._div.innerHTML += '<button name="save"  onclick="SavePoint()">Enregistrer</button>';
//       this._div.innerHTML += '<hr/>';
       return this._div;
   }
   //info.addTo(mymap);

//   var map = new L.Map("map", {
//    center: new L.LatLng(48.825, 2.27),
//    zoom: 15,
//    layers: [OpenStreetMap_BlackAndWhite],
//});
   

//   stamen = new L.StamenTileLayer("toner-lite");
//   var command = L.control({position: 'topright'});//  topleft
//   command.onAdd = function (map) { mymap
//       var div = L.DomUtil.create('div', 'command');
//       div.innerHTML += '<div style="text-align:center;"><span style="font-size:18px;">Points d\'intérêt</span><br /><span style="color:grey;font-size:14px;">(ville d\'Issy-Les-Moulineaux)</span></div>';
// //       for (var i = 0; i < cats.length; i++) {
// //           div.innerHTML += '<form><input id="' + cats[i]["id"] + '" type="checkbox"/>' + cats[i]["label"] + '</form>';
//div.innerHTML += '<form><input id="1" type="checkbox"/> Hello Word </form>';
// //       }
//       return div;
//   };
//   command.addTo(mymap);



  ////// PanelContrôle Gestion du panneau de contrôle fin
  APIGetEmplacementAll();
    
    /////////////////////////////////////////
   console.log("********  MAIN 0 ***********");
   console.table(TableauEmplacements); //.emplacement verifie les donnees serialisees
   console.log("********  MAIN 1 ***********");  

//jppDell

   // totototot=3
    villes = {
//        "KIRCHHEIM Mairie2": { "lat": 48.609550675531295, "lon": 7.496463060379029 }
//                ,"Entre 1 ": { "lat": 48.61719362882016, "lon": 7.50194549560547 }
//                ,"Entre 2": { "lat": 48.60778784416136, "lon": 7.493737936019898 }
//                ,"Quimper": { "lat": 48.60691527306896, "lon": 7.496350407600404 }
//                ,"Bayonne": { "lat": 43.500, "lon": -1.467 }
    };

    //console.table(villes);
 
    var tableauMarqueurs = [];



    // lire les information de la base de donne en AJAX --------------------------------------------------------------------
///   let xmlhttp = new XMLHttpRequest();
///
///    //xmlhttp.open("GET","http://192.168.0.7/demo/osm/api/brocante/liste.php"); // JPPserveur 
///    //xmlhttp.send(null);
///    xmlhttp.onreadystatechange = () =>{
///        // La transaction est terminée ?
///        if(xmlhttp.readyState==4){
///            // Si la transaction est un succès
///            if(!(xmlhttp.status ==200)){
///                // On affiche le code d'erreur deans la console 
///                console.log(xmlhttp.statusText);
///            }else{
///                // On traite les données reçues
///                //console.log(xmlhttp.responseText); //verifie la connextion a l'api
///                let donnees = JSON.parse (xmlhttp.responseText);
///               // console.log(donnees); //verifie les donnees serialisees
///               // console.table(donnees.emplacement); //verifie les donnees serialisees
/// /// transposition ok 
///                if(donnees != null){
///                    // On boucle sur les données (ES8)
///                    Object.entries(donnees.emplacement).forEach(emplacement => {
///                    // Ici j'ai un seul emplacement
///                    //console.table(emplacement[1]); //verifie l'info de l'objet
///                    //console.log(emplacement[1].nom); //verifie l'info de l'objet
///
///                    //    let marker = L.marker([emplacement[1].lat,emplacement[1].lon]).addTo(mymap);
///
///                    // On met le popup
///                    //marker.bindPopup("<p>"+emplacement[1].nom+"</p>");
///
///                    // On crée le marqueur et on lui attribue une popup
///                   // var marqueur = L.marker([villes[ville].lat, villes[ville].lon], {icon: icone}); //.addTo(mymap); Inutile lors de l'utilisation des clusters
///                  //  marqueur.bindPopup("<p>"+ville+"</p>");
///
///                    });
///                }
///            }
///        }
///    }
///
///    xmlhttp.open("GET","http://192.168.0.7/demo/osm/api/brocante/liste.php"); // JPPserveur 
///
///    xmlhttp.send(null);
///   /// lire les information de la base de donne en AJAX --------------------------------------------------------------------
   

    // rechercher le gps par l'adresser 
    //document.querySelector("#adresse").addEventListener("blur",getCity);

    var marqueurs = L.markerClusterGroup();

    
                // On parcourt les différentes villes
                for(ville in villes){
                    // On crée le marqueur et on lui attribue une popup
                    var _marqueur = L.marker([villes[ville].lat, villes[ville].lon], {
                        icon: icone//},{
                        // On rend le marqueur déplaçable
                        ,draggable: true
                        ,sourceTarget : 24
                        }
                    );

                    _marqueur.on('dragend', function(e) {
                        console.log(e)
                        pos = e.target.getLatLng();
                        document.querySelector("#lat").value=pos.lat;
                        document.querySelector("#lon").value=pos.lng;
                    });
                         //.addTo(mymap); Inutile lors de l'utilisation des clusters
 //                   var marqueur = L.marker([villes[ville].lat, villes[ville].lon]); //.addTo(mymap); Inutile lors de l'utilisation des clusters
                    _marqueur.bindPopup("<p>"+ville+"</p>");
                    marqueurs.addLayer(_marqueur); // On ajoute le marqueur au groupe
    
                    // On ajoute le marqueur au tableau
                    tableauMarqueurs.push(marqueur);
                    //console.log(tableauMarqueurs);
                    //console.table(tableauMarqueurs[1]); //verifie l'info de l'objet
                }
                // On regroupe les marqueurs dans un groupe Leaflet
                var groupe = new L.featureGroup(tableauMarqueurs);
    
                // On adapte le zoom au groupe
                //carte.fitBounds(groupe.getBounds().pad(0.5));
    
                mymap.addLayer(marqueurs);
    
                console.log("********  MAIN 4 ***********");
                console.table(TableauEmplacements);
                console.log("********  MAIN 5 ***********");


}

function mapClickDragstart(e) {
    console.log(e)
}    

/**
 * Cette fonction se déclenche au clic, crée un marqueur et remplit les champs latitude et longitude
 * @param {event} e 
 */
function mapClickListen(e) {
console.log(e)

    // On récupère les coordonnées du clic
    pos = e.latlng
    console.log(pos)
    // On crée un marqueur
    addMarker(pos)

    // On affiche les coordonnées dans le formulaire
    document.querySelector("#lat").value=pos.lat
    document.querySelector("#lon").value=pos.lng
}

/**
 * Ajoute un marqueur sur la carte
 * @param {*} pos 
 */
function addMarker(pos){
  //  let marqueur = L.marker(pos) sera declare en variable global
   // const zone
    // On vérifie si le marqueur existe déjà
    if (marqueur != undefined) {
        // Si oui, on le retiresS
        mymap.removeLayer(marqueur);
    }
    if (cercle != undefined) {
        // Si oui, on le retiresS
        mymap.removeLayer(cercle);
    }
    if (document.querySelector("#zone").value<10) {
        marqueur = L.marker(
            pos,  {
                // On rend le marqueur déplaçable
                draggable: true
                ,title:  "tototot"
                //,alt: "itititti"
            }
        ); 
    // On écoute le glisser/déposer et on met à jour les coordonnées
        marqueur.on('dragend', function(e) {
        // marqueur.on('drag', function(e) {
            pos = e.target.getLatLng();
            document.querySelector("#lat").value=pos.lat;
            document.querySelector("#lon").value=pos.lng;
        });
        // On ajoute le marqueur
       marqueur.addTo(mymap);
    } else {
        cercle = L.circle( pos, {
            draggable: true,
            color: 'red',
            fillColor: 'red',
            fillOpacity: 0.5,
            radius: 2.5,
            alt: "New Cercle "
        });
    
    // On crée le marqueur aux coordonnées "pos"
        cercle.on('dragend', function(e) {
        // marqueur.on('drag', function(e) {
            pos = e.target.getLatLng();
            document.querySelector("#lat").value=pos.lat;
            document.querySelector("#lon").value=pos.lng;
        });
        // On ajoute le marqueur
        cercle.addTo(mymap);
    }
}


/**
 * Récupérer les coordonnées de l'adresse et placer le marqueur
 */
function getCity(){
    // On "fabrique" l'adresse complète (des vérifications préalables seront nécessaires)
    let adresse = document.querySelector("#adresse").value + ", " + document.querySelector("#cp").value+ " " + document.querySelector("#ville").value;

    // console.log(adresse)
    // On initialise la requête Ajax
    const xmlhttp = new XMLHttpRequest

    // On ouvre la requête
    xmlhttp.open('get', `https://nominatim.openstreetmap.org/search?q=${adresse}&format=json&addressdetails=1&limit=1&polygon_svg=1`)

    // On détecte les changements d'état de la requête
    xmlhttp.onreadystatechange = () => {
        // Si la requête est terminée
        if(xmlhttp.readyState == 4){
            // Si nous avons une réponse
            if(xmlhttp.status == 200){
                // On récupère la réponse
                let response = JSON.parse(xmlhttp.response)

                //console.log(response)

                // On récupère la latitude et la longitude
                let lat = response[0]['lat']
                let lon = response[0]['lon']

                // On écrit les valeurs dans le formulaire
                document.querySelector("#lat").value= lat;
                document.querySelector("#lon").value= lon;

                // On crée le marqueur
                pos = [lat, lon];
                addMarker(pos);

                // On centre la carte sur l'adresse
                mymap.setView(pos, 18);
            }
        }
    }

    // On envoie la requête
    xmlhttp.send();
   
}

/** ********************************************************************************
 *  appel au methode API CRUD de emplacement
 */

/**
 * get  emplacement
 */
 function APIGetEmplacementAll(){
    // lire les information de la base de donne en AJAX 
    let donnees // les donne a retourner 
    let xmlhttp_Get = new XMLHttpRequest();
    // on definut l'URL de L'API et on l'appel
    // ici on rand l'URL unique en rajoutant l'instant du clique (ts corespond à time stamp)
 //   xmlhttp_Get.open("GET","http://192.168.0.7/demo/osm/api/brocante/liste.php?ts="+ new Date().getTime()); // JPPserveur 
    xmlhttp_Get.open("GET","/api/brocante/liste.php?ts="+ new Date().getTime()); // JPPserveur 
    xmlhttp_Get.send(null);

    xmlhttp_Get.onreadystatechange = () =>{
      // La transaction est terminée ?
      if(xmlhttp_Get.readyState==4){ 
        // Si la transaction est un succès
        if(!(xmlhttp_Get.status ==200)){
            // On affiche le code d'erreur deans la console 
            console.log(xmlhttp.statusText);
        }else{
            // On traite les données reçues
            donnees = JSON.parse (xmlhttp_Get.responseText); // deserialisees les donnees
            TableauEmplacements = donnees.emplacement;
            
            if(TableauEmplacements != null){
                console.log("*** Fonction *****  for --- de l'affichage des emplacament ***********");
            
                // On boucle sur les données (ES8)
                for (let index = 0; index < TableauEmplacements.length; index++) {
                    var emplacement = TableauEmplacements[index];
                    if(emplacement.zone<10){
                    // Ici j'ai un seul emplacement et je le rajoute dans un tableau de marqueur 
                    TableauMarqueur[index] = L.marker([emplacement.lat,emplacement.lon],{
                        icon: icones[emplacement.zone]//.alt="totot"
                        //,id: emplacement.id
                        //,title = "totot"
                        //,dragstart(mapClickDragstart)
                        ,draggable:  true //false
                    }).addTo(mymap);
                    TableauMarqueur[index].bindPopup("<p>"+emplacement.nom+"<p>");
                    // pour L'Update
                    TableauMarqueur[index].on('dragstart', function(e) {
                        UpdateMarqueur = e.target.getLatLng();
                        document.querySelector("#name").value=UpdateMarqueur;
                    });
                    TableauMarqueur[index].on('drag', function(e) {
                        pos = e.target.getLatLng();
                        document.querySelector("#lat").value=pos.lat;
                        document.querySelector("#lon").value=pos.lng;
                    });
                    TableauMarqueur[index].on('dragend', UpDatePoint);
                    
                   // function(e) {
                   //     pos = e.target.getLatLng();
                   //     document.querySelector("#lat").value=pos.lat;
                   //     document.querySelector("#lon").value=pos.lng;
                   // });
                    
                    // pour la supressionS
                    TableauMarqueur[index].on('dblclick', DellPoint);

                    // down / dragstart / predrag / drag / dragend	
                    // click / dblclick / mousedown / mouseup / mouseover / mouseout / mousemove / contextmenu / keypress / keydown / keyup / preclick 
                    }else{
                        TableauCercle[index] = L.circle( [emplacement.lat,emplacement.lon], {
                            draggable: true,
                            color: 'red',
                            fillColor: 'red',
                            fillOpacity: 0.5,
                            radius: 2.5,
                            title: emplacement.nom
                        }).addTo(mymap);
                        TableauCercle[index].bindPopup("<p>"+emplacement.nom+"<p>");
                        TableauCercle[index].bindTooltip(emplacement.nom);
                    }
                }

            }else{

            }

            donnees = donnees.emplacement;
            console.log("********  func API 2 ***********")
            
            //console.table(donnees); //.emplacement verifie les donnees serialisees
            console.table(TableauEmplacements); //.emplacement verifie les donnees serialisees
            console.log("********  func API 3 ***********")
            //return donnees//.emplacement;
         }
      }
    }    
 }


/**
 * Save  emplacement
 */
function SavePoint() {
     // On vérifie si les champs sont vide
     if(true){
        // On crée un objet JS pour le message
        let donnees = {};  
        donnees["nom"] = document.querySelector("#name").value ;
        donnees["zone"] = document.querySelector("#zone").value;
        donnees["lat"] = document.querySelector("#lat").value;
        donnees["lon"] = document.querySelector("#lon").value;


       // donnees["emplacement"] = emplacement;
        //donnees[""] = emplacement;   
        console.log("----donnees-----");
        console.log(donnees);
        // On convertit les données en json
        let donneesJson = JSON.stringify(donnees);
        //let donneesJson = JSON.stringify(emplacement);
        console.log("----donneesJson-----");
        console.log(donneesJson);

        // On envoie les données en POST en Ajax
        // On instancie XMLHttpRequest
        let xmlhttp = new XMLHttpRequest();

        // On gère la réponse
        xmlhttp.onreadystatechange = function(){
            // on verifie si la requelle est teminer (4) puis le statue 
            if(this.readyState == 4){
                //console.log("---------------------------------- \n retour serveur  code Status : " +this.status );
                //console.log(this.response);
                if (this.status == 201) {
                    // l'emregistrment a fontionner 
                    // On a une réponseZ
                    // On efface le champ texte
                    APIGetEmplacementAll();

                }else{
                    
                    let response = JSON.parse(this.response);
                    alert(response.message)
                    
                }
            }
        }

        // On ouvre la() requête 
       // xmlhttp.open("POST","http://192.168.0.7/demo/osm/api/brocante/creer.php");
        xmlhttp.open("POST","/api/brocante/creer.php");

        // On envoie la requête avec les données
        xmlhttp.send(donneesJson);
     }
}

function UpDatePoint(e) {
        const pos = e.target.getLatLng();
        let donnees = {};
        // donnees["id"] = 31; todoJPP
//        donnees["nom"] = document.querySelector("#name").value ;
//        donnees["zone"] = document.querySelector("#zone").value;
        donnees["old_lat"] = UpdateMarqueur.lat.toString();
        donnees["old_lon"] = UpdateMarqueur.lng.toString();
        //les nouvelle coordonnees
        donnees["lat"] = pos.lat.toString();
        donnees["lon"] = pos.lng.toString();

        console.log(donnees);
    if (!confirm('Voullez vous Metre a jour le marqueur ')) {
        console.log('V V V - le marqueur n est pas Mise a jour.');
        // On récupère les coordonnées du clic
        pos = e.latlng
        console.log(pos)
        
        // On affiche les coordonnées dans le formulaire
        document.querySelector("#lat").value=pos.lat
        document.querySelector("#lon").value=pos.lng
    } else {
        console.log('X X X - le marqueur va etre pas Mise a jour.');

     // On vérifie si les champs sont vide
    // if(true){
        // On crée un objet JS pour le message
         






       // donnees["emplacement"] = emplacement;
        //donnees[""] = emplacement;   
        console.log("----donnees-----");
        console.log(donnees);
        // On convertit les données en json
        let donneesJson = JSON.stringify(donnees);
        //let donneesJson = JSON.stringify(emplacement);
        console.log("----donneesJson-----");
        console.log(donneesJson);

        // On envoie les données en POST en Ajax
        // On instancie XMLHttpRequest
        let xmlhttp = new XMLHttpRequest();

        // On gère la réponse
        xmlhttp.onreadystatechange = function(){
            // on verifie si la requelle est teminer (4) puis le statue 
            if(this.readyState == 4){
                console.log("---------------------------------- \n retour serveur  code Status : " +this.status );
                console.log(this.response);
                if (this.status == 201) {
                    // l'emregistrment a fontionner 
                    // On a une réponseZ
                    // On efface le champ texte
                    APIGetEmplacementAll();

                }else{
                    let response = JSON.parse(this.response);
                    alert(response.message)           
                }
            }
        }
        // On ouvre la() requête 
//        xmlhttp.open("PUT","http://192.168.0.7/demo/osm/api/brocante/modifier.php");
        xmlhttp.open("PUT","/api/brocante/modifier.php");
        // On envoie la requête avec les données
        xmlhttp.send(donneesJson);
     }
}

function DellPoint(e) {
    console.log(e)
        if (!confirm('Voullez vous suprimer le marqueur ')) {
            console.log('V V V - le marqueur est conserver.');
            // On récupère les coordonnées du clic
            pos = e.latlng
            console.log(pos)
            
            // On affiche les coordonnées dans le formulaire
            document.querySelector("#lat").value=pos.lat
            document.querySelector("#lon").value=pos.lng
        } else {
            console.log('X X X - le marqueur est suprimer.');
                
   
//    var emplacement = {
//        nom: document.querySelector("#name").value,
//        zone: document.querySelector("#zone").value,
//        lat: document.querySelector("#lat").value,
//        lon: document.querySelector("#lon").value
//     }; 

     // On vérifie si les champs sont vide
     if(true){
        // On crée un objet JS pour le message
        let donnees = {}; 
       donnees["lat"] = e.latlng.lat.toString();
       donnees["lon"] = e.latlng.lng.toString();
       // donnees["id"] = 31;


       // donnees["emplacement"] = emplacement;
        //donnees[""] = emplacement;   
        console.log("----donnees-----");
        console.log(donnees);
        // On convertit les données en json
        let donneesJson = JSON.stringify(donnees);
        //let donneesJson = JSON.stringify(emplacement);
        console.log("----donneesJson-----");
        console.log(donneesJson);
        console.table(donneesJson);


        // On envoie les données en POST en Ajax
        // On instancie XMLHttpRequest
        let xmlhttp = new XMLHttpRequest();

        // On gère la réponse
        xmlhttp.onreadystatechange = function(){
            // on verifie si la requelle est teminer (4) puis le statue 
            if(this.readyState == 4){
                console.log("---------------------------------- \n retour serveur  code Status : " +this.status );
                console.log(this.response);
                if (this.status == 201) {
                    // la supression  a fontionner 
                    
                    // on referchie la carte
                    APIGetEmplacementAll();

                }else{
                    
                    let response = JSON.parse(this.response);
                    alert(response.message)
                    
                }
            }
        }

        // On ouvre la() requête 
//        xmlhttp.open("DELETE","http://192.168.0.7/demo/osm/api/brocante/supprimer.php");
        xmlhttp.open("DELETE","/api/brocante/supprimer.php");
        // On envoie la requête avec les données
        xmlhttp.send(donneesJson);
     }

        }
    }


 /**
  * APIGetObjet[All] 
  * └―┘└―┘└―――┘└―――┘
  *  |  |   |    └―> presision sur la methode 
  *  |  |   └―> l'Objet trater 
  *  |  └―> le type de methode 
  *  └―> definit que sa fait appel as des api REST
  * |l˾̶→
  *┘ꓔꟷꞱ└Ⱶ┘−│‐‒–‖Ⴡ―Ͱͱ˨˧˩˦˥
  *
  */