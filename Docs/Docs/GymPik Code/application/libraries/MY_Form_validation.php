<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Form_validation
 *
 * @author Bansal
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    /**
     *
     * @param type $rules 
     */
    public function __construct($rules = array()) {
        parent::__construct($rules);
    }

    /**
     *
     * @param type $str
     * @param type $field
     * @return type 
     */
    public function is_unique($str, $field) {
        if (substr_count($field, '.') == 3) {
            list($table, $field, $id_field, $id_val) = explode('.', $field);
            $query = $this->CI->db->limit(1)->where($field, $str)->where($id_field . ' != ', $id_val)->get($table);
        } else {
            list($table, $field) = explode('.', $field);
            $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
        }
        
        return $query->num_rows() === 0;
    }

    /**
     *
     * @return type 
     */
    public function form_validation_array() {
        return $this->_error_array;
    }

    /**
     *
     * @param type $str
     * @return type 
     */
    public function valid_email($str) {
        return (!preg_match("/^([a-z0-9'\+_\-]+)(\.[a-z0-9'\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

}

// END MY Form Validation Class

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */  