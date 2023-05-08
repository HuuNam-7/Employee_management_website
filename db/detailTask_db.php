<?php
    require_once('db.php');

    function get_detailTask(){
        $sqlQuery = "SELECT * from detailtask";
        $connectedDatabase = create_connection();

        $resultQuery = $connectedDatabase->query($sqlQuery);
        $detailTaskData = array();
        
        for($i = 1; $i <= $resultQuery->num_rows; $i++){
            $detailTaskRow = $resultQuery->fetch_assoc();
            $detailTaskData[] = $detailTaskRow;
        }

        return $detailTaskData;
    }
/* 
    $hallo = get_detailTask();
    print_r($hallo); */
?>