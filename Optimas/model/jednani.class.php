<?php
/**
 * @access public
 * @author Kryštof Košut
 */
class jednani {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }
	 /**
	 	* Přidání jednaní do databaze
		* @param array (row => value)
	  * @return int nebo false podle vysledku (v pripade uspechu ID prave pridaneho jednani)
	  */
	 public function addJednani($insert_jednani)
	 {
		 $add_jednani = $this->_mysqli->insert("jednani", $insert_jednani);
		 if ($add_jednani) {
			 $jednani_id = $this->_mysqli->lastid();
			 return $jednani_id;
		 }
		 else {
			 return FALSE;
		 }
	 }
	 /**
	 	* Získání jednání pomocí id z databaze
		* @param int id jednani
	  * @return array jednani
	  */
	 public function getJednani($id)
	 {
		 $query = "SELECT * FROM jednani WHERE id={$id}";
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
	 /**
	 	* Získá všechy jednání uložené v databázi
		* @param limit (nepovinny)
	  * @return array vsech jednaní
	  */
	 public function getAllJednani($limit = NULL)
	 {
		 $query = "SELECT * FROM jednani";
		 if ($limit != NULL) {
			 $query .= " LIMIT ".$limit;
		 }
		 $result = $this->_mysqli->get_results($query);
		 return $result;
	 }
	 /**
	 	* aktualizuje jednaní v databazi
		* @param array CO (row => value)
		* @param array KDE (row => value)
	  * @return true nebo false
	  */
	 public function editJednani($update,$where)
	 {
		 $result 	= $this->_mysqli->update( 'jednani', $update, $where, 1 );
		 if ($result) {
			 return true;
		 } else {
			 return false;
		 }
	 }
	 /**
	 	* Získá jednání (všechny) podle id klienta
		* @param int klient_id
		* @param str select = "*" (nepovinne)
		* @param int limit = 1 (nepovinne)
		* @param str order = "" (nepovinne)
	  * @return array vsech dopravcu
	  */
	 public function getJednaniByKlient($klient_id, $select = "*", $limit = 1, $order="")
	 {
		 $query = "SELECT ".$select." FROM jednani WHERE klient_id={$klient_id}";

		 if ($limit == 1) {
					 $query .= " LIMIT ".$limit." ".$order;
					 if( $this->_mysqli->num_rows( $query ) > 0 )
					 {
						 $result = $this->_mysqli->get_row( $query );
						 return $result;
					 }
					 else {
						return false;
					 }
			}
			 elseif ($limit == 0)
			 {
				 $result = $this->_mysqli->get_results( $query." ".$order );
				 return $result;
			 }
				else {
				 return FALSE;
			 }
	 }
	 /**
	 	* vymazání jednaní podle id
		* @param int id
	  * @return true nebo false
	  */
	 public function deleteJednani($id)
	 {
		 $delete = array("id" => $id );

		 $deleted = $this->_mysqli->delete("jednani", $delete);
		 if ($deleted) {
			 return TRUE;
		 } else {
			 return FALSE;
		 }
	 }
	 /**
	 	* Získat jednání podle sztavu (vyrizene/nevyrizene)
		* @param bool stav (true = vyrizene, false = nevyrizene)
		* @param bool count = false (kdyz true, vrati pocet jednani (podle stavu))
	  * @return array jednaní podle stavu nebo int pokud count, pripadne false
	  */
	 public function getJednaniByStav($stav, $count = false)
	 {
		 if ($stav === true) {
		 	$query = "SELECT * FROM jednani WHERE datumvyrizeni != 0000-00-00";
		} elseif ($stav === false) {
			$query = "SELECT * FROM jednani WHERE datumvyrizeni = 0000-00-00";
		} else {
			return false;
		}
			if ($count === true) {
				$num_rows = $this->_mysqli->num_rows( $query );
				return $num_rows;
			} else {
				$result = $this->_mysqli->get_results( $query );
				return $result;
			}
	 }

 } // END OF CLASS
 ?>
