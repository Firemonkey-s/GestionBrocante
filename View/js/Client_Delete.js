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
				
				var pressedkey = document.getElementById('presstouch');
				pressedkey.innerHTML = resultat;
				

			}else{
					alert("Erreur HTTP N˚"+ xhr.status);
			}
		}
	}
	
	function prepareDelete()
	{
		xhr = new XMLHttpRequest();
		
		//alert("ajax");
		
		//ouverture asynchrone
		//xhr.open("get","api/Server_Delete.php",true);
		
		xhr.open("post","http://localhost/ProjetBrocante/api_test/LocEmp/Server_Delete.php",true);
		
		xhr.onreadystatechange = traitementResultat ;
		
		//envoi de la requête
		xhr.send(null);	
	}
	
	
	
	
	
	
	
	
	
	
	