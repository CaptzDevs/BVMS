<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test_model extends CI_Model 
{

    public function testQ(){
        
        $sql  = "SELECT * FROM dashboard";

        return $this->db->query($sql)->result_array();
    }

  

}