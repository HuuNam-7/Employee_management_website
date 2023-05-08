<?php
session_start();
require_once('db/department_db.php');
require_once('db/employee_db.php');
require_once('db/account_db.php');
require_once('db/db.php');
require_once('db/director_db.php');
if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

?>
<?php
require_once('db/account_db.php');
// $deptID = '';

// if(    isset($_POST['id'])      && isset($_POST['name'])    && isset($_POST['address'])
//     && isset($_POST['gender'])  && isset($_POST['phone'])   && isset($_POST['email'])   
//     && isset($_POST['country']) && isset($_POST['deptID'])  )
// {


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
            require_once("sideBarAdmin.php");
            ?>

            <div class="main-panel m-5">
                <div class="content-wrapper back-profile-depart">
                    <div class="row">
                        <div class="col-12">
                            <div class="home-tab">
                                <div class="row d-flex justify-content-center mt-5">
                                    <?php
                                    $id = $_GET['id'];
                                    //echo $id;
                                    $departmentDB = get_department();
                                    foreach ($departmentDB as $de) {
                                        if ($de['id'] == $id) {
                                            //echo $de['id'];
                                            $email = $de['email'];
                                            $phone = $de['phone'];
                                            $address = $de['addresses'];
                                            $gender = $de['gender'];
                                            $country = $de['country'];
                                            $falculty = $de['falculty'];
                                            $img = $de['img'];
                                            $fullName = $de['fullname'];
                                    ?>
                                            <div class="col-xl-8 col-md-12">
                                                <div class="card cardProfile2 user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block imgProfile text-center text-white mt-5">
                                                                <div class="my-auto">
                                                                    <img src="images/<?= $img ?>" class="img-radius w-50 view overlay hm-zoom" alt="User-Profile-Image">
                                                                </div>
                                                                <h6 class="f-w-600 mt-3"><?= $fullName ?> </h6>
                                                                <p><?= $id ?></p>
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8 bg-c-lite-green2">
                                                            <div class="card-block my-auto">
                                                                <h6 class="mb-2 mt-2 pb-3 b-b-default f-w-600">Information</h6>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Email</p>
                                                                        <h6 class="text-muted f-w-400"><?= $email ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Phone</p>
                                                                        <h6 class="text-muted f-w-400"><?= $phone ?></h6>
                                                                    </div>
                                                                </div>
                                                                <div class="row mt-3">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Address</p>
                                                                        <h6 class="text-muted f-w-400"><?= $address ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Gender</p>
                                                                        <h6 class="text-muted f-w-400"><?= $gender ?></h6>
                                                                    </div>
                                                                </div>
                                                                <h6 class="my-3 pb-3 pt-4 b-b-default f-w-600">More</h6>

                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Country</p>
                                                                        <h6 class="text-muted f-w-400"><?= $country ?></h6>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Falculty</p>
                                                                        <h6 class="text-muted f-w-400"><?= $falculty ?></h6>
                                                                    </div>
                                                                </div>
                                                                <hr class="bg-white">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <form method="post">

                                                                            <div class="button-group pl-0 pt-3">
                                                                                <a class="btn btn-light" href="editProfileDepart.php?id=<?= $id ?>" role="button">Edit</a>
                                                                                <button name="delete" type="submit" class="btn btn-light">Delete</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-6">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                    <?php
                                            if (isset($_POST['delete'])) {
                                                deleteD($id);
                                                echo "<meta http-equiv='refresh' content='0.25;url=totalDepartment.php'>";
                                            }
                                        }
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
    <?php
    require_once("footer.php");
    ?>

    <script src="./js/home/main.js"></script>
</body>

</html>