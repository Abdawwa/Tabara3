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

?>

<div class="Organizations" style="padding: 50px 0;">
    <div class="container">
        <div class="card-deck">

            <?php
            $sql = "SELECT * FROM `organization` limit $start_from,$num_per_page";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <div class="card col-lg-4 col-md-6">
                        <div class="card-body">
                            <img width="300px" height="300px" src="images/<?php echo $row['org_img']?>">
                            <h3 class="card-title"><?php echo $row["org_name"] ?></h3>
                            <a class="don-btn" href="paypal.php" target="_blank">donate</a>
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
    $pr_query = "SELECT * FROM `organization`";
    $pr_result = mysqli_query($conn, $pr_query);
    $total_record = mysqli_num_rows($pr_result);

    $total_page = ceil($total_record / $num_per_page);

    if ($page > 1) {
        echo "<li class='page-item'><a class='page-link' style='background-color: #5CDB95; color: white;' href='organization.php?page=" . ($page - 1) . "'>Previues</a></li>";
    }

    for ($i = 1; $i < $total_page; $i++) {
        echo "<li class='page-item'><a class='page-link' style='color:#5CDB95' href='organization.php?page=" . $i . "'>$i</a></li>";
    }



    if ($i > $page) {
        echo "<li class='page-item'><a class='page-link' style='background-color: #5CDB95; color: white;' href='organization.php?page=" . ($page + 1) . "'>Next</a></li>";
    }
    ?>
</ul>















<?php
include "footer.php";
?>