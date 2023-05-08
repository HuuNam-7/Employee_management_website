<?php
session_start();
require_once('db/db.php');

    $user = $_SESSION['user'];
    $uesrID = $user['id'];
    if(!empty($_POST['myFile'])){
        $_SESSION['errorSubmitFile'] = 'Please choose a file';
        header('location: submitFile.php');
        die();
    }
    
/*     echo "<pre>";
        print_r($_FILES);
    echo "</pre>";
    print_r($_POST); */

    $file = $_FILES['myFile'];
    $name = $file['name'];
    $_SESSION['fullFileNameSubmitFile'] = $name;
    $fullFileNameSubmitFile = $_SESSION['fullFileNameSubmitFile'];
    $type = $file['type'];
    $temp_name = $file['tmp_name'];
    $error = $file['errorSubmitFile'];
    $size = $file['size'];
    
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $supported_files = array('pdf', 'docx', 'txt');
    if (!in_array($ext, $supported_files)){
        $_SESSION['errorSubmitFile'] = 'Please choose .pdf, docx or  txt file';
        header('location:submitFile.php');
        die();
    }
    
    if($size > 10 * 1024 * 1024){
        $_SESSION['errorSubmitFile'] = 'This file very large'; 
        header('location: submitFile.php');
        die();
    }
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    $final_path = $root .'/Final-Project-Web/excerciseFile/'. $name;
    
    if (move_uploaded_file($temp_name, $final_path)){
        $_SESSION['successSubmitfile'] = 'This file has been saved';
        header('location: submitFile.php');
        die();
    }else {
        $_SESSION['errorSubmitFile'] = 'can not save the uploaded file';
        header('location: submitFile.php');
        die();
    }
    
?>