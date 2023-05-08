<?php
    session_start();
    require_once('db/db.php');
    require_once('db/department_db.php');
    $db = create_connection();
    
    $user = $_SESSION['user'];
    $userID = $user['id'];
    
    $nameFalculty = $_POST['nameFalculty'];
    $email = $_POST['email'];

    $departmentDB = get_department();
    foreach($departmentDB as $de){
        $falculty = $de['falculty'];
        //print_r($falculty);
        if($de['id'] == $userID){
            $sql = "UPDATE major set major.nameMajor = '$nameFalculty', major.email = '$email' where major.id = '$falculty' ";   
            mysqli_query($db, $sql);
        }
    }

    header('location: editFac.php');
    
    
?>