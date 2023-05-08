<?php
session_start();
require_once('db/department_db.php');
require_once('db/employee_db.php');
require_once('db/account_db.php');
require_once('db/db.php');
require_once('db/task_employeeDB.php');

if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
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
    <!-- <script src="./js/home/main.js"></script> -->
    <script>
    $(document).ready(function() {
        $("button").click(function() {
            $("#<?= $taskId ?>").remove();
        });
    });
    </script>

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
            require_once("sideBarEmp.php")
            ?>

            <div class="main-panel m-5">
                <div class="content-wrapper5">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-tab">
                                <div class="row">
                                    <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-3 mt-3">
                                        <?php
                                        $userID = $_GET['id'];
                                        $taskEmployee = getTaskEmployeeData();
                                        foreach ($taskEmployee as $taskEm) {
                                            $nameTask = $taskEm['nametask'];
                                            $description = $taskEm['description'];
                                            $dayStart = $taskEm['stars'];
                                            $dayEnd = $taskEm['ends'];
                                            $taskId = $taskEm['id'];
                                            //print_r($taskId);
                                            if ($taskEm['employid'] == $userID) {

                                        ?>
                                        <div class="card text-xs-center card-totalDepart card-task" id="<?= $taskId ?>">
                                            <!-- Viết php hiển thị ID Task, name, description, day start, day end, emp id, status -->


                                            <div class="card-header">
                                                <a class="text-info" href="#">Task ID: <?= $taskId ?></a>
                                            </div>
                                            <div class="card-block">
                                                <h4 class="card-title">Name Task: <?= $nameTask ?></h4>
                                                <p class="card-text">Description: <?= $description ?></p>
                                                <p class="card-text">Day Start: <?= $dayStart ?></p>
                                                <p class="card-text">Day End: <?= $dayEnd ?></p>
                                            </div>
                                            <?php
                                            }
                                        }
                                            ?>

                                            <div class="card-footer text-muted">
                                                <form method="post" action="yesBtn.php?id=<?= $userID ?>">
                                                    <div class="btn-group">
                                                        <button class="btn btn-success" type="submit">Yes</button>
                                                    </div>

                                                </form>
                                                <!-- 1: accept -->
                                                <form method="post" action="noBtn.php?id=<?= $userID ?>">
                                                    <div class="btn-group">
                                                        <button class="btn btn-danger" type="submit">No</button>
                                                    </div>
                                                </form>
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
    </div>
    <?php
    require_once('footer.php')
    ?>

    <script src="./js/home/main.js"></script>

</body>

</html>