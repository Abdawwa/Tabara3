<?php
require_once "config.php";


//for header
session_start();
if (isset($_SESSION['user_email'])) {
    include "log_header.php";
} else {
    include 'header.php';
}

//for pagination
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$num_per_page = 03;
$start_from = ($page - 1) * 03;

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

    <div class="Events" style="padding: 50px 0;background-color: #f7f7f7;">
        <div class="container">
            <div class="row">

                <?php
                $sql = "SELECT * FROM `events` limit $start_from,$num_per_page";
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
                                        <input type="hidden"
                                               value="<?php echo $info['id'] ?>"
                                               name="user_id">
                                        <input type="hidden" value="<?php echo $row['event_id'] ?>" name="event_id">
                                        <button type="submit" class="btn btn-success btn rounded-pill text-white"
                                                name="submit">
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

                <!--<div class="card col-lg-4 col-md-6">
                    <div class="card-body">
                        <img src="home_img/img2.jpg">
                        <h3 class="card-title">Organization 2</h3>
                        <a class="don-btn">donate now</a>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6">
                    <div class="card-body">
                        <img src="home_img/img3.jpg">
                        <h3 class="card-title">Organization 3</h3>
                        <a class="don-btn">donate now</a>
                    </div>
                </div>-->

            </div>
        </div>
    </div>


    <ul class="pagination" style="    margin: auto; justify-content: center; background-color: #f7f7f7 ">
        <?php
        $pr_query = "SELECT * FROM `events`";
        $pr_result = mysqli_query($conn, $pr_query);
        $total_record = mysqli_num_rows($pr_result);

        $total_page = ceil($total_record / $num_per_page);

        if ($page > 1) {
            echo "<li class='page-item'><a class='page-link' style='background-color: #5CDB95; color: white;' href='events.php?page=" . ($page - 1) . "'>Previous</a></li>";
        }

        for ($i = 1; $i < $total_page; $i++) {
            echo "<li class='page-item'><a class='page-link' style='color:#5CDB95' href='events.php?page=" . $i . "'>$i</a></li>";
        }


        if ($i > $page) {
            echo "<li class='page-item'><a class='page-link' style='background-color: #5CDB95; color: white;' href='events.php?page=" . ($page + 1) . "'>Next</a></li>";
        }
        ?>
    </ul>
<?php
include "footer.php";
?>