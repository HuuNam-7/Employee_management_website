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
            require_once("sideBarDepart.php");
            ?>

            <div class="main-panel m-5">
                <div class="content-wrapper5">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-tab">
                                <div class="row">
                                    <div class="col-12 p-3">
                                        <h2 class="text-dark text-center">List Of All Task</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="home-tab">
                                            <div class="row">
                                                <?php
                                                $taskDB = getTaskData();

                                                foreach ($taskDB as $task) { 
                                                    $user = $_SESSION['user'];
                                                    $userID = $user['id'];
                                                    $employID = $task['employid'];
                                                    $description = $task['description'];
                                                    $dayStart = $task['stars'];
                                                    $dayEnd = $task['ends'];
                                                    $nametask = $task['nametask'];
                                                    $taskID = $task['id'];
                                                    $departID = $task['departid'];
                                                    $status = $task['status'];
                                                    if($task['departid'] == $userID){
                                                        ?>
                                                <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mt-4">
                                                    <div class="card text-xs-center card-totalDepart card-task">
                                                        <!-- Viết php hiển thị ID Task, name, description, day start, day end, emp id, status -->
                                                        <div class="card-header">

                                                            <a class="text-info" href="#"><?= $taskID ?></a>
                                                            <div class="card-block">
                                                                <h4 class="card-title"><?= $nametask ?></h4>
                                                                <p class="card-text"><?= $description ?></p>
                                                                <p class="card-text"><?= $dayStart ?></p>
                                                                <p class="card-text"><?= $dayEnd ?></p>
                                                                <p class="card-text"><?= $employID ?></p>
                                                            </div>


                                                        </div>

                                                        <div class="card-footer text-muted">
                                                            <p class="card-text">Status: <?= $status ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                ?>

                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php
        require_once('footer.php')
        ?>


</body>

</html>