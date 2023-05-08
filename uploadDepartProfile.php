<?php
session_start();
require_once('db/db.php');

    $user = $_SESSION['user'];
    $uesrID = $user['id'];
    if(!empty($_POST['myFile'])){
        $_SESSION['errorDepartProfile'] = 'Please choose a file';
        header('location: departProfile.php');
        die();
    }
    
/*     echo "<pre>";
        print_r($_FILES);
    echo "</pre>";
    print_r($_POST); */

    $file = $_FILES['myFile'];
    $name = $file['name'];
    $_SESSION['fullFileNameDepart'] = $name;
    $fullFileNameDepart = $_SESSION['fullFileNameDepart'];
    $type = $file['type'];
    $temp_name = $file['tmp_name'];
    $errorDepartProfile = $file['errorDepartProfile'];
    $size = $file['size'];
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $supported_files = array('png', 'jpg', 'jpeg');
    if (!in_array($ext, $supported_files)){
        $_SESSION['errorDepartProfile'] = 'Please choose .png, jpg or jpeg image';
        header('location: departProfile.php');
        die();
    }
    
    if($size > 10 * 1024 * 1024){
        $_SESSION['errorDepartProfile'] = 'This file very large'; 
        header('location: departProfile.php');
        die();
    }
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    $final_path = $root .'/Final-Project-Web/images/'. $name;
    
    if (move_uploaded_file($temp_name, $final_path)){
        $_SESSION['successDepartProfile'] = 'This file has been saved';
        header('location: departProfile.php');
        die();
    }else {
        $_SESSION['errorDepartProfile'] = 'can not save the uploaded file';
        header('location: departProfile.php');
        die();
    }

?>