<?php
        include '../config/connection.php';
        
        $food_name = $_POST["food"];
        $sql = "SELECT food_name, food_id, food_type FROM `tbl_food` WHERE food_name LIKE '%$food_name%'";
        $query = mysqli_query($conn, $sql);
        $json = array();
        while ($row = mysqli_fetch_array($query)){
            $arr = array("food_name" => $row["food_name"],
                         "food_id" => $row["food_id"],
                         "food_type" => $row["food_type"]);
            array_push($json, $arr);
        }
        echo json_encode($json);
?>