<!--<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
</head>

<body>-->

<!---------------------------------------------navbar------------------------------------------>
<?php
include "config.php";
session_start();
if (isset($_SESSION['user_email'])) {
    include "log_header.php";
} else {
    include 'header.php';
}
if (isset($_POST['submit'])) {
    $user_id = $_POST['user_id'];
    $event_id = $_POST['event_id'];
    $event_counter = 0;
    $events = array();

    $sql3 = "SELECT event_enrolled FROM events WHERE event_id = '$event_id'";
    $result3 = mysqli_query($conn, $sql3);
    $row = mysqli_fetch_array($result3);
    $event_counter = $row[0];

    $sql2 = "SELECT event_id FROM enrolled_events WHERE user_id = '$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    while ($row2 = mysqli_fetch_array($result2)) {
        array_push($events, $row2['event_id']);
    }
    if (!in_array($event_id, $events)) {
        $event_counter++;
        $sql3 = "UPDATE events SET event_enrolled ='$event_counter' WHERE event_id ='$event_id'";
        mysqli_query($conn, $sql3);
        $sql = "INSERT INTO enrolled_events(`user_id`,`event_id`) VALUES ('$user_id','$event_id')";
        $result = mysqli_query($conn, $sql);
        echo '<script type="text/javascript">swal("Enroll Success", "You have enrolled , Check your profile!", "success");</script>';
    } else {
        echo '<script type="text/javascript">swal("Enrolled", "Previously enrolled", "error");</script>';
    }
}

?>

<!---------------------------------------------navbar------------------------------------------>
<!---------------------------------------------Slide Show---------------------------->
<div id="main-slider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/img1.jpg" class="d-block w-100 h-100">
        </div>
        <div class="carousel-item">
            <img src="images/img2.jpg" class="d-block w-100 h-100">
        </div>
        <div class="carousel-item">
            <img src="images/img3.jpg" class="d-block w-100 h-100">
        </div>
    </div>
    <ol class="carousel-indicators">
        <li data-target="main-slider" data-slide-to="0" class="active"></li>
        <li data-target="main-slider" data-slide-to="1"></li>
        <li data-target="main-slider" data-slide-to="2"></li>
    </ol>
</div>
<!---------------------------------------------Slide Show---------------------------->
<!---------------------------------------------over Viwe tabara3------------------------------------------>
<div class="overview" id="overview">
    <div class="container">
        <h2>Tabara3 overview</h2>
        <p>Tabara3 is a website that helps the community to find a suitable event for volunteering and it was founded in
            2022.
        </p>
        <h5>Let's Start Today</h5>
    </div>
</div>
<!---------------------------------------------over Viwe tabara3------------------------------------------>

<!--------------------------------Events ---------------------------------->
<div class="Events">
    <div class="container">
        <h2>Events</h2>
        <div class="row">
            <?php
            $sql = "SELECT * FROM `events` ORDER BY `event_enrolled` DESC , `event_created_at` ASC LIMIT 3";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="card col-lg-4 col-md-6">
                        <img class="card-img-top" src="images/img1.jpg">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['event_name'] ?></h5>
                            <span><?php echo $row['event_created_at'] ?></span>
                            <p class="card-text"><?php echo $row['event_description'] ?></p>
                            <?php if (isset($_SESSION['user_email'])) {
                            ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <input type="hidden" value="<?php echo $info['id'] ?>" name="user_id">
                                    <input type="hidden" value="<?php echo $row['event_id'] ?>" name="event_id">
                                    <button type="submit" class="btn btn-success btn rounded-pill text-white" name="submit">
                                        Enroll
                                    </button>
                                </form>
                            <?php } else { ?>
                                <a href="login.php" class="btn btn-success btn rounded-pill text-white">
                                    Enroll
                                </a>
                            <?php } ?>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
        <div class="mt-5 link">
            <a class="vm-org" style="background-color: #5CDB95; color:white ;padding:15px; text-decoration: none; border-radius:25px;" href="events.php">View More</a>
        </div>
    </div>
</div>
<!--------------------------------Events---------------------------------->

<!--------------------------------Organizations ---------------------------------->
<div class="Organizations">
    <div class="container">
        <h2>Organizations</h2>
        <div class="card-deck">
            <?php
            $sql2 = "SELECT * FROM `organization` LIMIT 3";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                while ($row2 = mysqli_fetch_array($result2)) {
            ?>

                    <div class="card col-lg-4 col-md-6">
                        <div class="card-body">
                            <img src="images/img1.jpg">
                            <h3 class="card-title"><?php echo $row2['org_name'] ?></h3>
                            <a class="don-btn" href="<?php echo $row2['org_link'] ?>" target="_blank">donate now</a>
                        </div>
                    </div>

            <?php
                }
            }
            ?>
        </div>
        <div class="mt-5 link">
            <a class="vm-org" style="background-color: #5CDB95; color:white ;padding:15px; text-decoration: none; border-radius:25px;" href="organization.php">View More</a>
        </div>
    </div>
</div>
<!--------------------------------Organizations ---------------------------------->

<!--------------------------------Choose Us Section---------------------------------->
<!--<div class="Choose-Us">
    <div class="container">
        <div class=" col-md-6 box">
            <div class="content">
                <div class="text">
                    <h1>Why Choose Us</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quibusdam culpa aliquid
                        distinctio, quia magnam rem dolor facere impedit error aliquam accusamus deleniti inventore
                        eaque architecto perspiciatis rerum, soluta illum!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum eaque sint itaque, disti</p>
                    <button>view more</button>
                </div>
            </div>
        </div>
    </div>
</div>-->
<!--------------------------------Choose Us Section---------------------------------->
<!--------------------------------Statistics Section---------------------------------->
<div class="Statistics">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 box">
                <i class="fa-solid fa-person"></i>
                <span>88</span>
                <p>our clients</p>
            </div>
            <div class="col-sm-6 col-lg-3 box">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <span>43</span>
                <p>Charity</p>
            </div>
            <div class="col-sm-6 col-lg-3 box">
                <i class="fa-solid fa-briefcase"></i>
                <span>122</span>
                <p>partenrs</p>
            </div>
            <div class="col-sm-6 col-lg-3 box">
                <i class="fa-solid fa-message"></i>
                <span>555</span>
                <p>quistions answers</p>
            </div>
        </div>
    </div>
</div>
<!--------------------------------Statistics Section---------------------------------->
<!--------------------------------footer---------------------------------->
<?php
include "footer.php";
?>
<!--------------------------------footer ---------------------------------->
<!--</body>

</html>-->