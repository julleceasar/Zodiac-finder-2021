<?php

session_start();
if(isset($_SERVER['REQUEST_METHOD'])) {
   
    if($_SERVER['REQUEST_METHOD'] === 'DELETE') {

        if (isset($_SESSION["horo"]) && isset($_SESSION["horoImg"])) {
           unset($_SESSION["horo"]);
           unset($_SESSION["horoImg"]);

           echo json_encode(true);
    }else {
        echo json_encode(false);
    }
}
}
?> 
