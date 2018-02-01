<?php
/**
 * objekt pro manipulaci s tabulkou "produkt" v databazi (Optimas)
 * @access public
 * @author Kryštof Košut
 */
class produkt {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }
	 /**
	 	* Získá všechy produkt uložené v databázi
		* @param limit (nepovinny)
	  * @return array vsech dopravcu
	  */
   public function getAllProdukt($limit = NULL)
   {
		 $query = "SELECT * FROM produkt";
		 if ($limit != NULL) {
			 $query .= " LIMIT ".$limit;
		 }
		 $result = $this->_mysqli->get_results($query);
		return $result;
   }
	 /**
	  * Vložení produkt do databaze
	  * @param array (row => value)
	  * @return TRUE nebo FALSE podle vysledku z DB
	  */
   public function addProdukt($insert_produkt)
   {
		 $add_produkt = $this->_mysqli->insert("produkt", $insert_produkt);
		 if ($add_produkt) {
			 return TRUE;
		 }
		 else {
			 return FALSE;
		 }
   }
	 /**
		* Navráceni jednoho produkt podle ID z databaze
		* @param int id
		* @return array or false
		*/
	 public function getProduktById($id)
	 {
		 $query = "SELECT * FROM produkt WHERE id={$id}";
			if( $this->_mysqli->num_rows( $query ) > 0 )
			{
				$result = $this->_mysqli->get_row( $query );
				return $result;
			}
			else
			{
				return FALSE;
			}
	 }

   public function removeprodukt($id)
   {
     # code...
   }

} // END OF CLASS
?>
