<?php
    require_once('db.php');

    function getTaskData(){
        $sql = "SELECT * from task inner join detailtask on task.id = detailtask.id";
        $connectedDatabase = create_connection();

        $result = $connectedDatabase->query($sql);
        $taskData = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $taskData[] = $row;
        }

        return $taskData;
    }

 /*    $hallo = get_task();
    print_r($hallo); */
?>