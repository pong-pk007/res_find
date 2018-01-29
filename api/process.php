<?php
        include '../config/connection.php';
        
         /*
             * 
             time_str_start=11.00&wifi=0&toilet=1&parking=1
             * &restype=%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%A7&water=1&photo=0&tv=0
             * &pri_range=30-50&bar_type=-&music=0&food_id=3&air=0&fan=1&time_str_end=15.00
             * 
             */
        $food_id = $_POST["food_id"];
        $pri_range = $_POST["pri_range"];
        $time_start = $_POST["time_str_start"];
        $time_end = $_POST["time_str_end"];
        $fan = $_POST["fan"];
        $air = $_POST["air"];
        $toilet = $_POST["toilet"];
        $water = $_POST["water"];
        $wifi = $_POST["wifi"];
        $parking = $_POST["parking"];
        $music = $_POST["music"];
        $photo = $_POST["photo"];
        $tv = $_POST["tv"];
        
        
//        $food_id = 1;
//        $pri_range = '30-50';
//        $time_start = '9.00';
//        $time_end = '16.00';
//        $fan = 1;
//        $air = 0;
//        $toilet = 1;
//        $water = 1;
//        $wifi = 1;
//        $parking = 1;
//        $music = 1;
//        $photo = 0;
//        $tv = 0;
        
                
        if(isset($food_id) && isset($pri_range)){
            
            
        $sql = "SELECT tbl_restaurant.*, tbl_food.* 
                FROM tbl_sales 
                LEFT OUTER JOIN tbl_restaurant ON tbl_sales.res_id = tbl_restaurant.res_id
                LEFT OUTER JOIN tbl_food on tbl_sales.food_id = tbl_food.food_id
                        WHERE tbl_sales.food_id = $food_id 
                        AND tbl_restaurant.res_pri = '$pri_range' 
                        AND tbl_restaurant.res_fan = $fan 
                        AND tbl_restaurant.res_air = $air 
                        AND tbl_restaurant.res_toilet = $toilet 
                        AND tbl_restaurant.res_water_free = $water 
                        AND tbl_restaurant.res_wifi = $wifi 
                        AND tbl_restaurant.res_parking = $parking 
                        AND tbl_restaurant.res_music = $music 
                        AND tbl_restaurant.res_photo = $photo 
                        AND tbl_restaurant.res_tv = $tv";
        
        $query = mysqli_query($conn, $sql);
        $json = array();
        
        while ($row = mysqli_fetch_array($query)){
//            $arr = array("food_name" => $row["food_name"],
//                         "food_type" => $row["food_type"]);
            array_push($json, $row);
//            $json = $row;
        }
        echo json_encode($json);
        
        }else{
            $json2 = array();
            array_push($json2, array("res_name" => "111"));
            echo json_encode($json2);
        }
?>