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

    public function getAllSlide(){
       
            $this->db->where('data_status','1');
            $this->db->order_by('data_order','ASC');

            $data = $this->db->get("tbl_slide");
    
            return $data->result_array();
    }

    public function search_AllProduct($queryText = NULL)
    {
   

        $w_queryText = $queryText;
        $data = array();

        $w_queryTextSoundex = rtrim(SOUNDEX($w_queryText), '0');

        if ($queryText != NULL) {

            $sql = "SELECT * ,
                pd.id as id ,
                pd.create_date as create_date , 
                pd.data_status as data_status ,
                pd.description as description, 
                pd.description_eng as description_eng ,
                
                
                re.description as review_description, 
                re.description_eng as review_description_eng 

                FROM tbl_product as pd 
                LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
                INNER JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
                LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
                LEFT JOIN tbl_series as sr on pd.review_id = sr.id AND sr.data_status = '1'
                WHERE pd.data_status = '1' AND 
                (

                    ((CONCAT(md.model_name,' ',pd.product_name) LIKE '%" . $w_queryText . "%') OR (CONCAT(md.model_name,' ',pd.product_name_eng) LIKE '%" . $w_queryText . "%') ) OR

                   ( pd.product_name LIKE '".$w_queryText."%' OR  pd.product_name LIKE '%".$w_queryText."' OR
                    pd.product_name_eng LIKE '".$w_queryText."%' OR  pd.product_name_eng LIKE '%".$w_queryText."' OR  
                    md.model_name LIKE '".$w_queryText."%' OR  md.model_name LIKE '%".$w_queryText."' OR
                    sr.series_name LIKE '".$w_queryText."%' OR  sr.series_name LIKE '%".$w_queryText."') OR

                    
                   ( 
                        SOUNDEX(pd.product_name_eng) LIKE '%" . $w_queryTextSoundex . "%' OR
                        SOUNDEX(md.model_name) LIKE '%" . $w_queryTextSoundex . "%' OR
                        SOUNDEX(sr.series_name) LIKE '%" . $w_queryTextSoundex . "%' OR
                        SOUNDEX(pd.year) LIKE '%" . $w_queryTextSoundex . "%' 
                    )

                ) 



                GROUP BY pd.id
                ORDER BY pd.data_order ASC";


            $data = $this->db->query($sql)->result_array();
        }

        return $data;
    }

    public function search_AllProduct_v2($queryText = NULL)
    {
   

        $w_queryText = $queryText;
        $data = array();
        if ($queryText != NULL) {

            $sql = "SELECT * ,
                pd.id as id ,
                pd.create_date as create_date , 
                pd.data_status as data_status ,
                pd.description as description, 
                pd.description_eng as description_eng ,
                
                
                re.description as review_description, 
                re.description_eng as review_description_eng 

                FROM tbl_product as pd 
                LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
                INNER JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
                LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
                WHERE pd.data_status = '1' AND 
                (
                    SOUNDEX(pd.product_name) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX('".$w_queryText."')), '%') OR
                    SOUNDEX(pd.product_name_eng) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX('".$w_queryText."')), '%') OR
                    SOUNDEX(md.model_name) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX('".$w_queryText."')), '%') OR
                    SOUNDEX(pd.year) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX('".$w_queryText."')), '%') OR
                    SOUNDEX(pd.price) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX('".$w_queryText."')), '%') OR
                    SOUNDEX(pd.price_pro) LIKE CONCAT(TRIM(TRAILING '0' FROM SOUNDEX('".$w_queryText."')), '%') OR
                    
                    pd.product_name LIKE '".$w_queryText."%' OR  pd.product_name LIKE '%".$w_queryText."' OR
                    pd.product_name_eng LIKE '".$w_queryText."%' OR  pd.product_name_eng LIKE '%".$w_queryText."' OR  
                    md.model_name LIKE '".$w_queryText."%' OR  md.model_name LIKE '%".$w_queryText."' 

                ) 
                GROUP BY pd.id
                ORDER BY pd.data_order ASC";


            $data = $this->db->query($sql)->result_array();
        }

        return $data;
    }
    
    public function search_AllProduct_TH($queryText = NULL)
    {
   

        $w_queryText = $queryText;
        $data = array();
        if ($queryText != NULL) {

            $sql = "SELECT * ,
                pd.id as id ,
                pd.create_date as create_date , 
                pd.data_status as data_status ,
                pd.description as description, 
                pd.description_eng as description_eng ,
                
                
                re.description as review_description, 
                re.description_eng as review_description_eng 

                FROM tbl_product as pd 
                LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
                INNER JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
                LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
                WHERE pd.data_status = '1' AND 
                pd.product_name LIKE '%" . $w_queryText . "%' OR
                pd.product_name_eng LIKE '%" . $w_queryText . "%' OR
                md.model_name LIKE '%" . $w_queryText . "%' OR
                ((CONCAT(pd.product_name,md.model_name,pd.year) LIKE '%" . $w_queryText . "%') OR (CONCAT(pd.product_name_eng,md.model_name,pd.year) LIKE '%" . $w_queryText . "%') )
                GROUP BY pd.id
                ORDER BY pd.data_order ASC";


            $data = $this->db->query($sql)->result_array();
        }

        return $data;
    }


    public function get_AllProductWithSeries($id = NULL, $model_id = NULL ,$series_id = NULL, $limit = NULL)
    {

      $w_limit = '';

       if(isset($limit)){
            $w_limit = "LIMIT 10 OFFSET ".$limit."";
       }

        $w_id = "";
        if ($id != NULL) {
            $w_id = " AND pd.id = " . $id . "";
        }

        $w_md_id = "";
        if ($model_id != NULL) {
            $w_md_id = " AND md.id = " . $model_id . "";
        }

        $w_sr_id = "";
        if ($series_id != NULL) {
            $w_md_id = " AND sr.id = " . $series_id . "";
        }


        $sql = "SELECT * ,
             pd.id as id ,
             pd.create_date as create_date , 
             pd.data_status as data_status ,
             pd.description as description, 
             pd.description_eng as description_eng ,
             
             
             re.description as review_description, 
             re.description_eng as review_description_eng 

            FROM tbl_product as pd 
            LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
            INNER JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
            LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
            LEFT JOIN tbl_series as sr on pd.series_id = sr.id AND sr.data_status = '1'

            WHERE pd.data_status = '1' " . $w_id . " " . $w_md_id . " ".$w_sr_id ."

            GROUP BY pd.id
            ORDER BY pd.data_order ASC
            ".$w_limit."
            ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function get_AllProduct($id = NULL, $model_id = NULL , $limit = NULL)
    {

      $w_limit = '';

      
       if(isset($limit)){
            $w_limit = "LIMIT 10 OFFSET ".$limit."";
       }


        
        $w_id = "";
        if ($id != NULL) {
            $w_id = " AND pd.id = " . $id . "";
        }

        $w_md_id = "";
        if ($model_id != NULL) {
            $w_md_id = " AND md.id = " . $model_id . "";
        }


        $sql = "SELECT * ,
             pd.id as id ,
             pd.create_date as create_date , 
             pd.data_status as data_status ,
             pd.description as description, 
             pd.description_eng as description_eng ,
             
             
             re.description as review_description, 
             re.description_eng as review_description_eng 

            FROM tbl_product as pd 
            LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
            INNER JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
            LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
            LEFT JOIN tbl_series as sr on pd.series_id = sr.id AND sr.data_status = '1'
            WHERE pd.data_status = '1' " . $w_id . " " . $w_md_id . "

            GROUP BY pd.id
            ORDER BY pd.data_order ASC
            ".$w_limit."
            ";

        $data = $this->db->query($sql);
        return $data;
    }

    public function get_AllModel()
    {
        $sql = "SELECT * , md.id as id FROM tbl_model as md 
            LEFT JOIN tbl_image as img on md.id = img.ref_id AND img.main = '1' AND img.type = '3'
            WHERE (md.data_status = '1')
            
            GROUP BY md.id
            ORDER BY md.data_order ASC
            ";

        $data = $this->db->query($sql);

        return $data;
    }

    public function get_AllReview($id = NULL)
    {
        $w_id = "";
        if ($id != NULL) {
            $w_id = " AND re.id = " . $id . "";
        }

        $sql = "SELECT * , re.id as id FROM tbl_review as re 
            LEFT JOIN tbl_image as img on re.id = img.ref_id AND img.main = '1' AND img.type = '2'
            WHERE (re.data_status = '1') " . $w_id . "
            
            GROUP BY re.id
            ORDER BY re.data_order ASC
            ";

        $data = $this->db->query($sql);

        return $data;
    }
}
