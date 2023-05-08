<?php
session_start();
require_once('db/department_db.php');
require_once('db/employee_db.php');
require_once('db/account_db.php');
require_once('db/db.php');
require_once('db/task_db.php');
if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

if(isset($_SESSION['errorSubmitFile'])){
    $errorSubmitFile = $_SESSION['errorSubmitFile'];
    unset($_SESSION['errorSubmitFile']);
}

if(isset($_SESSION['successSubmitfile'])){
    $successSubmitfile = $_SESSION['successSubmitfile'];
    unset($_SESSION['successSubmitfile']);
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
                <div class="content-wrapper2">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-tab">
                                <div class="row my-5">
                                    <h3>Tasks</h3>
                                    <table class="table table-striped table-hover table-bordered" id="data">

                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Depart ID</th>
                                                <th scope="col">Filename</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Mark</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
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
                                            if($ta['employid'] == $userID){
                                                if(isset($_SESSION['fullFileNameSubmitFile'])){
                                                    $fullFileNameSubmitFile = $_SESSION['fullFileNameSubmitFile'];
                                                    $sql = "UPDATE detailtask set detailtask.filename = '$fullFileNameSubmitFile' where detailtask.id = '$taskid'";
                                                    mysqli_query($db, $sql);
                                                }
                                                ?>
                                            <tr>
                                                <th><?= $taskid?></th>
                                                <th><?= $nametask?></th>
                                                <th><?= $departID ?></th>
                                                <th>
                                                    <form method="post" action="uploadSubmitFile.php"
                                                        enctype="multipart/form-data">
                                                        <input type="file" name="myFile">
                                                        <button class="btn btn-dark text-white">Submit</button>
                                                    </form>
                                                </th>
                                                <th><?= $status?></th>
                                                <th><?= $mark?></th>
                                            </tr>
                                            <?php
                                            }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                if(!empty($errorSubmitFile)){
                                    ?>
                                <div class="alert alert-danger"><?= $errorSubmitFile?></div>
                                <?php
                                }if(!empty($successSubmitfile)){
                                    ?>
                                <div class="alert alert-success"><?= $successSubmitfile?> </div>
                                <?php
                            }
                            ?>

                                <?php
                                ?>
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