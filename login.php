<?php
require_once "config.php";
require_once "functions/validate.php";
include "header.php";
if (isset($_POST['submit'])) {
    $userEmail = trim($_POST['userEmail']);
    $userPass = trim($_POST['userPass']);


    if (ChickEmpty($userEmail) && ChickEmpty($userPass)) {
        if (validEmail($userEmail)) {
            $sql = "SELECT * FROM `users` WHERE user_email ='$userEmail'";
            $result = mysqli_query($conn, $sql);
            //$info = mysqli_fetch_assoc($result);
            $row = mysqli_num_rows($result);
            if ($row > 0) {
                $info = mysqli_fetch_array($result); //Get Password From Database
                $dbPass = $info['user_password'];
                //header("location:home.php");
                if (password_verify($userPass, $dbPass)) {
                    session_start();
                    $_SESSION['user_email'] = $userEmail;
                    $user_id = $_SESSION['id'];
                    header("location:home.php");
                } else {
                    $error_message = "Password Error";
                }
            } else {
                $error_message = "Email or Password Error";
            }
        } else {
            $error_message = "Email Not Valid";
        }
    } else {
        $error_message = "Please fill All Fields";
    }
    require_once "functions/messagees.php";
}
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <title>Login</title>
        <style>
            .padding {
                padding: 5rem !important;
                background-color: rgb(127 188 255);
            }

            .signup-form {
                background-color: #fff;
                padding: 45px;
                border-radius: 25px;
                width: 500px;
                max-width: 100%;
                margin: auto;
            }

            h2 {
                font-size: 36px;
                letter-spacing: 0.08em
            }

            .signup-form .form-control {
                font-size: 16px;
                padding: 10px 15px;
                color: #555;
                background-color: #fff;
                border-radius: 3px
            }

            .signup-form input {
                border: 1px solid #eee;
                height: 38px;
                box-shadow: none !important;
            }

            .btn-blue {
                background: #28a745;
                padding: 10px 28px;
                border: 2px solid #28a745;
                color: #fff;
                border-radius: 50px;
                font-weight: 700;
                letter-spacing: 0.08em;
                -webkit-transition: 0.5s all;
                transition: 0.5s all;
                outline: none !important
            }

            .btn-blue:hover,
            .btn-blue:focus,
            .btn-blue:active {
                background: #fff;
                color: #496174
            }
        </style>
    </head>

    <body>
    <div class="padding d-flex justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <form class="signup-form" enctype="multipart/form-data" method="POST"
                  action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h2 class="text-center">Login</h2>
                <div class="form-group"><input type="text" name="userEmail" class="form-control"
                                               placeholder="Email Address"></div>
                <div class="form-group"><input type="password" name="userPass" class="form-control"
                                               placeholder="Password"></div>
                <div class="form-group text-center">
                    <button type="submit" name="submit" class="btn btn-blue btn-block">Start Now</button>
                </div>
            </form>
        </div>
    </div>
    </body>
    </html>
<?php
include "footer.php";
?>