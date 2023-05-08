<?php
    require_once('db/account_db.php');
    require_once('db/db.php');
    $db = create_connection();
    $accountDB = getAccountData();
    $userID = $_GET['id'];
    
    foreach($accountDB as $acc){
        $username = $acc['username'];
        //$id = $acc['id'];
        //print_r($id);
        if($acc['id'] == $userID){
            //print_r($username);
            //print_r($id);
            $sql = "UPDATE account SET account.password = '$username' where account.id = '$userID'";
            mysqli_query($db, $sql);
            header('location: adminhome.php');
        }
    }
    
?>