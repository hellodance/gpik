<?php

class basic_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * @Autohr : Rahul
     * @return : null if not found
     */
    public function get_user_by_id($id) {
        if (is_integer($id)) {
            $result = $this->db->select("admins.*")
                    ->get_where("admins", array("id" => $id));
            return $result->num_rows() > 0 ? $result->row() : null;
        }
        return false;
    }
	
	public function get_site_setting(){
        $result = $this->db->select("site_setting.*")->get("site_setting");
        return $result->num_rows() > 0 ? $result->result() : null;
	}
	
	public function setting_updater( $value,$id){
		$data = array('value' => $value);
		$this->db->where('id', $id);
		$this->db->update('site_setting', $data); 
	}

}