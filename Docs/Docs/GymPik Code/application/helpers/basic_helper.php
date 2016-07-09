<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

if (!function_exists('_input_post')) {

    function _input_post($key = null) {
        $CI = & get_instance();
        return $key !== null ? $CI->input->post($key) : null;
    }

}
if (!function_exists('_input_get')) {

    function _input_get($key = null) {
        $CI = & get_instance();
        return $key !== null ? $CI->input->get($key) : null;
    }

}
if (!function_exists('_input_request')) {

    function _input_request($key = null) {
        $CI = & get_instance();
        return $key !== null ? $CI->input->get_post($key) : null;
    }

}
if (!function_exists('_xss_clean')) {

    function _xss_clean($data = array()) {
        $CI = & get_instance();
        $CI->load->library("security");
        if (!empty($data) && is_array($data)) {
            foreach ($data as $key => $value) {
                $data[$key] = $CI->security->xss_clean($value, false);
            }
        }
        return $data;
    }

}
if (!function_exists('pr')) {

    function pr($data = null, $exit = false) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        if ($exit === TRUE)
            die();
    }

}
?>