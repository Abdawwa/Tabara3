<?php
require_once "../functions/validate.php";
session_start();

include "header_admin.php"; //necessary after [session_start()]

if (!isset($_SESSION['org_admin_id'])) {
    header("location:login.php");
}



/*****************************************to get the current event *****************/
$sql5 = "SELECT * FROM `events` WHERE `org_id` = '$org_id'";
$result5 = mysqli_query($conn, $sql5);

$event_id = $_GET['event_id'];
$sql = "SELECT * FROM `events` WHERE `event_id` = '$event_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {

    $current_eve = array();
    while ($row5 = mysqli_fetch_array($result5)) {
        $ev_org = $row5['event_id']; //current event


        array_push($current_eve, $row5['event_id']);
    }
    $arr = json_encode($current_eve);

    if ($row['event_id'] == null ||  !in_array($event_id, $current_eve)) {
        header("location:admin_profile.php");
    }
    // $url = "http://localhost/tabara3/admin/update_1.php?event_id=$event_id";

    // $get_url = parse_url($url);
    // $event_from_url = substr($get_url["query"], 9);
    // $event_int = (int)$event_from_url;

    // if (!in_array($event_int, $current_eve)) {
    //     header("Location:admin_profile.php");
    // }
}
/*****************************************to get the current event *****************/




// if (isset($_GET['event_id']) && is_numeric($_GET['event_id'])) {

//     $event_id = $_GET['event_id'];
//     // echo $org_id;
//     //  && $_GET['event_id'] !== null

//     $sql = "SELECT * FROM `events` WHERE `event_id` = '$event_id'";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_array($result);
//     if($row['event_id'] == null/* && $row5['event_id'] !== $_GET['event_id']*/)
//     {
//         header("location:admin_profile.php");
//     }
//     else
//     {

//         $event_id = $row['event_id'];
//         // echo $event_id;
//     }


// }
// else
// {
//     $error_message = "Event Does not exist";
// }
// require_once "../functions/messagees.php";
?>


<div class="container">
    <div class="text-center mt-5 ">
        <h1>Edit Event Number <?php echo $event_id ?></h1>
    </div>
    <div class="row">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form" enctype="multipart/form-data" method="POST" action="update_2.php">
                            <div class="controls">
                                <div class="col-md-12" style="padding: 0;">
                                    <div class="form-group">
                                        <label for="form_name">Event Name</label>
                                        <input id="form_name" type="text" name="event_name" class="form-control" placeholder="Write the name of the event" data-error="Firstname is required." value="<?php echo $row['event_name'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="form_name">Event Start Date</label>
                                        <input id="form_name" type="datetime-local" name="event_start_date" class="form-control" data-error="Please, Provide start date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['event_start_date'])) ?>" required>
                                    </div>
                                    <div class="form-group">

                                        <label for="form_name">Event End Date</label>
                                        <input id="form_name" type="datetime-local" name="event_end_date" class="form-control" data-error="Please, Provide end date" value="<?php echo date('Y-m-d\TH:i:s', strtotime($row['event_end_date'])) ?>" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Event Description</label>
                                            <textarea id="form_message" name="event_desc" class="form-control" placeholder="Write a description of the event" rows="4" data-error="Please, leave us a message." value="<?php echo $row['event_description'] ?>"> <?php echo $row['event_description'] ?> </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" name="Update_event" class="btn btn-success btn-send  pt-2 btn-block" value="Update">
                                    </div>
                                </div>
                                <input type="hidden" name="event_id" value="<?php echo $event_id ?>">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


















<script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>