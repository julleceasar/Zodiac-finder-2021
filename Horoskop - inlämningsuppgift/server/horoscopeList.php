<?php

function getHoroscopeArray($inputDate){
    $horoscope = [
        [
            "name"=>"Vattumannen",
            "img"=>"vattumannen.jpg",
            "start"=> ["month" => 1, "day" => 20],
            "end"=> ["month" => 2, "day" => 18]
        ], [
            "name"=>"Fiskarna",
            "img"=>"fiskarna.jpg",
            "start"=> ["month" => 2, "day" => 19],
            "end"=> ["month" => 3, "day" => 20]
        ]
        , [
            "name"=>"Väduren",
            "img"=>"väduren.jpg",
            "start"=> ["month" => 3, "day" => 21],
            "end"=> ["month" => 4, "day" => 19]
        ] , [
            "name"=>"Oxen",
            "img"=>"oxen.jpg",
            "start"=> ["month" => 4, "day" => 20],
            "end"=> ["month" => 5, "day" => 20]
        ] , [
            "name"=>"Tvillingarna",
            "img"=>"tvillingarna.jpg",
            "start"=> ["month" => 5, "day" => 21],
            "end"=> ["month" => 6, "day" => 21]
    
        ] , [
            "name"=>"Kräftan",
            "img"=>"kräftan.jpg",
            "start"=> ["month" => 6, "day" => 22],
            "end"=> ["month" => 7, "day" => 22]
        ] , [
            "name"=>"Lejonet",
            "img"=>"lejonet.jpg",
            "start"=> ["month" => 7, "day" => 23],
            "end"=> ["month" => 8, "day" => 22]
        ] , [
            "name"=>"Jungfrun",
            "img"=>"jungfrun.jpg",
            "start"=> ["month" => 8, "day" => 23],
            "end"=> ["month" => 9, "day" => 22]
        ] , [
            "name"=>"Vågen",
            "img"=>"vågen.jpg",
            "start"=> ["month" => 9, "day" => 23],
            "end"=> ["month" => 10, "day" => 22]
        ] , [
            "name"=>"Skorpionen",
            "img"=>"skorpionen.jpg",
            "start"=> ["month" => 10, "day" => 23],
            "end"=> ["month" => 11, "day" => 21]
        ] , [
            "name"=>"Skytten",
            "img"=>"skytten.jpg",
            "start"=> ["month" => 11, "day" => 22],
            "end"=> ["month" => 12, "day" => 21]
        ] , [
            "name"=>"Stenbocken",
            "img"=>"stenbocken.jpg",
            "start"=> ["month" => 12, "day" => 22],
            "end"=> ["month" => 1, "day" => 19]
        ]
    
        ];
    
        $inputMonth = ($inputDate["month"]);
        $inputDay = ($inputDate["day"]);
        
       
    
        foreach ($horoscope as $horo){
            if($horo['start']['month'] == $inputMonth && $horo['start']['day'] <= $inputDay || $horo['end']['month'] == $inputMonth && $horo['end']['day'] >= $inputDay){
                
                return array($horo['name'], $horo['img']); 

            }
    
    
    
        }
    
     }


?>