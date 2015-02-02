<?php  
class Protect extends AppModel  
{  
    public $name = 'Protect';  

    function insert($ip,$action,$expire,$unit) 
    { 
        $result=$this->query("INSERT INTO protects (ip ,action , expire ) VALUES ('$ip', '$action', TIMESTAMPADD($unit,$expire, NOW()))");
        
    } 


    function cleanout() 
    { 
        $this->query("DELETE FROM protects WHERE expire<=NOW()");

    } 

    function amount($ip,$action) 
    { 
        $this->cleanout(); 
        $rs= $this->query("SELECT COUNT(*) AS amount from  protects WHERE ip='$ip' AND  action='$action'"); 
        return $rs[0][0]["amount"]; 
    } 
}  
?>