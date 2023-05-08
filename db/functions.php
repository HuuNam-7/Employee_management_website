<?php 
    session_start();
    //connect to database
    $db = mysqli_connect('localhost', 'root', '', 'managesystem');
    print_r($db);
    
    //Variable declaration
    $username = "";
    $error = array();

    if (isset($_POST['login_btn'])){
        isLogin();
    }
    
    function isLogin(){
        global $db, $username, $error;

        //grap form values
        $username = e($_POST['username']);
        $password = e($_POST['password']);

        //make sure form is filled properly
        if (empty($username)) {
            array_push($error, "Username is required");
        }
        if (empty($password)) {
            array_push($error, "Password is required");
        }
        
        // attempt login if no errors on form
	if (count($error) == 0) {
		//$password = md5($password);

		$query = "SELECT * FROM account WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['decentralization'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: adminhome.php');	  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: department.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
    }

    function getUserById($id){
        global $db;
        $query = "SELECT * FROM users WHERE id=". $id;
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    
    //escape string
    function e($val){
        global $db;
        return mysqli_real_escape_string($db, trim($val));
    }

    function display_error(){
        global $error;
        if(count($error) > 0){
            echo '<div class="error">';
            foreach($error as $error){
                echo $error .'<br>';
            }
            echo '</div>';
        }
    }
    
    function issLoggedIn(){
        if(isset($_SESSION['user'])){
            return true;
        }else {
            return false;
        }
    }

    function isAdmin(){
        if(isset($_SESSION['user']) && $_SESSION['user']['decentralization'] == 'admin'){
            return true;
        }else{
            return false;
        }
    }
    
?>