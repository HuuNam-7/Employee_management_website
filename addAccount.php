<?php
session_start();
require_once('db/account_db.php');
if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

$error = '';

$id = '';
$uname = '';
$password = '';
$decent = '';
$datetime = '';

$sql = "select count(*) from account where id = ? or username = ? ";
$conn = create_connection();

$stm = $conn->prepare($sql);
$stm->bind_param('ss', $id, $username);
$stm->execute();

$result = $stm->get_result();
$exists = $result->fetch_array()[0] === 1;

//var_dump($exists);
//echo $id;
if ($exists) {
    $error = 'trung id or username';
}


if (
    isset($_POST['id'])    && isset($_POST['decent'])
    && isset($_POST['uname']) && isset($_POST['date'])
) {
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    // $password = $_POST['pwd'];
    $decent = $_POST['decent'];
    $datetime = $_POST['date'];

    // register a new account
    // echo 'alert("message successfully sent")';
    $result = addAccount($id, $decent, $uname, $uname, $datetime);

    if (gettype($result) === 'boolean') {
        // header('Location: adminHome.php');
        // echo "Successful";
        // echo 'alert("message successfully sent")';
    } else {
        $error = $result;
    }
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
            require_once("sideBarAdmin.php")
            ?>

            <div class="main-panel m-5">
                <div class="row m-5">
                    <div class="content-wrapper6 col-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="row mx-5 mt-3">
                                    <div class="col-12">
                                        <h2 class="text-center">Add Account</h2>
                                    </div>
                                </div>
                                <div class="row mx-5 mt-3">
                                    <form class="mx-auto" method="POST">
                                        <div class="form-group">
                                            <label for="id">ID Account:</label>
                                            <input required oninvalid="this.setCustomValidity('Please enter your ID')"
                                                oninput="this.setCustomValidity('')" type="text" class="form-control"
                                                id="id" placeholder="Enter ID" name="id">
                                        </div>

                                        <div class="form-group">
                                            <label for="uname">Username:</label>
                                            <input required
                                                oninvalid="this.setCustomValidity('Please enter your Username')"
                                                oninput="this.setCustomValidity('')" type="text" class="form-control"
                                                id="uname" placeholder="Enter username" name="uname">
                                        </div>

                                        <!-- <div class="form-group ">
                                            <label for="pwd">Password</label>
                                            <input required oninvalid="this.setCustomValidity('Please enter your Password')" oninput="this.setCustomValidity('')" type="text" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                                        </div> -->

                                        <div class="form-group">
                                            <label for="decent">Decentralization</label>
                                            <select required class="form-control" id="decent" name="decent">
                                                <option value="admin">Admin</option>
                                                <option value="department">Department</option>
                                                <option value="employee">Employee</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date time</label>
                                            <input required
                                                oninvalid="this.setCustomValidity('Please enter your datetime')"
                                                oninput="this.setCustomValidity('')" type="date" class="form-control"
                                                id="date" name="date">
                                        </div>
                                        <button class="btn btn-success px-5 mr-1" type="submit"
                                            class="btn btn-default">Add</button>
                                        <button class="btn btn-outline-primary px-5" type="reset"
                                            class="btn btn-default">Reset</button>
                                    </form>
                                    <?php
                                    echo $error;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="content-wrapper6 col-6">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center text-dark mt-4 mb-3">Oder by time desending</h2>
                                <table class="table table-hover table-fixed">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Decentralization</th>
                                            <th>Date create</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $accountDB = get_account2();
                                            foreach ($accountDB as $ac) {
                                                $id = $ac['id'];
                                                $username = $ac['username'];
                                                $datetimes = $ac['datetimes'];
                                                $decentralization = $ac['decentralization'];

                                            ?>
                                        <tr class="">
                                            <td><?= $id ?></td>
                                            <td><?= $username ?></td>
                                            <td><?= $decentralization ?></td>
                                            <td><?= $datetimes ?></td>
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
        <?php
        require_once('footer.php')
        ?>

        <script src="./js/home/main.js"></script>
</body>

</html>