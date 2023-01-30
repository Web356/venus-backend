<?php

namespace App\Services\Distance\Traits;

trait CalcuteDistance
{
   public function distance($lat1, $lon1, $lat2, $lon2, $unit = "") {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            }else if($unit == "M"){
                return ($miles * 1609);
            } else{
                return $miles;
            }
        }
    }

//echo distance(29.597304, 52.566649 , 29.598010, 52.550336) . " Miles\n";
//
//echo distance(29.597304, 52.566649 , 29.598010, 52.550336, "N") . " Nautical Miles\n";
//
//echo distance(29.597304, 52.566649 , 29.598010, 52.550336, "K") . " Kilometers\n";
//
//echo distance(29.597304, 52.566649 , 29.598010, 52.550336 , "M") . " Meters\n";
}
