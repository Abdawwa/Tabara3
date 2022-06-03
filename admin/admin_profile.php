<?php
session_start();

include "header_admin.php";

if (!isset($_SESSION['org_admin_id'])) {
    header("location:login.php");
}

// echo $_SESSION['org_admin_name'];
// echo $_SESSION['org_admin_id'];

if (isset($_GET['date']) && $_GET['date'] == 0) {
    echo '<script type="text/javascript">swal("Date Error", "Please Provide a valid End date", "error");</script>';
}



//get events
$sql3 = "SELECT * FROM `events` WHERE `org_id` = '$org_id'";
$result3 = mysqli_query($conn, $sql3);
// $row4 = mysqli_fetch_assoc($result3);

// echo $row4['event_id'];
?>



<div class="Events" style="padding: 50px 0;background-color: #f7f7f7;">
    <div class="container">
        <div class="row">
            <!-- <div class="card-deck"> -->
            <?php
            if (mysqli_num_rows($result3) > 0) {
                while ($row3 = mysqli_fetch_array($result3)) {
            ?>

                    <div class="card col-lg-4 col-md-6">
                        <img class="card-img-top" width="300px" height="300px" src="../images/<?php echo $row3['event_img'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row3['event_name'] ?></h5>
                            <span><?php echo $row3['event_created_at'] ?></span>
                            <p class="card-text"><?php echo $row3['event_description'] ?></p>
                            <a href="update_1.php?event_id=<?php echo $row3['event_id'] ?>" class="btn btn-success">Edit</a><br>
                            <a href="view.php?event_id=<?php echo $row3['event_id'] ?>" class="btn btn-primary mt-3">View Member</a><br>
                            <a href="delete.php?event_id=<?php echo $row3['event_id'] ?>" class="btn btn-danger mt-3">Delete</a>

                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <!-- </div> -->
        </div>
    </div>
</div>



<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>