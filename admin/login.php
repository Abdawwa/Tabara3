<?php
require_once "../config.php";
require_once "../functions/validate.php";


if (isset($_POST['login_btn'])) {
    $admin_email = trim($_POST['admin_email']);
    $admin_pass = trim($_POST['admin_pass']);



    if (ChickEmpty($admin_email) && ChickEmpty($admin_pass)) {
        if (validEmail($admin_email)) {
            $sql = "SELECT * FROM `org_admin` WHERE org_admin_email ='$admin_email' AND org_admin_pass = '$admin_pass'";
            $result = mysqli_query($conn, $sql);
            $info = mysqli_fetch_array($result);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $admin_id = $info['org_admin_id'];
                session_start();
                $_SESSION['org_admin_name'] = $admin_email;
                $_SESSION['org_admin_id'] =$admin_id;
                header("location:admin_profile.php");
            } else {
                $error_message = "you are not admin";
            }
        } else {
            $error_message = "Email not valid";
        }
    } else {
        $error_message = "please fill all fields";
    }
}

require_once "../functions/messagees.php";
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
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <style>
        body {
            background-color: #dee9ff;
        }

        .registration-form {
            padding: 50px 0;
        }

        .registration-form form {
            background-color: #fff;
            max-width: 600px;
            margin: auto;
            padding: 50px 70px;
            border-radius: 25px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon {
            text-align: center;
            background-color: #5891ff;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 50px;
            line-height: 100px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .create-account {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #5791ff;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .social-media {
            max-width: 600px;
            background-color: #fff;
            margin: auto;
            padding: 35px 0;
            text-align: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            color: #9fadca;
            border-top: 1px solid #dee9ff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .social-icons {
            margin-top: 30px;
            margin-bottom: 16px;
        }

        .registration-form .social-icons a {
            font-size: 23px;
            margin: 0 3px;
            color: #5691ff;
            border: 1px solid;
            border-radius: 50%;
            width: 45px;
            display: inline-block;
            height: 45px;
            text-align: center;
            background-color: #fff;
            line-height: 45px;
        }

        .registration-form .social-icons a:hover {
            text-decoration: none;
            opacity: 0.6;
        }

        @media (max-width: 576px) {
            .registration-form form {
                padding: 50px 20px;
            }

            .registration-form .form-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }
        }
    </style>
</head>

<body>
    <div class="registration-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1 style="max-width: 220px; margin: auto; margin-bottom:20px">admin login</h1>
            <div class="form-group">
                <input type="text" name="admin_email" class="form-control item" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="admin_pass" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" name="login_btn" class="btn btn-block create-account">Login</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- <script src="assets/js/script.js"></script> -->
</body>

</html>