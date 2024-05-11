<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Control_model extends CI_Model {


    public function get_data($table){

        $data = $this->db->get('tbl_'.$table)->result_array();

        return $data; 
    }

    public function save_data($table,$data){

        $this->db->insert('tbl_'.$table,$data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
    }

    public function edit_data($table,$data){

        $this->db->where('id',$data['id']);
        $data = $this->db->update('tbl_'.$table,$data);

        return $data;
    }


    public function delete_data($table,$data){

        $this->db->where('id',$data['id']);
        $data = $this->db->update('tbl_'.$table,$data);

        return $data;
    }

    public function delete_data_permanant($table,$data){

        $this->db->where('id',$data['id']);
        $data = $this->db->delete('tbl_'.$table,$data);

        return $data;
    }


    public function getUser($id){
        $this->db->where('id',$id);
        $data = $this->db->get('tbl_user')->result_array();
        return $data[0];
    }

    public function getAdmin($id){
        $this->db->where('id',$id);
        $data = $this->db->get('tbl_admin')->result_array();
        return $data[0];
    }

    public function get_Admin($id = NULL){

        if($id){
            $this->db->where('id',$id);
        }

        $this->db->where('data_status','1');

        $data =  $this->db->get('tbl_admin');

        return $data;
    }

    public function get_AdminList($fname = NULL , $lname = NULL,$type = NULL){
        $w_type = '';
        $w_fname = '';
        $w_lname = '';

        if($fname  != NULL ){
            $w_fname = 'AND (admin.admin_fname LIKE "'.trim($fname).'%")';
        }
        if( $lname  != NULL ){
            $w_lname = 'AND (admin.admin_lname LIKE "'.trim($lname).'%")';
        }
        
        if($type != NULL){
            $w_type = "AND admin.admin_type = '".$type."'";
        }

     
        $sql = "
            SELECT * FROM tbl_admin as admin
            WHERE admin.data_status = '1' ".$w_type." ".$w_fname." ".$w_lname."
        ";

        $data = $this->db->query($sql);

        return $data;
    }

  
    public function countData($table){
        $query = $this->db->get("tbl_".$table);
        return $query->num_rows();
    }

    public function countSlide(){
        $query = $this->db->get("tbl_slide");
        return $query->num_rows();
    }

    public function checkDuplicateEmail($type,$email,$registerType = '1'){
        if($type == 'user'){
            $this->db->where('email',$email);
            $this->db->where('register_type',$registerType);

        }

        if($type == 'admin'){
            $this->db->where('admin_email',$email);
        }

        return $this->db->get('tbl_'.$type);

    }

 

    public function login($type ,$email,$password,$registerType = '1'){
    

        if($type == 'user'){
            $this->db->where('email',$email);
            $this->db->where('password',$password);
            $this->db->where('register_type',$registerType);

        }

        if($type == 'admin'){
            $this->db->where('admin_email',$email);
            $this->db->where('password',$password);

        }

        return $this->db->get('tbl_'.$type);
    }

    public function register($type,$data){

        $this->db->insert('tbl_'.$type,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
        
    }


    public function update($table  ,$col, $colData, $data){
        $this->db->where($col,$colData);
        return $this->db->update($table,$data);
    }

    public function addImage( $data ){
        return $this->db->insert("tbl_image",$data);
    }

    public function addSlideImage($data){
        $this->db->where('id',$data['id']);
        return $this->db->update("tbl_slide",$data);
    }

    
    public function addSeriesImage($data){
        $this->db->where('id',$data['id']);
        return $this->db->update("tbl_series",$data);
    }

    public function addFile( $data){
        return $this->db->insert("tbl_file",$data);
    }

    public function get_Image($id,$type){
        $this->db->where("ref_id",$id);
        $this->db->where("type",$type);


        $data = $this->db->get("tbl_image");
        return $data;
    }

    public function get_File($id){
        $this->db->where("ref_id",$id);

        $data = $this->db->get("tbl_file");
        return $data;
    }

    public function setAllImageMainToNone($ref_id = NULL){
        $data = array(
            "main" => '0'
        );
        $this->db->where('ref_id',$ref_id);
        return $this->db->update("tbl_image",$data);
    }

    public function get_product($id = NULL){
        if($id != NULL){
            $this->db->where('id',$id);
        }

        $data = $this->db->get("tbl_product");

        return $data;
    }
    

    public function get_review($id = NULL){
        if($id != NULL){
            $this->db->where('id',$id);
            $this->db->order_by('data_order',"ASC");

        }

        $data = $this->db->get("tbl_review");

        return $data;
    }

    public function get_model($id = NULL){
        if($id != NULL){
            $this->db->where('id',$id);
        }

        $data = $this->db->get("tbl_model");

        return $data;
    }


    public function get_series($model_id = NULL,$id = NULL ){
    
        if(isset($model_id)){
            $this->db->where('model_id',$model_id);
        }

        if(isset($id)){
            $this->db->where('id',$id);
        }

        $this->db->where('data_status','1');
        $this->db->order_by('data_order',"ASC");


        $data = $this->db->get("tbl_series");

        return $data;
    }

    public function get_ProductBySeries($id = NULL ){
 
        $sql = "SELECT * , 
        pd.id as id ,
        pd.create_date as create_date ,
        pd.data_status as data_status ,
        pd.description as description  ,
        pd.data_order as data_order  

        FROM tbl_product as pd 
        LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
        LEFT JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
        LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
        WHERE pd.series_id = ".$id."
        GROUP BY pd.id
        ORDER BY pd.data_order ASC
        ";
        
        $data = $this->db->query($sql);
         return $data;
    }

    public function get_slides($id = NULL){
        if($id != NULL){
            $this->db->where('id',$id);
        }
        $data = $this->db->get("tbl_slide");

        return $data;
    }

    public function get_branch($id = NULL){
        if($id != NULL){
            $this->db->where('id',$id);
        }

        $data = $this->db->get("tbl_branch");

        return $data;
    }
    

    public function get_AllProduct(){

        $sql = "SELECT * , 
        pd.id as id ,
        pd.create_date as create_date ,
         pd.data_status as data_status ,
         pd.description as description  ,
         pd.data_order as data_order  

         FROM tbl_product as pd 
        LEFT JOIN tbl_image as img on pd.id = img.ref_id AND img.main = '1' AND img.type = '1'
        LEFT JOIN tbl_model as md on pd.model_id = md.id AND md.data_status = '1'
        LEFT JOIN tbl_review as re on pd.review_id = re.id AND re.data_status = '1'
        
        GROUP BY pd.id
        ORDER BY pd.data_order ASC
        ";
        
        $data = $this->db->query($sql);
         return $data;
     }



     public function get_AllExpiredArticle($cate_id = NULL){

        $w_cateid = "";
        if(isset($cate_id)){
            $w_cateid = "AND art.category_id = ".$cate_id."";
        }

        $sql = "SELECT * , art.id as id  FROM tbl_article as art 
        LEFT JOIN tbl_image as img on art.id = img.article_id AND img.main = '1'
        INNER JOIN tbl_category as cate on art.category_id = cate.id
        WHERE (art.data_status = '1' AND CURDATE() >= art.expire_date ".$w_cateid.") AND cate.data_status = '1'";

        $data = $this->db->query($sql);
         return $data;
     }

     public function get_seriesListAll($m_id= NULL, $s_id = NULL , $s_search = NULL){
        $w_search = '';
        $w_id = '';
        $w_m_id = '';

        if($m_id != NULL){
            $w_m_id = "AND sr.model_id = ".$m_id."";
        }

        if($s_id != NULL){
            $w_id = "AND sr.id = ".$s_id."";
        }

        if($s_search != NULL && strlen($s_search) > 0){
            $w_search = "AND sr.series_name LIKE '%".$s_search."%'";

        }
        

        $sql = "SELECT *,sr.id as id, sr.model_id as model_id ,sr.data_status as data_status FROM tbl_series as sr
        LEFT JOIN tbl_product as pd on sr.id = pd.series_id 
        WHERE sr.data_status > 0 ".$w_m_id." ".$w_id." ".$w_search." 
        GROUP BY sr.id
        ORDER BY sr.data_order ASC
        ";


        $data = $this->db->query($sql);

        return $data;
    }

    public function get_modelList($m_id = NULL , $m_search = NULL){
        $w_search = '';
        $w_id = '';

        if($m_id != NULL){
            $w_id = "AND md.id = ".$m_id."";
        }

        if($m_search != NULL){
            $w_search = "AND md.model_name LIKE '%".$m_search."%'";

        }
        

        $sql = "SELECT *,md.id as id ,md.data_status as data_status FROM tbl_model as md
        LEFT JOIN tbl_product as pd on md.id = pd.model_id 
        WHERE md.data_status = '1' ".$w_id." ".$w_search." 
        GROUP BY md.id
        ORDER BY md.id DESC
        ";

        $data = $this->db->query($sql);

        return $data;
    }

    


    public function get_modelListAll($m_id = NULL , $m_search = NULL){
        $w_search = '';
        $w_id = '';

        if($m_id != NULL){
            $w_id = "AND md.id == ".$m_id."";
        }

        if($m_search != NULL){
            $w_search = "AND md.model_name LIKE '%".$m_search."%'";

        }
        

        $sql = "SELECT *,md.id as id ,md.data_status as data_status FROM tbl_model as md
        LEFT JOIN tbl_product as pd on md.id = pd.model_id 
        WHERE md.id > 0 ".$w_id." ".$w_search." 
        GROUP BY md.id
        ORDER BY md.data_order ASC
        ";

        $data = $this->db->query($sql);

        return $data;
    }



    public function get_AllReview(){
        $sql = "SELECT * , re.id as id FROM tbl_review as re 
        LEFT JOIN tbl_image as img on re.id = img.ref_id AND img.main = '1' AND img.type = '2'
        WHERE (re.data_status = '1')
        
        GROUP BY re.id
        ORDER BY re.id DESC
        ";
        
        $data = $this->db->query($sql);

        return $data;
    }

    public function get_allReviewList(){
        $this->db->where('data_status','1');
        $data = $this->db->get("tbl_review");

        return $data;
    }

    public function get_allCategoryList(){
        $this->db->where('data_status','1');
        $data = $this->db->get("tbl_category");

        return $data;
    }

    public function get_categoryName($id){
        $this->db->where('id',$id);
        $this->db->where('data_status','1');
        $data = $this->db->get("tbl_category");

        return $data;
    }

    
    public function fullDate($date){
        $m_th_full = array( "","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", );


        $app_dateArr = explode( '-', $date) ;

        $app_date_set = array( $app_dateArr[2] ,    $m_th_full[(int) $app_dateArr[1]] , (int) $app_dateArr[0]+543 ) ;

        return join(' / ',$app_date_set);
    }

    public function fullDateTime($datetime){
        $m_th_full = array( "","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", );

        $dateTime = explode( ' ', $datetime) ;

        $app_dateArr = explode( '-', $dateTime[0]) ;

        $app_date_set = array( $app_dateArr[2] ,    $m_th_full[(int) $app_dateArr[1]] , (int) $app_dateArr[0]+543 ) ;

        return join(' / ',$app_date_set).' เวลา '. substr($dateTime[1],0,5)." น. ";
    }

    public function fullDateNoTime($datetime){
        $m_th_full = array( "","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", );

        $dateTime = explode( ' ', $datetime) ;

        $app_dateArr = explode( '-', $dateTime[0]) ;

        $app_date_set = array( $app_dateArr[2] ,    $m_th_full[(int) $app_dateArr[1]] , (int) $app_dateArr[0]+543 ) ;

        return join('/',$app_date_set);
    }

    public function fullDateNoTimeEn($datetime){
        $m_th_full =  array('','Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');

        $dateTime = explode( ' ', $datetime) ;

        $app_dateArr = explode( '-', $dateTime[0]) ;

        $app_date_set = array( $app_dateArr[2] ,    $m_th_full[(int) $app_dateArr[1]] , (int) $app_dateArr[0]+543 ) ;

        return join(' / ',$app_date_set);
    }

    public function fullDateTime2($datetime){
        $m_th_full = array( "","มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม", );

        $dateTime = explode( ' ', $datetime) ;

        $app_dateArr = explode( '-', $dateTime[0]) ;

        $app_date_set = array( $app_dateArr[2] ,    $app_dateArr[1] , (int) $app_dateArr[0]+543 ) ;

        return join('/',$app_date_set).' '. substr($dateTime[1],0,5)." น. ";
    }

}