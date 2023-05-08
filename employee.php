<?php
session_start();
require_once('db/department_db.php');
require_once('db/employee_db.php');
require_once('db/account_db.php');
require_once('db/db.php');
if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

$user = $_SESSION['user'];
$userID = $user['id'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
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
                                <div class="row">
                                    <h1>
                                        <a class="text-dark" href="adminhome.php">
                                            <i class="fas fa-user-cog text-dark"></i> Admin
                                        </a>
                                        <small class="text-muted"> Overview</small>
                                    </h1>
                                </div>
                                <div class="row admins my-5">
                                    <div class="col-sm-4">
                                        <div class="card text-white cardAminHome mb-3">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-users fa-3x"></i>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="float-sm-right"><span
                                                                style="font-size: 30px"></span></div>
                                                        <div class="clearfix"></div>
                                                        <div class="float-sm-right mt-2">Notifications</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item list-group-item-action cardAminHomeDetail">
                                                <a href="empSeeTask.php">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <p class="">All Notifications</p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <i class="fa fa-arrow-right float-sm-right"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card text-white cardAminHome2 mb-3">
                                            <div class="card-header">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <i class="fa fa-users fa-3x"></i>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="float-sm-right"><span style="font-size: 30px"></div>
                                                        <div class="clearfix"></div>
                                                        <div class="float-sm-right mt-2">Total Task</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cardAminHomeDetail list-group-item list-group-item-action">
                                                <a href="submitFile.php">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <p class="">All Task</p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <i class="fa fa-arrow-right float-sm-right"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="card text-white cardAminHome3 mb-3">
                                            <div class="card-header">
                                                <?php
                                                $employeeDB = getEmployeeData();
                                                foreach ($employeeDB as $em) {
                                                    $img = $em['img'];
                                                    if ($em['id'] == $userID) {
                                                ?>
                                                <div class="row">
                                                    <div class="col-sm-6" class="w-50">
                                                        <img class="showimg w-25" src="images/<?= $img ?>">
                                                        <div style="font-size: 20px"></div>
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <div class="clearfix"></div>
                                                        <div class="float-sm-right">Welcome!</div>
                                                    </div>
                                                </div>
                                                <?php
                                                    }
                                                } ?>

                                            </div>
                                            <div class="cardAminHomeDetail list-group-item list-group-item-action">
                                                <a href="empProfile.php">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <p class="">Your Profile</p>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <i class="fa fa-arrow-right float-sm-right"></i>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row my-5">
                                    <h3>New Employee</h3>
                                    <table class="table table-striped table-hover table-bordered" id="data">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $employee_db = get_employee_limit();
                                            ?>
                                            <?php
                                            foreach ($employee_db as $emp) {
                                                $id = $emp['id'];
                                                $fullname = $emp['fullname'];
                                                $addresses = $emp['addresses'];
                                                $img = $emp['img'];
                                            ?>
                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $fullname ?></td>
                                                <td><?= $addresses ?></td>
                                                <td><?= $img ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <hr>
                                <!-- Nhúng PHP vào phần dưới hiển thị task -->
                                <div class="row my-5">
                                    <h3>New Task</h3>
                                    <table class="table table-striped table-hover table-bordered" id="data">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Depart ID</th>
                                                <th scope="col">Date create</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $employee_task = get_employee_task();
                                            ?>
                                            <?php
                                            foreach ($employee_task as $emp) {
                                                $id = $emp['id'];
                                                $fullname = $emp['nametask'];
                                                $addresses = $emp['departid'];
                                                $img = $emp['dayCreate'];
                                            ?>
                                            <tr>
                                                <td><?= $id ?></td>
                                                <td><?= $fullname ?></td>
                                                <td><?= $addresses ?></td>
                                                <td><?= $img ?></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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