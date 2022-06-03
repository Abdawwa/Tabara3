<?php
require_once "../functions/validate.php";
session_start();

include "header_admin.php"; //necessary after [session_start()]

if (!isset($_SESSION['org_admin_id'])) {
    header("location:login.php");
}


$event_id = $_GET['event_id'];
$sql = "SELECT * FROM `events` WHERE `event_id` = '$event_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$sql5 = "SELECT * FROM `events` WHERE `org_id` = '$org_id'";
$result5 = mysqli_query($conn, $sql5);

if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {

    $event_id = $_GET['event_id'];

    $sql = "SELECT * FROM `enrolled_events` WHERE `event_id` = '$event_id'";
    $result = mysqli_query($conn, $sql);



    $current_eve = array();
    while ($row5 = mysqli_fetch_array($result5)) {
        $ev_org = $row5['event_id']; //current event
        array_push($current_eve, $row5['event_id']);
    }

    if ($row['event_id'] == null ||  !in_array($event_id, $current_eve)) {
        header("location:admin_profile.php");
    }


?>
    <div class="container">
        <table class="table table-striped justify-content-center mt-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Status</th>
                    <th scope="col">Attendence</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {
                    $user_id = $row["user_id"];
                    $attendance = $row['event_attendance'];
                    $sql4 = "SELECT * from users WHERE `id` = '$user_id'";
                    $result4 = mysqli_query($conn, $sql4);

                    while ($row_users = mysqli_fetch_array($result4)) {
                ?>
                        <tr>
                            <th scope="row"><?php echo $user_id ?></th>
                            <td> <?php echo $row_users["user_name"]; ?></td>
                            <td> <?php echo $row_users["user_email"]; ?></td>
                            <td> <?php echo $row_users["user_phone"]; ?></td>
                            <td> <?php echo $row_users["user_gender"]; ?></td>
                            <td> <?php echo trim($attendance, '"'); ?></td>

                            <td>
                                <form method="POST">
                                    <input type="radio" value="absent" required name="data[att<?php echo $user_id ?>]">Absent
                                    <input type="radio" value="present" required name="data[att<?php echo $user_id ?>]">Present
                                    <input type="hidden" name="user[user]" value="<?php echo $user_id ?>">
                            </td>

                <?php

                    }

                    if (isset($_POST['submit'])) {
                        $status = json_encode($_POST['data']['att' . $user_id]);
                        $sql = "UPDATE `enrolled_events` SET `event_attendance`='$status' WHERE `user_id` = '$user_id' AND `event_id` ='$event_id' ";
                        mysqli_query($conn, $sql);
                        echo '<script type="text/javascript">swal("Attendance Success", "You have Took attendance successfully!", "success");</script>';
                    }
                }
            }
                ?>
                        </tr>
            </tbody>
        </table>

        <input type="submit" name="submit" value="Save Attendance" class="btn btn-success btn-lg btn-block float-right">
        </form>
    </div>




    <script src="../js/bootstrap.bundle.min.js"></script>
    </body>

    </html>