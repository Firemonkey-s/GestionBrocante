let $map = document.querySelector('#map')

class LeafletMap {

    constructor(){
        this.map = null; // je conserne l'instance de maps
    } 

    load(element){
//    async load(element){
///       return new Promise((resolve, reject) => {
            // je charge la biblote leafletjs 
//            $script('https://unpkg.com/leaflet@1.7.1/dist/leaflet.js', () => {
                this.map = L.map(element)
                L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                    minZoom: 16,
                    maxZoom: 20,
 
                    //tileSize: 512,
                    //zoomOffset: -1

                }).addTo(this.map);
//                resolve();
///            });
//        });      
    }
}
// /class LeafletMap -------------------------------------------------
const  InitMap =  function(){
 //const  InitMap = async function(){
    let map = new LeafletMap();
    map.load($map)
//    await map.load($map)
}

if ($map !== null) {
    InitMap();
}

// Nous initialisons la carte et nous la centrons sur la mairie  
let map = L.map('Map').setView([48.61015, 7.49662], 17)



L.popup()
 .setLatLng([48.609550675531295,7.496463060379029])
 .setContent("<p>MAirie<p>")
 .openOn(map)