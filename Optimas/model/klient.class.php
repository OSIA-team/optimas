<?php
/**
 * @access public
 * @author Kryštof Košut
 */
class klient {
	private $_mysqli;


	 public function __construct($mysqli)
 	 {
 	 	$this->_mysqli = $mysqli;
 	 }
   /**
    * @param array (what => value)
    */
   public function addKlient($insert_klient)
   {
     $add_klient = $this->_mysqli->insert("klient", $insert_klient);
     if ($add_klient) {
       $klient_id = $this->_mysqli->lastid();
       return $klient_id;
     }
     else {
       return FALSE;
     }
   }

   public function getKlient($id)
   {
     $query = "SELECT * FROM klient WHERE id={$id}";
      if( $this->_mysqli->num_rows( $query ) > 0 )
      {
        $result = $this->_mysqli->get_row( $query );
				//	die(var_dump($result));
        return $result;
      }
      else
      {
        return FALSE;
      }
   }

   public function getKlienti($limit = NULL, $count = FALSE, $where = NULL)
   {
    $query = "SELECT * FROM klient";
    if ($limit != NULL) {
      $query .= " LIMIT ".$limit;
    }
		if ($where != NULL) {
			$query .= " WHERE ".$where;
		}
		if ($count === TRUE) {
			$num_rows = $this->_mysqli->num_rows( $query );
			return $num_rows;
		} else {
			$result = $this->_mysqli->get_results($query);
			return $result;
		}

   }

   /**
    * @param array update (what => value)
    * @param array where (what => value)
    */
   public function editKlient($update, $where)
   {
     $result 	= $this->_mysqli->update( 'klient', $update, $where, 1 );
     if ($result) {
       return true;
     } else {
       return false;
     }
   }

	 public function deleteKlient($id)
	 {
		 $delete = array("id" => $id );

		 $deleted = $this->_mysqli->delete("klient", $delete);
		 if ($deleted) {
			 return TRUE;
		 } else {
			 return FALSE;
		 }
	 }

} // END OF CLASS

?>
