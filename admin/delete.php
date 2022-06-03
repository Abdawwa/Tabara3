<?php
session_start();

include "header_admin.php";

if (!isset($_SESSION['org_admin_id'])) {
    header("location:login.php");
}


$event_id = $_GET['event_id'];
echo $event_id;

$sql3 = "SELECT `event_name` FROM  `events` WHERE `event_id` = '$event_id'";
$result3 = mysqli_query($conn, $sql3);
$info = mysqli_fetch_array($result3);


// // $row = mysqli_fetch_array($result);

if (isset($_POST['del_event'])) {
    $sql = "DELETE FROM `events` WHERE `event_id` = '$event_id'";
    $result = mysqli_query($conn, $sql);
    header("location:admin_profile.php");
}
?>


<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
        </div>
        <div class="modal-body">
            <p>Are you Sure to Delete <?php echo $info['event_name'] ?>?</p>
        </div>
        <form method="POST">
            <div class="modal-footer">

                <input type="submit" value="Delete" name="del_event" class="btn text-white btn-danger">

                <a href="admin_profile.php" class="btn btn-secondary">Close</a>
            </div>
        </form>
    </div>
</div>