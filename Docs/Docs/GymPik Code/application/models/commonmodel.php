<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Commonmodel extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    /**
     *
     * @param type $table
     * @param type $data
     * @return type 
     */
    public function _insert($table, $data){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }
    /**
     *
     * @param type $table
     * @param type $data
     * @param type $condition
     * @return type 
     */
    public function _update($table, $data, $condition){
        $this->db->update($table, $data, $condition);
        return $this->db->affected_rows() ? $this->db->affected_rows(): true;
    }
    /**
     *
     * @param type $table
     * @param type $condition
     * @return type 
     */
    public function _delete($table, $condition){
        $this->db->delete($table, $condition);
        return $this->db->affected_rows();
    }
	
	/*
	 *function to get the site basic text and links 
	 *@params database key 
	 */
	 
	public function load_setting($key){
		$result = $this->db->select("site_setting.value")->get_where("site_setting", array("key" => $key));
		if($result->num_rows() > 0){ 
			$res = $result->row();
			return $res->value;
		}else{
			return null;
		} 
	}
	/*
	 * User profile completion status
	 */
	public function profile_staus($userID){
		$result = $this->db->select("gympik_member.profile")->get_where("gympik_member", array("id" => $userID));
		if($result->num_rows() > 0){ 
			$res = $result->row();
			return $res->profile;
		}else{
			return null;
		}
	}
	
	/*
	 * user pic fetch
	 */
	public function user_pic($userID){
		$result = $this->db->select("gympik_member.profile_pic")->get_where("gympik_member", array("id" => $userID));
		if($result->num_rows() > 0){ 
			$res = $result->row();
			if($res->profile_pic != ''){
				return '<img src="'.base_url()."profile_pic/".$res->profile_pic.'" height="30" class="pro_pic"/>';
			}else{
				return null;
			}
		}else{
			return null;
		}
	}
	
	/*
	 * this checks for the user cookie 
	 * if found he makes him login 
	 */
	public function cookieHandler(){
		$this->load->helper('cookie');
		$unam = get_cookie('unam');
		$pass = get_Cookie('pass');
		$login = get_Cookie('login');

		if( $login == 'yes'){
			$query = $this->db->select("gympik_member.*")
							  ->get_where("gympik_member", array("email" => $unam,'status'=>'1','verified'=>'1'));
			if ($query->num_rows() > 0){
				$row = $query->row();
				if($row->password == $pass){
					$this->load->model('User_model');
					$this->site_santry->do_login($this->User_model->user_auth_data($row->id));
				}
			}else{
				return false;
			}
		
		}else{
			return null;
		}
	
	}
	 
	 
}

?>
