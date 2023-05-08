<?php
    require_once('db.php');

    function getTaskEmployeeData(){
        $sql = "SELECT * from employee inner join task on task.employid = employee.id inner join detailtask on detailtask.id = task.id";
        $connectedDatabase = create_connection();

        $result = $connectedDatabase->query($sql);
        $data = array();
        
        for($i = 1; $i <= $result->num_rows; $i++){
            $row = $result->fetch_assoc();
            $data[] = $row;
        }

        return $data;
    }

/*     $hallo = get_taskEmployee();
    print_r($hallo); */
?>