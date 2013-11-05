<?php include_once('cController.php');
class cTest_allController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array("photo"=>"image");
    function __construct() {
        parent::__construct();
        $this->table = "test_all";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("test_all.id","","1 as action");
            $this->join_condition="Join test_foreign on test_foreign.id=test_all.col_foreign_keyJoin  on .id=test_all.col_direct_select";    
        }elseif($this->action=="view"){
            $this->column=array("test_all.col_text","test_all.col_date_time","test_all.col_date","test_all.col_number","test_all.col_email","test_all.col_url","test_all.col_pattern_valid","test_all.col_foreign_key","test_all.col_hidden","test_all.col_textarea","test_all.col_direct_select");
            $this->join_condition="Join test_foreign on test_foreign.id=test_all.col_foreign_keyJoin  on .id=test_all.col_direct_select";    
        
        }elseif($this->action=="add"){
            $this->column=array('col_text'=>$_POST['col_text'],'col_date_time'=>$_POST['col_date_time'],'col_date'=>$_POST['col_date'],'col_number'=>$_POST['col_number'],'col_email'=>$_POST['col_email'],'col_url'=>$_POST['col_url'],'col_free_field'=>$_POST['col_free_field'],'col_pattern_valid'=>$_POST['col_pattern_valid'],'col_foreign_key'=>$_POST['col_foreign_key'],'col_hidden'=>$_POST['col_hidden'],'col_no_display'=>$_POST['col_no_display'],'col_textarea'=>$_POST['col_textarea'],'col_multiselect'=>$_POST['col_multiselect'],'col_direct_select'=>$_POST['col_direct_select']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        if(is_array($this->view_controls)&&($this->action=="view"||$this->action=="viewall")){
            foreach($this->view_controls as $key=>$value){
                foreach($result as $recordnum=>$record){
                    if($record[$key]==""){
                       $record[$key]= AppImgURL."noimage.jpg";
                    }else{
                        $record[$key]=AppViewUploadsURL.$record[$key];
                    }
                    $result[$recordnum][$key]='<img width="150px" height="150px" src="'.$record[$key].'" >';
                }
                    
            }
        }
        return $result; 
    }
    } 
 ?>