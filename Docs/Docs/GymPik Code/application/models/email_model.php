<?php

class Email_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	
	/*Admin panel*/
	
	public function list_emails(){
		$result = $this->db->select("email_templates.*")->get("email_templates");
        return $result->num_rows() > 0 ? $result->result() : null;
	}
	
	/*admin panel*/
	public function load_template($id) {
        if (is_integer($id)) {
            $result = $this->db->select("email_templates.*")
                    ->get_where("email_templates", array("id" => $id));
            return $result->num_rows() > 0 ? $result->row() : null;
        }
		
        return false;
    }
}
?>