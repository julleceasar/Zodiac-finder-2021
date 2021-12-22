<?php

session_start();


require("./horoscopeList.php");

if(isset($_SERVER['REQUEST_METHOD'])) {

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        

        if(isset($_POST['date'])) {
           
            if (!isset($_SESSION["horo"]) && !isset($_SESSION["horoImg"])) {

                $dateObj = json_decode($_POST["date"], true);

                $horoscopeResultArray = getHoroscopeArray($dateObj);
                $horoscopeResult = $horoscopeResultArray[0];
                $horoscopeImg = $horoscopeResultArray[1];

                $_SESSION["horo"] = serialize($horoscopeResult); 
                $_SESSION["horoImg"] = serialize($horoscopeImg);

                echo json_encode(true);
               
                exit;
            }else {
                echo json_encode(false);
            }

       
}

}
}

?>