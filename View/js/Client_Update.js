///-----------------------------------------------------------------
///   Namespace:      <Class Namespace>
///   Class:          <Class Name>
///   Description:    Appel Ajax
///   Author:         Klumpp Gilles                    Date: 09/02/2021
///   Notes:          <Notes>
///   Revision History:
///   Name:           Date:        Description:
///-----------------------------------------------------------------



//variables globales
var xhr;

//callback-manager
	function traitementResultat() 
	{
		if(xhr.readyState==4) {
			
			//alert("ready");
			
			if(xhr.status==200) {
					
				var resultat = xhr.responseText ;
				
				//alert(resultat);
				
				var pressedkey = document.getElementById('presstouch');
				pressedkey.innerHTML = resultat;
				

			}else{
					alert("Erreur HTTP N˚"+ xhr.status);
			}
		}
	}
	
	//prepare() est lancée après que les champs ont été saisies
	function prepareUpdate()
	{
		xhr = new XMLHttpRequest();
		
		//objet javascript
		var objetJS = new Object();
		
		//alert(typeof Num);
		
		objetJS.num = Num;
		objetJS.zone = Zone;
		objetJS.localite = Localite;
		objetJS.lat = Lat;
		objetJS.longit = Long;
		
		objetJS.coordx = CoordX;
		objetJS.coordy = CoordY;
			
		objetJS.isreserved = IsReserved;
		objetJS.metrelin = MetreLin;
		
		alert(objetJS.num+","+objetJS.zone);
		
		//encodage JSON
		//toString remplace toJSONString 
		var parametres = JSON.stringify(objetJS);
		
			
		//ouverture asynchrone
		//xhr.open("post","api/Server_Update.php",true);
		
		xhr.open("post","http://localhost/ProjetBrocante/api_test/LocEmp/Server_Update.php",true);
		
		xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded")
		
		xhr.onreadystatechange = traitementResultat ;
			
		//envoi de la requête avec un paramètre
		xhr.send(parametres);	
	}
	
	
	
	
	
	
	
	
	
	
	