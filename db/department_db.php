<?php
    require_once('db.php');
    
    function get_department(){
        $sqlQuery = "SELECT * from department";
        $conn = create_connection();

        $result = $conn->query($sqlQuery);
        $departmentData = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $departmentData[] = $row;
        }

        return $departmentData;
    }

    function get_department_limit(){
        $sqlQuery = "SELECT * from department limit 6";
        $conn = create_connection();

        $result = $conn->query($sqlQuery);
        $departmentData = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $departmentData[] = $row;
        }

        return $departmentData;
    }
/* 
    $all_product = get_department();
    print_r($all_product); */
?>