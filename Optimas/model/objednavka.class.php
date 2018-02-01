<?php
/**
 * @access public
 * @author Kryštof Košut
 */
class objednavka {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }

	 public function addObjednavka($insert_objednavka){
		 $add_objednavka = $this->_mysqli->insert("objednavka", $insert_objednavka);
     if ($add_objednavka) {
       $objednavka_id = $this->_mysqli->lastid();
       return $objednavka_id;
     }
     else {
       return FALSE;
     }
	 }

	 public function getObjednavkyByKlient($klient_id, $select = "*", $limit = 1, $order="")
	 {
		 $query = "SELECT ".$select." FROM objednavka WHERE klient_id={$klient_id}";

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

	 public function generateCisloObjednavky()
	 {
	 	$objednavka = "O";
			$year = date('y'); $year_db = date('Y');

				$query = "SELECT id FROM objednavka WHERE YEAR(datumobjednavky) IN ({$year_db}) ORDER BY id DESC LIMIT 1";
				$cislo = $this->_mysqli->get_row( $query );
					//die($cislo['id']);
				$cislo = sprintf('%04d', $cislo['id']+1);


				return $objednavka.$year.$cislo;

	 }
	 /**
	  * @param id id objednavky
	  */
	 public function getObjednavka($id)
	 {
		 $query = "SELECT * FROM objednavka WHERE id={$id}";
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

	 public function editObjednavka($update, $where)
	 {
		 $result 	= $this->_mysqli->update( 'objednavka', $update, $where, 1 );
		 if ($result) {
			 return true;
		 } else {
			 return false;
		 }
	 }
	 /**
	  * @param bool stav (true = vyrizene, false = nevyrizene)
		* @param count = false pocet objednavek k vypisu
		* @param where = NULL jestlize potrebuji hledat nejake WHERE (hlavne kvuli nabidce....)
	  */
	 public function getObjednavkyByStav($stav = NULL, $count = false, $where = NULL)
	 {
		 if ($stav === true) {
		 	$query = "SELECT * FROM objednavka WHERE datumvyrizeni != 0000-00-00";
		} elseif ($stav === false) {
			$query = "SELECT * FROM objednavka WHERE datumvyrizeni = 0000-00-00";
		} elseif ($stav === NULL) {
			$query = "SELECT * FROM objednavka";
		}
		 else {
			return false;
		}

		if ($where != false) {
			if ($stav === true) {
				$query .= " AND ".$where;
			} elseif ($stav === false) {
				$query .= " AND ".$where;
			} elseif ($stav === NULL) {
				$query .= " WHERE ".$where;
			}

		}
			if ($count === true) {
				$num_rows = $this->_mysqli->num_rows( $query );
				return $num_rows;
			} else {
				$result = $this->_mysqli->get_results( $query );
				return $result;
			}
	 }

	 public function deleteObjednavka($id)
	 {
	 	$delete = array("id" => $id );

		$deleted = $this->_mysqli->delete("objednavka", $delete);
		if ($deleted) {
			return TRUE;
		} else {
			return FALSE;
		}
	 }

	 public function zmenStav($id, $value=0)
	 {
		 $result 	= $this->_mysqli->update( 'objednavka', array( 'nabidka' => $value ),
		 array( 'id' => $id ), 1 );

		 if ($result) {
			 return true;
		 } else {
			 return false;
		 }
	 }

	 public function addProduktToObj($objednavka_id, $produkt_id, $kolik)
	 {
		 $insert_produktToObj = array(
			 'objednavka_id' 	=> $objednavka_id,
			 'produkt_id'			=> $produkt_id,
			 'kolik'					=> $kolik
		 );

		 $add_ProduktToObj = $this->_mysqli->insert("objednavka_has_produkt", $insert_produktToObj);
		// die($add_ProduktToObj);
     if ($add_ProduktToObj) {
       // $ProduktToObj_id = $this->_mysqli->lastid();
       return TRUE;
     }
     else {
       return FALSE;
     }
	 }

	 public function getProduktyByObj($id)
	 {
	 	$query = "SELECT *
		FROM objednavka_has_produkt
		JOIN produkt
		ON produkt.id = objednavka_has_produkt.produkt_id
		WHERE objednavka_id = $id";

		$result = $this->_mysqli->get_results( $query );
		return $result;
	 }

	 public function editProduktyObj($objednavka_id, $produkt_id, $kolik)
	 {
		 $update = array(
			 'objednavka_id' 	=> $objednavka_id,
			 'produkt_id'			=> $produkt_id,
			 'kolik'					=> $kolik
		 );

			 $where = array (
				 'objednavka_id' => $objednavka_id
			 );
					 $result 	= $this->_mysqli->update( 'objednavka_has_produkt', $update, $where, 1 );
					 if ($result) {
						 return true;
					 } else {
						 return false;
					 }
	 }

	 public function deleteAllProduktyByObj($objednavka_id)
	 {
		 $delete = array("objednavka_id" => $objednavka_id );

		 $deleted = $this->_mysqli->delete("objednavka_has_produkt", $delete);
		 if ($deleted) {
			 return TRUE;
		 } else {
			 return FALSE;
		 }
	 }

 } // END OF CLASS
 ?>
