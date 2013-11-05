);
                         
         if($this->action=="edit"){                
$this->column[id]=$_POST[id];
}
        }        
        
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
        }
        public function beforeWrite(){
        
        }
        public function afterWrite(){
        
        }
    } 