<?php
/**
 * @access public
 * @author Kryštof Košut
 */
class stroj {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }

	 public function addStroj($insert_stroj)
	 {
		 $add_stroj = $this->_mysqli->insert("stroj", $insert_stroj);
		 if ($add_stroj) {
			 $stroj_id = $this->_mysqli->lastid();
			 return $stroj_id;
		 }
		 else {
			 return FALSE;
		 }
	 }

	 public function getStroj($id)
	 {
		 $query = "SELECT * FROM stroj WHERE id={$id}";
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

	 public function getStrojeByKlient($klient_id, $select = "*", $limit = 1, $order="")
	 {
		 $query = "SELECT ".$select." FROM stroj WHERE klient_id={$klient_id}";

		 if ($limit === 1) {
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

	 public function getStroje($limit = NULL, $count = FALSE)
   {
    $query = "SELECT * FROM stroj";
    if ($limit != NULL) {
      $query .= " LIMIT ".$limit;
    }
		if ($count === TRUE) {
			$num_rows = $this->_mysqli->num_rows( $query );
			return $num_rows;
		} else {
			$result = $this->_mysqli->get_results($query);
			return $result;
		}

   }

	 public function editStroj($update, $where)
   {
		 $this->_mysqli->fk(0);
     $result 	= $this->_mysqli->update( 'stroj', $update, $where, 1 );
		 $this->_mysqli->fk(1);
     if ($result) {
       return true;
     } else {
       return false;
     }
   }

	 public function deleteStroj($id)
	 {
		 $delete = array("id" => $id );

		 $deleted = $this->_mysqli->delete("stroj", $delete);
		 if ($deleted) {
			 return TRUE;
		 } else {
			 return FALSE;
		 }
	 }


} // END OF CLASS
?>
