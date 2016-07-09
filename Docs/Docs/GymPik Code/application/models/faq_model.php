<?php

class Faq_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	
	/*Admin panel*/
	
	public function list_faqs(){
		$result = $this->db->select("faq.*")->get("faq");
        return $result->num_rows() > 0 ? $result->result() : null;
	}

  //For front side
	public function list_active_faqs(){
		$result = $this->db->select("faq.*")->get_where("faq", array("status" => '1'));
        return $result->num_rows() > 0 ? $result->result() : null;
	}
	
	/*admin panel*/
	public function load_faq($id) {
        if (is_integer($id)) {
            $result = $this->db->select("faq.*")
                    ->get_where("faq", array("id" => $id));
            return $result->num_rows() > 0 ? $result->row() : null;
        }
		
        return false;
    }
}
?>