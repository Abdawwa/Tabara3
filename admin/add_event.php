<?php
require_once "../functions/validate.php";
session_start();

include "header_admin.php"; //necessary after [session_start()]

if (!isset($_SESSION['org_admin_id'])) {
    header("location:login.php");
}




if (isset($_POST['post_E'])) {
    $event_name = trim($_POST['event_name']);
    $event_desc = trim($_POST['event_desc']);
    $event_start_date = $_POST['event_start_date'];
    $event_end_date = $_POST['event_end_date'];
    $org_id = $_POST['org_id'];

    if (ChickEmpty($event_name) && ChickEmpty($event_desc)) {
        if (strtotime($event_start_date) < strtotime($event_end_date)) {


            $sql = "INSERT INTO `events` (event_name,event_description,org_id,event_start_date,event_end_date) VALUES ('$event_name','$event_desc','$org_id','$event_start_date','$event_end_date')";
            $result = mysqli_query($conn, $sql);
            if ($result > 0) {
                $success_message = "Event Posted";
            }
        } else {
            echo '<script type="text/javascript">swal("Date Error", "Please Provide a valid End date", "error");</script>';
        }
    } else {
        $error_message = "please fill all fields";
    }
}
require_once "../functions/messagees.php";
?>


<div class="container">
    <div class="text-center mt-5 ">
        <h1>Create Event</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form" enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="controls">
                                <div class="col-md-12" style="padding: 0;">
                                    <div class="form-group">
                                        <label for="form_name">Event Name</label>
                                        <input id="form_name" type="text" name="event_name" class="form-control" placeholder="Write the name of the event" data-error="Eventname is required.">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="form_name">Event Start Date</label>
                                    <input id="form_name" type="datetime-local" name="event_start_date" class="form-control" data-error="Please, Provide start date" required>
                                </div>
                                <div class="form-group">
                                    <label for="form_name">Event End Date</label>
                                    <input id="form_name" type="datetime-local" name="event_end_date" class="form-control" data-error="Please, Provide start date" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Event Description</label>
                                        <textarea id="form_message" name="event_desc" class="form-control" placeholder="Write a description of the event" rows="4" data-error="Please, leave us a message."></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" name="post_E" class="btn btn-success btn-send  pt-2 btn-block" value="Post">
                                </div>
                            </div>
                            <input type="hidden" name="org_id" value="<?php echo $org_id ?>">
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