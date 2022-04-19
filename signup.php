<?php
require_once "config.php";
require_once "functions/validate.php";
?>

<?php
if (isset($_POST['submit']) && isset($_POST['gender'])) {
    $userName = trim($_POST['userName']);
    $userEmail = trim($_POST['userEmail']);
    $userPass = trim($_POST['userPassword']);
    $userPhone = trim($_POST['userPhone']);
    $userGender = $_POST['gender'];



    if (ChickEmpty($userName) && ChickEmpty($userEmail) && ChickEmpty($userPass) && ChickEmpty($userPhone) && ChickEmpty($userGender)) {
        if (validEmail($userEmail)) {
            $sql2 = "SELECT `user_email` FROM `users` WHERE user_email = '$userEmail'";
            $select = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($select)) {
                $error_message = "Email is used";
            } else {
                $HashedPassword = password_hash($userPass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (`user_name`,`user_email`,`user_password`,`user_phone`,`user_gender`)
                VALUES ('$userName','$userEmail','$HashedPassword','$userPhone','$userGender')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $success_message = "Admin Add successfully";
                }
            }
        } else {
            $error_message = "Email Not Valid!!";
        }
    } else {
        $error_message = "Please fill All Filds";
    }
    //require_once 'functions/messagees.php';
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
    <title>sign up</title>
    <style>
        .form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: solid #5CDB95 2px;
            border-radius: 25px;
            padding: 25px 0;
            width: 400px;
            max-width: 100%;
            margin: auto;

        }

        .form-group {
            font-size: 20px;
            font-weight: 400;
        }

        .gender {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .sub-btn {
            float: right;
            border: none;
            padding: 10px 20px;
            background-color: #5CDB95;
            color: white;
            border-radius: 25px;
        }

        form {
            width: 250px;
        }

        @media (max-width:575px) {
            .form {
                padding: 0;
            }
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="signup">
        <div class="container">
            <div class="row col-md-6 d-flex justify-content-center form">
                <h2>Registration</h2>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label for="name">Username</label>
                        <input type="text" class="form-control" name="userName" id="name" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group ">
                        <label for="Email">Email</label>
                        <input type="text" class="form-control" name="userEmail" id="Email" placeholder="Email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group ">
                        <label for="Password">Password</label>
                        <input type="Password" class="form-control" name="userPassword" id="Password" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group ">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" name="userPhone" id="Phone" placeholder="Phone" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="form-group">
                        <label>Gender</label><br>
                        <div class="gender">
                            <input type="radio" id="Male" name="gender" value="Male">
                            <label for="Male">Male</label><br>
                            <input type="radio" id="Female" name="gender" value="Female">
                            <label for="Female">Female</label><br>
                        </div>
                    </div>
                    <div class="footer">
                        <?php if (isset($success_message) && $success_message != "") { ?>
                            <p class="alert alert-success text-center" style="top: 5px; left: -10px;"><?php echo $success_message ?></p>
                        <?php } ?>

                        <?php if (isset($error_message) && $error_message != "") { ?>
                            <p class="alert alert-danger text-center" style="top: 5px; left: -10px;"><?php echo $error_message ?></p>
                        <?php } ?>

                        <button type="submit" class="sub-btn" name="submit">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>