<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Layout
 *
 * @author Bansal
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Layout {

    //put your code here
    var $obj;
    var $layout;

    function Layout($layout = "layout_main") {
        $this->obj = & get_instance();
        $this->layout = $layout;
    }

    function set_layout($layout) {
        $this->layout = $layout;
    }

    function view($view, $data=null, $return=false) {
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view, $data, true);

        if ($return) {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        } else {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
    function element($view){
        $this->obj->load->view($view);
    }

}

?>
