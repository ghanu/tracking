<?php include_once('cController.php');
class cTrip_sheetController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "trip_sheet";
        $this->apply_user_restrictions = true;
       
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("trip_sheet.id","vehicle.registration_no","driver.first_name","route_details.route_name","trip_sheet.date","trip_sheet.morning_pickup","trip_sheet.morning_drop","trip_sheet.evening_pickup","trip_sheet.evening_drop","trip_sheet.total_km","1 as action");
            $this->join_condition="Left Join vehicle on vehicle.id=trip_sheet.vehicle_no Left Join driver on driver.id=trip_sheet.driver_name Left Join route_details on route_details.id=trip_sheet.route";    
        }elseif($this->action=="view"){
            $this->column=array("trip_sheet.vehicle_no","trip_sheet.driver_name","trip_sheet.route","trip_sheet.date","trip_sheet.morning_pickup","trip_sheet.morning_drop","trip_sheet.evening_pickup","trip_sheet.evening_drop","trip_sheet.total_km","trip_sheet.diesel_litre","trip_sheet.diesel_price");
            $this->join_condition="Left Join vehicle on vehicle.id=trip_sheet.vehicle_no Left Join driver on driver.id=trip_sheet.driver_name Left Join route_details on route_details.id=trip_sheet.route";    
        
        }elseif($this->action=="add"){
            $this->column=array('vehicle_no'=>$_POST['vehicle_no'],'driver_name'=>$_POST['driver_name'],'route'=>$_POST['route'],'date'=>$_POST['date'],'morning_pickup'=>$_POST['morning_pickup'],'morning_drop'=>$_POST['morning_drop'],'evening_pickup'=>$_POST['evening_pickup'],'evening_drop'=>$_POST['evening_drop'],'total_km'=>$_POST['total_km'],'diesel_litre'=>$_POST['diesel_litre'],'diesel_price'=>$_POST['diesel_price']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>