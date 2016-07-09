<?php

class User_model extends CI_Model {

    function __construct(){
        parent::__construct();
    }
	
	public function register($data){
		$this->db->insert('gympik_member', $data);
		return $this->db->insert_id();
	}
	
	public function auth_user($email){

		$query = $this->db->select("gympik_member.*")
                    	  ->get_where("gympik_member", array("email" => $email,'status'=>'1','verified'=>'1'));
 		if ($query->num_rows() == 1){
			$row = $query->row();
			return $row;
		}elseif($query->num_rows() == 2){
			$row = $query->result();
			return $row;
		}else{
			return false;
		}
	}
	
	public function user_auth_data($userID){

		$query = $this->db->select("g.first_name,g.last_name,g.id,g.role")
                    	  ->get_where("gympik_member as g", array("id" => $userID,'status'=>'1','verified'=>'1'));
 		if ($query->num_rows() > 0){
			$row = $query->row();
			return $row;
		}else{
			return false;
		}
	}
	
	/*Admin panel*/
	
	public function list_users($limit, $start){
		$this->db->limit($limit, $start);
		$result = $this->db->select("gympik_member.*")->get("gympik_member");
        return $result->num_rows() > 0 ? $result->result() : null;
	}
	
	/*admin panel*/
	public function get_user_by_id($id) {
        if (is_integer($id)) {
            $result = $this->db->select("gympik_member.*")
                    ->get_where("gympik_member", array("id" => $id));
			return $result->num_rows() > 0 ? $result->row() : null;
        }
		
        return false;
    }
	/*
	 * Record count for member 
	 */
	public function record_count() {
        return $this->db->count_all("gympik_member");
    }
	
	/*
	 * Update member's
	 */
	public function update_user($info,$userID){
		$this->db->update('gympik_member',$info,array('id'=>$userID));
	}
	
	/*
	 * This function is for find trainer type users
	 * Param condition arr
	 */
	public function find_trainer($limit, $start, $all){
		$add 		= $this->input->get('add');
		$city 		= $this->input->get('city');
		$pincode 	= $this->input->get('pincode');
		$type 		= $this->input->get('trainer_type');
		$gender		= $this->input->get('gender');
		$schedule 	= $this->input->get('schedule');
		$diet 		= $this->input->get('diet'); 
		
		$sqlFIlter 	= '';
		$lim 		= '';
		
		if($add != ''){  
			$sqlFIlter.= " AND address = ".$this->db->escape($add)."";
		} 
		if($pincode != ''){  
			$sqlFIlter.= " AND pincode = ".$this->db->escape($pincode)."";
		} 
		if($gender[0] != ''){ 
			$sqlFIlter .= " AND gender IN (".implode(',',$gender).")"; 
		}
		
		if($type[0] != ''){ 
			$str = implode(" 'OR speciality ='", $type);
			$sqlFIlter .= " AND ( speciality = '$str')"; 
		}
		
		if($all != 'all'){
			$lim .=' LIMIT '.$start.', '.$limit.'';
		}   
 
		$sql = "SELECT * FROM gympik_member WHERE role='2' AND profile= '1' $sqlFIlter $lim";
		$query = $this->db->query($sql);
		
		return $query->num_rows() > 0 ? $query->result() : null; 		
	}
	
	
	function trainer_suggestion($speciality){
		$this->db->limit('3', '0');
		$this->db->like('speciality',$speciality);
		$result = $this->db->select("mem.id,mem.first_name,mem.last_name,mem.profile_pic,mem.speciality")->get("gympik_member as mem");
					
        return $result->num_rows() > 0 ? $result->result() : null;
	}  
	
}
?>