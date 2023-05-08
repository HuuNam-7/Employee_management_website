<?php 
    session_start();
    $error = '';
    if(!empty($_SESSION['error'])){
        $error = $_SESSION['error'];
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-lg-8 mt-3">
        <form enctype="multipart/form-data" method="POST" action="upload.php">

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mt-2">Image</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="file" name="myFile" class="btn btn-outline-primary">
                </div>
            </div>
            <div class="row">

                <div class="col-sm-9"></div>
                <div class="col-sm-3 text-secondary">
                    <button type="submit" name="changeImage">
                        Save Change</button>
                </div>

                <?php
                    if(!empty($error)){
                    ?> <div class="alert alert-danger"><?=$error?></div><?php
                    }
                    ?>
            </div>
    </div>
    </div>
    </form>
</body>

</html>