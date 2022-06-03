<?php
require_once "../config.php";

$admin_id = $_SESSION['org_admin_id'];

$sql1 = "SELECT * FROM `org_admin` WHERE `org_admin_id` = '$admin_id'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($result1);

//get organization
$sql2 = "SELECT * FROM `organization` WHERE `org_admin_id` = '$admin_id'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_array($result2);

$org_id = $row2['org_id']; //to get all events for the organization


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class=" navbar navbar-dark navbar-expand-lg  bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand logo" href="admin_profile.php">Admin <?php echo $row1["org_admin_name"] . " [" . $row2['org_name'] . "]" ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse main_links" id="navbarSupportedContent">
                <ul class="navbar-nav align-items-center  ml-auto links">
                    <li class="nav-item dropdown active">
                        <!--<a class="nav-link  dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </a>-->
                        <button type="button" class="btn btn-primary" style="border-radius:10px" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $row1["org_admin_name"] ?>
                        </button>
                        <div class="dropdown-menu" style="left: -20px;" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="add_event.php">Add Event</a>
                            <a class="dropdown-item" href="admin_profile.php">Profile</a>
                            <a class="dropdown-item" href="admin_logout.php">Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>