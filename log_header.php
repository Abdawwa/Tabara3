<?php
require_once "config.php";

//session_start();

$user_email = $_SESSION['user_email'];

$sql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http - equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script><!-- -->
</head>

<body>
    <!---------------------------------------------navbar------------------------------------------>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand logo" href="#"> Tabara3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse main_links" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center  ml-auto links">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php"> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> About Us </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Contact Us </a>
                    </li>
                    <li class="nav-item dropdown active">
                        <!--<a class="nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>-->
                        <button type="button" class="btn btn-success" style="background-color: #5CDB95; border-radius:10px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $info['user_name']; ?>
                        </button>
                        <div class="dropdown-menu" style="left: -20px;" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!--<div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            click
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </div>-->

<!--</body>

</html>-->
<!--</body>-->