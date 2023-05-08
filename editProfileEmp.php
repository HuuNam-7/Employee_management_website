<?php
require_once('db/department_db.php');
require_once('db/employee_db.php');
require_once('db/account_db.php');
require_once('db/db.php');
session_start();

if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

$id = $_GET['id'];
$error = '';
$fullname = '';
$addresses = '';
$gender = '';
$phone = '';
$email = '';
$country = '';


// $sql = "select count(*) from account where id = ? or username = ? ";
// $conn = create_connection();

// $stm = $conn->prepare($sql);
// $stm->bind_param('ss',$id, $username); 
// $stm->execute();

// $result = $stm->get_result();
// $exists = $result->fetch_array()[0] === 1;

// //var_dump($exists);
// //echo $id;
// if($exists){
//     $error = 'trung id or username';
// }


if (
    isset($_POST['fullName'])    && isset($_POST['gender'])
    && isset($_POST['email']) && isset($_POST['phone'])
    && isset($_POST['address']) && isset($_POST['country'])
) {

    $fullname = $_POST['fullName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $addresses = $_POST['address'];
    $country = $_POST['country'];



    // print_r($id);
    // register a new account
    // echo 'alert("message successfully sent")';
    $result = uploadEmp($fullname, $addresses, $gender, $phone, $email, $country, $id);

    if (gettype($result) === 'boolean') {
        // header('Location: adminHome.php');
        echo "Successful";
        echo 'alert("message successfully sent")';
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
                <!-- <div class="content-wrapper7"> -->
                <div class="row ml-3 mt-3">
                    <div class="col-12">
                        <div class="home-tab">
                            <div class="row">
                                <div class="col-lg-4 mt-3">
                                    <div class="card cardProfile1">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <?php

                                                $employeeDB = getEmployeeData();
                                                foreach ($employeeDB as $em) {
                                                    if ($em['id'] == $id) {
                                                        $email = $em['email'];
                                                        $phone = $em['phone'];
                                                        $address = $em['addresses'];
                                                        $gender = $em['gender'];
                                                        $country = $em['country'];
                                                        $img = $em['img'];
                                                        $fullName = $em['fullname'];
                                                        $departID = $em['departID'];
                                                ?>
                                                <img src="images/<?= $img ?>" alt="Admin" class="rounded-circle w-25">
                                                <div class="mt-3">
                                                    <h4><?= $fullName ?></h4>
                                                    <form action="resetPassword.php?id=<?= $id ?>" method="POST">
                                                        <button class="btn btn-primary">Reset Password</button>
                                                    </form>

                                                </div>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </div>
                                            <hr class="my-4">
                                            <ul class="list-group list-group-flush">
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-globe me-2 icon-inline">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="2" y1="12" x2="22" y2="12"></line>
                                                            <path
                                                                d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                                            </path>
                                                        </svg>Website</h6>
                                                    <span class="text-secondary">https://sometext.com</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-github me-2 icon-inline">
                                                            <path
                                                                d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                                            </path>
                                                        </svg>Github</h6>
                                                    <span class="text-secondary">https://sometext.com</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-twitter me-2 icon-inline text-info">
                                                            <path
                                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                                            </path>
                                                        </svg>Twitter</h6>
                                                    <span class="text-secondary">https://sometext.com</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-instagram me-2 icon-inline text-danger">
                                                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5">
                                                            </rect>
                                                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z">
                                                            </path>
                                                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                        </svg>Instagram</h6>
                                                    <span class="text-secondary">https://sometext.com</span>
                                                </li>
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-facebook me-2 icon-inline text-primary">
                                                            <path
                                                                d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                                            </path>
                                                        </svg>Facebook</h6>
                                                    <span class="text-secondary">https://sometext.com</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 mt-3">
                                    <form method="post" action="">
                                        <div class="card cardProfile1 mb-4 p-3">
                                            <h2 class="text-center text-info">Edit Profile Employee</h2>
                                        </div>
                                        <div class="card cardProfile1">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="fullName">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2">Gender</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <select class="form-control" id="gender" name="gender">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="email">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2">Phone</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="phone">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="address">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h6 class="mt-2">Country</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <input type="text" class="form-control" name="country">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3 text-secondary">
                                                    <button type="submit" class="btn btn-success px-4"> Save
                                                        changes</button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- </div> -->
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