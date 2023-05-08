<?php
    require_once('db/task_employeeDB.php');
    require_once('db/db.php');
    $taskEmployeeDB = getTaskEmployeeData();
    $userID = $_GET['id'];
    $db = create_connection();
    
    foreach($taskEmployeeDB as $taskEm){
        $employID = $taskEm['employid'];
        if($employID == $userID){
            $sql = "UPDATE task set status = 1 where task.employid = '$userID'";
            mysqli_query($db, $sql);
            header('location: employee.php');
}
}
?>