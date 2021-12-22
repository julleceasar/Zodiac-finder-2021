<?php

session_start();
if(isset($_SERVER['REQUEST_METHOD'])) {
   
    if($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_SESSION["horo"])) {
            $horoscopeResult = unserialize($_SESSION["horo"]);
            echo json_encode($horoscopeResult); 
      
                   
    }else {
        echo json_encode(false);
    }

    



}
}
?> 

