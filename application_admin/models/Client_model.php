<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client_model extends CI_Model
{
    public function getTotalOf($table = NULL){
        $sql = "SELECT * FROM ".$table."
            WHERE data_status = '0';
        ";

        return   $this->db->query($sql)->num_rows();
         
    }


 

  
    
 




 

   
}
