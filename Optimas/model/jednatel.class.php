<?php
/**
 * @access public
 * @author Kryštof Košut
 */
class jednatel {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }

	 public function addJednatel($insert_jednatel)
	 {
		 $add_jednatel = $this->_mysqli->insert("jednatel", $insert_jednatel);
		 if ($add_jednatel) {
			 $jednatel_id = $this->_mysqli->lastid();
			 return $jednatel_id;
		 }
		 else {
			 return FALSE;
		 }
	 }

		 public function getJednatel($id)
		 {
		 	# code...
		 }
		 /**
		  * LIMIT 1!
		  */
		 public function getJednatelByKlient($klient_id, $select = "*", $limit = 1)
		 {
			 $query = "SELECT ".$select." FROM jednatel WHERE klient_id={$klient_id}";

			 if ($limit === 1) {
						 $query .= " LIMIT ".$limit;
						 if( $this->_mysqli->num_rows( $query ) > 0 )
						 {
							 $result = $this->_mysqli->get_row( $query );
							 //	die("Chybča: ".var_dump($result));
							 return $result;
						 }
						 else {
						 	return false;
						 }
				}
				 elseif ($limit === 0)
				 {
					 $result = $this->_mysqli->get_results( $query );
					 return $result;
				 }
				  else {
					 return FALSE;
				 }

		 }


 } // END OF CLASS
 ?>
