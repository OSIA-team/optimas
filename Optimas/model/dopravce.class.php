<?php
/**
 * objekt pro manipulaci s tabulkou "doprace" v databazi (Optimas)
 * @access public
 * @author Kryštof Košut
 */
class dopravce {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }
	 /**
	 	* Získá všechy dopravce uložené v databázi
		* @param limit (nepovinny)
	  * @return array vsech dopravcu
	  */
   public function getAllDopravce($limit = NULL)
   {
		 $query = "SELECT * FROM dopravce";
		 if ($limit != NULL) {
			 $query .= " LIMIT ".$limit;
		 }
		 $result = $this->_mysqli->get_results($query);
		return $result;
   }
	 /**
	  * Vložení dopravce do databaze
	  * @param array (row => value)
	  * @return TRUE nebo FALSE podle vysledku z DB
	  */
   public function addDopravce($insert_dopravce)
   {
		 $add_dopravce = $this->_mysqli->insert("dopravce", $insert_dopravce);
		 if ($add_dopravce) {
			 return TRUE;
		 }
		 else {
			 return FALSE;
		 }
   }
	 /**
		* Navráceni jednoho dopravce podle ID z databaze
		* @param int id
		* @return array or false
		*/
	 public function getDopravceById($id)
	 {
		 $query = "SELECT * FROM dopravce WHERE id={$id}";
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

   public function removeDopravce($id)
   {
     # code...
   }

} // END OF CLASS
?>
