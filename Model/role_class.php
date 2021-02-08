<<<<<<< HEAD
  <?php 
	class role_class{
		// Attributs
		private $_roleId;
		private $_titre ;
		
		        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrRole){
			$this->setRoleId($arrRole['RoleId']);		
			$this->setTitre ($arrRole['Titre']);
           
			
		}
		
		// GETTERS
		public function getRoleId(){
			return $this->_roleId;
		}
		
		public function getTitre(){
			return $this->_titre;
		}
		
		
		
		// SETTERS 
		public function setRoleId($intRoleId){
			$this->_roleId = $intRoleId;
		}
		             
		public function setTitre ($strTitre){
			$this->_titre  = $strTitre ;
		}
		
		
		
=======
  <?php 
	class role_class{
		// Attributs
		private $_roleId;
		private $_titre ;
		
		        

		// constructeur
		public function __construct(){
		}
		
		public function hydrate($arrRole){
			$this->setRoleId($arrRole['RoleId']);		
			$this->setTitre ($arrRole['Titre']);
           
			
		}
		
		// GETTERS
		public function getRoleId(){
			return $this->_roleId;
		}
		
		public function getTitre(){
			return $this->_titre;
		}
		
		
		
		// SETTERS 
		public function setRoleId($intRoleId){
			$this->_roleId = $intRoleId;
		}
		             
		public function setTitre ($strTitre){
			$this->_titre  = $strTitre ;
		}
		
		
		
>>>>>>> ad41158f8e1859d681ecaaab29648fd06a51ecb9
	}