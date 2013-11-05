<?php include_once('cController.php');
class cMcompanyController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mcompany";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mcompany.id","","1 as action");
            $this->join_condition="Join  on .id=mcompany.company_currency";    
        }elseif($this->action=="view"){
            $this->column=array("mcompany.company_name","mcompany.company_code","mcompany.branch_name","mcompany.parent_company","mcompany.factory_address_id","mcompany.office_address_id","mcompany.company_currency","mcompany.website","mcompany.tax_id","mcompany.phone1","mcompany.phone2","mcompany.phone3","mcompany.phone4","mcompany.phone5");
            $this->join_condition="Join  on .id=mcompany.company_currency";    
        
        }elseif($this->action=="add"){
            $this->column=array('company_name'=>$_POST['company_name'],'company_code'=>$_POST['company_code'],'branch_name'=>$_POST['branch_name'],'parent_company'=>$_POST['parent_company'],'factory_address_id'=>$_POST['factory_address_id'],'office_address_id'=>$_POST['office_address_id'],'company_logo'=>$_POST['company_logo'],'company_currency'=>$_POST['company_currency'],'website'=>$_POST['website'],'tax_id'=>$_POST['tax_id'],'phone1'=>$_POST['phone1'],'phone2'=>$_POST['phone2'],'phone3'=>$_POST['phone3'],'phone4'=>$_POST['phone4'],'phone5'=>$_POST['phone5']);
         
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