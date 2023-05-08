<?php
session_start();
require_once('db/department_db.php'); 
require_once('db/employee_db.php');
require_once('db/task_db.php');
require_once('db/account_db.php');
require_once('db/db.php');
if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

$user = $_SESSION['user'];
$userID = $user['id'];

if(isset($_SESSION['errorEmpProfile'])){
    $errorEmpProfile = $_SESSION['errorEmpProfile'];
    unset($_SESSION['errorEmpProfile']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <!-- icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="./css/home/main.css">
    <link rel="stylesheet" href="./css/home/demo.css">
    <script src="./js/home/main.js"></script>
    <!-- <script src="./js/home/main.js"></script> -->



</head>

<body>
    <div class="container-scroller">
        <?php
        require_once("navBar.php");
        ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper"></div>

            <!-- Vertical navbar -->
            <?php
            require_once("sideBarEmp.php");
            ?>

            <div class="main-panel m-5">
                <div class="content-wrapper mx-5 mt-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-tab">
                                <div class="row gutters-sm">

                                    <?php
                                    $user = $_SESSION['user'];
                                    $userID = $user['id'];
                                      
                                    $db = create_connection();
                                    $employeeDB = getEmployeeData();
                                    
                              
                                    
                                    foreach($employeeDB as $em){
                                    $employID = $em['id'];
                                    $fullname = $em['fullname'];
                                    $addresses = $em['addresses'];
                                    $img = $em['img'];
                                    $gender = $em['gender'];
                                    $phone = $em['phone'];
                                    $email = $em['email'];
                                    $country = $em['country'];
                                    $departID = $em['departID'];
                                    if($em['id'] == $userID){
                                        if (isset($_SESSION['fullFileNameEmployee'])){
                                            $fullFileNameEmployee = $_SESSION['fullFileNameEmployee'];
                                            $sql = "UPDATE employee set img = '$fullFileNameEmployee' where '$employID' = employee.id";
                                            mysqli_query($db, $sql);
                                        
                                        }
                                    ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="card my-5">

                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="images/<?= $img?>" alt="Admin"
                                                        class="rounded-circle w-25 h-50">
                                                    <div class="mt-3">
                                                        <h4><?= $fullname?></h4>
                                                        <form action="uploadEmpProfile.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="form-group mt-2">
                                                                <input type="file" name="myFile">
                                                                <button class="btn btn-primary mt-3"
                                                                    type="submit">Upload</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card my-5">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $fullname?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Gender</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $gender?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $email?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Phone</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?=$phone ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?=$addresses ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Country</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $country?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 font-weight-bold">Department ID</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <?= $departID?>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <?php
                                    if(!empty($errorEmpProfile)){
                                        ?>
                                    <div class="alert alert-danger"><?=$errorEmpProfile?></div><?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <?php
        require_once("footer.php");
        ?>


</body>

</html>