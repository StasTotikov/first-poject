<?php
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Project</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
<div class="row">
        <nav class="col-md-12">
            <?php include_once 'pages/menu.php'?>
            <?php include_once 'pages/functions.php'?>
            
        </nav>
    </div>

 

  

    <div class="row">
        <section class="col-md-12">
            <?php
            
                if (isset($_GET['page'])) {

                    switch ($_GET['page']) {
                        case 2:
                      
                            if($_SESSION['registered_user']!=''){
                                include_once 'pages/upload.php';
                            }
                            else{
                                echo '<script> window.location="index.php?page=4";</script>';
                                
                                
                            }
                            
                            break;
                        case 3:
                            include_once 'pages/gallery.php';
                            break;
                        case 4:
                            include_once 'pages/registration.php';
                            break;
                        case 1:
                            include_once 'pages/home.php';
                            break;
                    }
                } else {
                    include_once 'pages/home.php';
                }
            ?>
        </section>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>