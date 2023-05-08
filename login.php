<?php
    require_once 'db/account_db.php';
    session_start();

    $error = '';
    $username = '';
    $password = ''; 
    $db = create_connection();

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username)) {
            $error = 'Please enter your username';
        }
        else if (empty($password)) {
            $error = 'Please enter your password';
        }
        else if (strlen($password) < 6) {
            $error = 'Password must have at least 6 characters';
        }
        else if (login($username, $password)) {
            /* query get user after login success */
            $query = "SELECT * FROM account WHERE username='$username' AND password='$password' LIMIT 1";
            $results = mysqli_query($db, $query);
            $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['user'] = $logged_in_user;
            
			if ($logged_in_user['decentralization'] == 'admin') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: adminhome.php');	  
			}
            elseif($logged_in_user['active'] == 0 && $logged_in_user['decentralization'] != 'admin'){
                header('location: firstLogin.php');
            }else{
                if($logged_in_user['decentralization'] == 'department'){
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['success']  = "You are now logged in";
                    header('location: departhome.php');	  
                }
                else {
                    $_SESSION['user'] = $logged_in_user;
                    $_SESSION['success']  = "You are now logged in";
                    header('location: employee.php');	 
                }
            }

            exit();
        }else {
            $error = 'Invalid username or password';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <!-- icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">



    <link rel="stylesheet" href="./css/login.css">
    <script src="./js/login.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="card card0 border-0 w-75 h-75 mx-auto my-3">
            <div class="row d-flex">
                <div class="col-lg-5 mx-auto my-auto">
                    <div class="card1 pb-5">
                        <div class="row mt-5 border-line bgr1">
                            <img src="./images/back4.jpg" class="img-thumbnail rounded mx-auto w-75">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="card2 card border-0 pt-3 mx-3 mt-5">
                        <!-- <span class="badge badge-success w-75 heading-log mx-auto mt-5">LOGIN FORM</span> -->
                        <div class="login-form mx-5 pl-5">
                            <form action="login.php" method="POST">
                                <div class="form-logo w-75 h-25">
                                    <h2 class="content-login text-center">Welcome!</h2>
                                    <img src="./images/logo.png" class="w-25 mt-4 mb-5 mx-auto"></img>
                                </div>
                                <div class="form-group w-75 form-group-lg">
                                    <!-- <label class="content-label" for="email">User name:</label> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control w-75" height="100"
                                            placeholder="Enter username" id="email" name="username">
                                    </div>


                                </div>
                                <div class="form-group w-75">
                                    <!-- <label class="content-label" for="pwd">Password:</label> -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control w-75" id="password"
                                            placeholder="Enter password" name="password">
                                        <div class="input-group-append">
                                            <span class="field-icon my-auto" onclick="password_show_hide();">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>

                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <div class="pretty p-switch">
                                                <input type="checkbox" />
                                                <div class="state">
                                                    <label>Remember me?</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php
                                    if (!empty($error)){
                                        ?>
                                    <div class="alert alert-danger"><?=$error?></div>
                                    <?php
                                    } ?>
                                    <?php
                                    ?>
                                    <button type="submit" class="btn btn-success w-75 mx-auto"
                                        name="login_btn"><span>Login</span>
                                        <div class="icon icon-round d-flex align-items-center justify-content-center">
                                            <i class="ion-ios-paper-plane"></i>
                                        </div>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3">
                    <div class="col-6 my-auto">
                        <small class="ml-4 ml-sm-5"></small>
                    </div>
                    <div class="col-6">
                        <div class="social-media">
                            <div class="social-icons d-flex justify-content-end">
                                <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
                                <a href="#"><i class="icon-social-google" title="Google"></i></a>
                                <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- <div class="card card0 border-0"> -->