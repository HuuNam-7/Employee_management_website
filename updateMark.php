<?php
    session_start();
    require_once('db/db.php');
    require_once('db/task_db.php');
    if(isset($_POST['mark'])){
        $number = $_POST['mark'];
    }
    
    $db = create_connection();
    $taskDetailDB = getTaskData();
    foreach($taskDetailDB as $ta){
        $user = $_SESSION['user'];
        $userID = $user['id'];
        
        $taskid = $ta['id'];
        $nametask = $ta['nametask'];
        $departID = $ta['departid'];
        $status = $ta['status'];
        $mark = $ta['mark'];
        $employID = $ta['employid'];
        if($ta['departid'] == $userID){
            $sql = "UPDATE detailtask set detailtask.mark = $number where detailtask.id = '$taskid' ";
            mysqli_query($db, $sql);
        }
    }

    header('location: getFile.php');
?>