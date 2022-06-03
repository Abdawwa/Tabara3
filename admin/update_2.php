<?php
require_once "../config.php";
require_once "../functions/validate.php";




if (isset($_POST['Update_event'])) {
    $new_ev_name = $_POST['event_name'];
    $new_ev_desc = $_POST['event_desc'];
    $event_id = $_POST['event_id'];
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];




    if (ChickEmpty($new_ev_name) && ChickEmpty($new_ev_desc)) {
        if (strtotime($event_start_date) < strtotime($event_end_date)) {
            $sql = "UPDATE `events` SET `event_name` = '$new_ev_name' , `event_description` = '$new_ev_desc' , `event_start_date` = '$event_start_date' , `event_end_date`='$event_end_date' WHERE `event_id` = '$event_id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location:admin_profile.php");
            }
        } else {
            header("location:admin_profile.php?date=0");
        }
    }
    // require_once "../functions/messagees.php";
}
