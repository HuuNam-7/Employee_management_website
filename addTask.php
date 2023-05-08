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

$departid = $user['id'];


$error    = '';

$id       = '';
$nametask = '';
$emptid      = '';
$status   = 0;
$daycreate    = '';

if (
    isset($_POST['id']) && isset($_POST['name']) && isset($_POST['employeeID'])
    && isset($_POST['date'])
) {

    $id       = $_POST['id'];
    $nametask = $_POST['name'];
    $emptid  = $_POST['employeeID'];
    $date   = $_POST['date'];

    $result = addTask($id, $nametask, $departid, $emptid, $status, $daycreate);
}


?>

<?php
$id2  = '';
$des = '';
$start  = '';
$end = '';
$mark = 0;
$filename = '';

if (
    isset($_POST['id2']) && isset($_POST['date1']) && isset($_POST['date2']) && isset($_POST['des'])
) {

    $id2       = $_POST['id2'];
    $start = $_POST['date1'];
    $end  = $_POST['date2'];
    $des  = $_POST['des'];

    $result2 = addDetailTask($id2, $des, $start, $end, $mark, $filename);
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js'></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <!-- icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>


    <link rel="stylesheet" href="./css/home/main.css">
    <link rel="stylesheet" href="./css/home/demo.css">
    <!-- <script src="./js/home/main.js"></script> -->
    <scrip src="./js/task.js"></scrip>


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
                <div class="row ml-2 mt-5">
                    <div class="content-wrapper3 col-5">
                        <h2 class="text-center">Add Task</h2>
                        <form class="mx-auto w-50" method="POST" action="addTask.php">
                            <div class="form-group">
                                <label for="id">ID Task:</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your ID')" oninput="this.setCustomValidity('')" type="text" class="form-control" id="id" placeholder="Enter ID" name="id">
                            </div>

                            <div class="form-group">
                                <label for="uname">Name Task:</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your Username')" oninput="this.setCustomValidity('')" type="text" class="form-control" id="uname" placeholder="Enter name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="uname">Employee ID:</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your Username')" oninput="this.setCustomValidity('')" type="text" class="form-control" id="uname" placeholder="Enter Employee ID" name="employeeID">
                            </div>

                            <div class="form-group">
                                <label for="dateCreate">Date time</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your datetime')" oninput="this.setCustomValidity('')" type="date" class="form-control" id="date" name="date">
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-success px-5 mr-1" type="submit" class="btn btn-default" onclick="showForm2()">Add</button>
                                <button class="btn btn-outline-primary px-5" type="reset" class="btn btn-default">Reset</button>
                            </div>

                        </form>

                    </div>

                    <div class="col-1"></div>

                    <div class="content-wrapper3 col-6">

                        <h2 class="text-center">Details Task</h2>
                        <form class="mx-auto w-50" method="POST" action="addTask.php">
                            <div class="form-group">
                                <label for="id2">ID Task:</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your ID')" oninput="this.setCustomValidity('')" type="text" class="form-control" id="id2" placeholder="Enter ID" name="id2">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="des"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="dateStart">Date start</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your datetime')" oninput="this.setCustomValidity('')" type="date" class="form-control" id="date" name="date1">
                            </div>

                            <div class="form-group">
                                <label for="dateEnd">Date end</label>
                                <input required oninvalid="this.setCustomValidity('Please enter your datetime')" oninput="this.setCustomValidity('')" type="date" class="form-control" id="date" name="date2">
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-success px-5 mr-1" type="submit" class="btn btn-default">Add</button>
                                <button class="btn btn-outline-primary px-5" type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form>


                    </div>
                </div>



                <!-- <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
                    </div>
                </footer> -->
            </div>

        </div>
    </div>
    <?php
    require_once('footer.php')
    ?>

    <script src="./js/home/main.js"></script>

</body>

</html>