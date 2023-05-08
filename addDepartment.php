<?php
session_start();

if (empty($_SESSION['user'])) {
    header('location: index.php');
    die();
}

require_once('db/account_db.php');

$error    = '';

$id       = '';
$fullname = '';
$address  = '';
$img      = 'avatar.png';
$gender   = '';
$phone    = '';
$email    = '';
$country  = '';
$faID = '';

if (
    isset($_POST['id'])      && isset($_POST['name'])    && isset($_POST['address'])
    && isset($_POST['gender'])  && isset($_POST['phone'])   && isset($_POST['email'])
    && isset($_POST['country']) && isset($_POST['faID'])
) {

    $id       = $_POST['id'];
    $fullname = $_POST['name'];
    $address  = $_POST['address'];
    //$img      = $_POST['img'];
    $gender   = $_POST['gender'];
    $phone    = $_POST['phone'];
    $email    = $_POST['email'];
    $country  = $_POST['country'];
    $faID = $_POST['faID'];

    $result = addDepart($id, $fullname, $address, $img, $faID, $gender, $phone, $email, $country);
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
            <form class="m-5" method="post" action="addDepartment.php">
                <div class="main-panel m-5">
                    <div class="content-wrapper4">
                        <div class="row">
                            <div class="col-12">
                                <div class="home-tab">
                                    <div class="row">
                                        <div class="col-md-3 border-right">
                                            <!-- <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                <img class="rounded-circle mt-5" width="150px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQF2psCzfbB611rnUhxgMi-lc2oB78ykqDGYb4v83xQ1pAbhPiB&usqp=CAU">
                                                <span class="font-weight-bold">Amelly</span>
                                                <span class="text-black-50">amelly12@bbb.com</span>
                                                <span></span>
                                            </div> -->
                                            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                                <img class="rounded-circle mt-5 w-75" src="images/avatar.png">
                                                <span class="font-weight-bold">Nam Nguyen</span>
                                                <span class="text-black-50">nguyennam@mail.com</span>
                                                <span> </span>
                                            </div>
                                        </div>

                                        <div class="col-md-5 border-right">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h4 class="text-right">Profile Settings</h4>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-md-6">
                                                        <label class="labels">FullName</label>
                                                        <input required oninvalid="this.setCustomValidity('Please enter your Name')" oninput="this.setCustomValidity('')" type="text" class="form-control" placeholder="first name" value="" name="name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="labels">Id</label>
                                                        <input required oninvalid="this.setCustomValidity('Please enter your ID')" oninput="this.setCustomValidity('')" type="text" class="form-control" value="" placeholder="id" name="id">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 mt-3">
                                                        <label class="labels">PhoneNumber</label>
                                                        <input required oninvalid="this.setCustomValidity('Please enter your PhoneNumber')" oninput="this.setCustomValidity('')" type="text" class="form-control" placeholder="Enter Phone Number" value="" name="phone">
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label class="labels">Address</label>
                                                        <input required oninvalid="this.setCustomValidity('Please enter your Address')" oninput="this.setCustomValidity('')" type="text" class="form-control" placeholder="Enter Address" value="" name="address">
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <label class="labels">Email ID</label>
                                                        <input required oninvalid="this.setCustomValidity('Please enter your Email ID')" oninput="this.setCustomValidity('')" type="text" class="form-control" placeholder="Enter Email" value="" name="email">
                                                    </div>
                                                </div>
                                                <div class="mt-5 text-center">
                                                    <button class="btn btn-success profile-button" type="submit">Save
                                                        Profile</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="p-3 py-5">
                                                <div class="d-flex justify-content-between align-items-center experience">
                                                    <span>Information</span><span class="border px-3 p-1 add-experience">
                                                        <i class="fa fa-plus"></i>&nbsp;Some Text
                                                    </span>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label for="gender" class="labels">Gender</label>
                                                    <select class="form-control" id="gender" name="gender">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="col-md-12">
                                                    <label class="labels">Country</label>
                                                    <input required oninvalid="this.setCustomValidity('Please enter your Country')" oninput="this.setCustomValidity('')" type="text" class="form-control" placeholder="Enter country" name="country">
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <label class="labels">Falculty ID</label>
                                                    <input required oninvalid="this.setCustomValidity('Please enter your Department ID')" oninput="this.setCustomValidity('')" type="text" class="form-control" placeholder="Enter ID" name="faID">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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