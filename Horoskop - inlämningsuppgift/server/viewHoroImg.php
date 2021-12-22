<?php

session_start();
if(isset($_SERVER['REQUEST_METHOD'])) {
   
    if($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_SESSION["horoImg"])) {
         
           $horoscopeImg = unserialize($_SESSION["horoImg"]);
            echo json_encode($horoscopeImg); 
            
            
                   
    }else {
        echo json_encode(false);
    }

   
                
 


}
}
?> 

