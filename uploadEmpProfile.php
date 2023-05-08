<?php
session_start();
require_once('db/db.php');

    $user = $_SESSION['user'];
    $uesrID = $user['id'];
    if(!empty($_POST['myFile'])){
        $_SESSION['errorEmpProfile'] = 'Please choose a file';
        header('location: empProfile.php');
        die();
    }
    
/*     echo "<pre>";
        print_r($_FILES);
    echo "</pre>";
    print_r($_POST); */

    $file = $_FILES['myFile'];
    $name = $file['name'];
    $_SESSION['fullFileNameEmployee'] = $name;
    $fullFileNameEmployee = $_SESSION['fullFileNameEmployee'];
    $type = $file['type'];
    $temp_name = $file['tmp_name'];
    $error = $file['errorEmpProfile'];
    $size = $file['size'];
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $supported_files = array('png', 'jpg', 'jpeg');
    if (!in_array($ext, $supported_files)){
        $_SESSION['errorEmpProfile'] = 'Please choose .png, jpg or jpeg image';
        header('location:empProfile.php');
        die();
    }
    
    if($size > 10 * 1024 * 1024){
        $_SESSION['errorEmpProfile'] = 'This file very large'; 
        header('location: empProfile.php');
        die();
    }
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    $final_path = $root .'/Final-Project-Web/images/'. $name;
    
    if (move_uploaded_file($temp_name, $final_path)){
        $_SESSION['success'] = 'This file has been saved';
        header('location: empProfile.php');
        die();
    }else {
        $_SESSION['errorEmpProfile'] = 'can not save the uploaded file';
        header('location: empProfile.php');
        die();
    }
    
?>