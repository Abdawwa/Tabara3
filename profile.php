<?php
require_once "config.php";

session_start();
if (isset($_SESSION['user_email'])) {
    include "log_header.php";
    $user_email = $_SESSION['user_email'];
} else {
    header("Location: http://localhost/Tabara3/login.php");
}

$sql = "SELECT * FROM `users` WHERE `user_email` = '$user_email'";
$result = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($result);
$user_id = $info['id'];

$event_enrolled_query = "SELECT DISTINCT enrolled_events.event_attendance ,enrolled_events.event_id , events.event_name , events.event_description , events.event_img , events.event_start_date , events.event_end_date FROM `enrolled_events` INNER JOIN events ON enrolled_events.event_id = events.event_id WHERE `user_id`='$user_id'";
$result2 = mysqli_query($conn, $event_enrolled_query);
?>
<!--user info-->
<div class="profile">
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-secondary" id="form-toggle" href="#profile-settings">
                            <img src="images/pencil-fill.svg">
                        </a>
                    </div>
                    <div class="text-center">
                        <img src="images/img1.jpg" class="rounded-circle user-profile-pic-profile ">
                    </div>
                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white"><?php echo $info['user_name']; ?></span>

                    </div>

                    <div class="px-4 mt-1">
                        <span>
                            <h6>Email:</h6> <?php echo $info['user_email'] ?>
                        </span>
                        <span>
                            <h6>Phone:</h6><?php echo $info['user_phone'] ?>
                        </span>
                        <p class="fonts"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- user enrolled section -->
<div class="container mt-5 mb-5" id="timeline-appliedjob">
    <div class="d-flex justify-content-between">
        <h4>Enrolled Events</h4>
    </div>
    <div class="card-deck">
        <?php if (mysqli_num_rows($result2) > 0) {
            while ($info2 = mysqli_fetch_array($result2)) {
        ?>
                <div class="card col-lg-4 col-md-6">
                    <div class="card-body">
                        <img class="img-fluid" src="images\<?php echo $info2['event_img'] ?>">
                        <h3 class="card-title"><?php echo $info2['event_name'] ?></h3>
                        <label class="d-block font-weight-bold">Start Date</label>
                        <span class="card-title"><?php echo $info2['event_start_date'] ?></span>
                        <label class="d-block font-weight-bold">End Date</label>
                        <span class="card-title"><?php echo $info2['event_end_date'] ?></span>
                        <span class="card-title">Attendance: <?php echo trim($info2['event_attendance'], '"') ?></span>

                    </div>
                </div>
        <?php }
        } ?>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $name = $_POST['user_name'];
    $phone = $_POST['user_phone'];

    $sql = "update users set user_name ='$name', user_phone = '$phone' WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success_message = "Information Has Changed!";
    }
}
?>
<!--user profile form-->
<div class=" container rounded bg-white mt-5 mb-5 profile-form" id="profile-settings">
    <div class="container">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 profile-card">
            <div class="card h-100">
                <form method="POST" enctype="multipart/form-data" class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Name</label>
                                <input type="text" class="form-control" id="fullName" placeholder="Enter name" name="user_name" value="<?php echo $info['user_name'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" id="eMail" placeholder="Enter email ID" disabled value="<?php echo $info['user_email'] ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="user_phone" value="<?php echo $info['user_phone'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                                <?php if (isset($success_message) && $success_message != "") { ?>
                                    <p class="alert alert-success text-center" style="top: 5px; left: -10px;"><?php echo $success_message ?></p>
                                <?php } ?>

                                <?php if (isset($error_message) && $error_message != "") { ?>
                                    <p class="alert alert-danger text-center" style="top: 5px; left: -10px;"><?php echo $error_message ?></p>
                                <?php } ?>
                                <button type="submit" id="submit" name="submit" class="btn btn-success">Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $("#form-toggle").click(function() {
        $("#profile-settings").toggle();
    });
</script>
<?php
include "footer.php";
?>