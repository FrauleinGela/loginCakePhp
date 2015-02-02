<?php  

App::uses('Component', 'Controller');
class ProtectComponent extends Component
{ 
   public $Protect;
   public function __construct(){
    $this->Protect = ClassRegistry::init("Protect");
    $this->Protect->create();  
   }
    function access($action,$limit) 
    { 
        if ($this->Protect->amount(gethostbyname($_SERVER['REMOTE_ADDR']),$action) < $limit) 
        { 
            return true; 
        } 
        else 
        { 
            return false; 
        } 
    } 


    function fail($action,$expire) 
    { 
        $unit="MINUTE"; 
        switch (strtolower($expire{strlen($expire)-1})) 
        { 
            case 's':$unit="SECOND";break; 
            case 'm':$unit="MINUTE";break; 
            case 'h':$unit="HOUR";    break; 
            case 'w':$unit="WEEK";    break; 
            case 'o':$unit="MONTH";    break; 
            case 'q':$unit="QUARTER";break; 
            case 'y':$unit="YEAR";    break; 
        } 
        $this->Protect->insert(gethostbyname($_SERVER['REMOTE_ADDR']),$action,substr ( $expire,0,strlen($expire)-1),$unit); 
    } 
} 

?>