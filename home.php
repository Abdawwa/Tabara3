<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mainstyle.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>-->
    <title>Home</title>
</head>

<body>
    <!---------------------------------------------navbar------------------------------------------>
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <div class="container">
            <a class="navbar-brand logo" href="#">Tabara3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse main_links" id="navbarSupportedContent">
                <ul class="navbar-nav  ml-auto links">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <a type="button" class="btn btn-success btn" href="login.php">Login</a>
                <a type="button" class="btn btn-success btn" href="signup.php">signup</a>
            </div>
        </div>
    </nav>
    <!---------------------------------------------navbar------------------------------------------>
    <!---------------------------------------------Slide Show---------------------------->
    <div id="main-slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="home_img/img1.jpg" class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
                <img src="home_img/img2.jpg" class="d-block w-100 h-100">
            </div>
            <div class="carousel-item">
                <img src="home_img/img3.jpg" class="d-block w-100 h-100">
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
    <div class="overview">
        <div class="container">
            <h2>Tabara3 overview</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus voluptas consectetur aliquid temporibus
                quo! Quo, vel id laboriosam modi dolore sequi ab perferendis nobis odio debitis ratione, libero laborum rem?
            </p>
            <h5>Let's Start Today</h5>
        </div>
    </div>
    <!---------------------------------------------over Viwe tabara3------------------------------------------>

    <!--------------------------------Events ---------------------------------->
    <div class="Events">
        <div class="container">
            <h2>Events</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe placeat officiis amet vitae reiciendis qui
                obcaecati explicabo, aut, consectetur maiores consequuntur architecto tempore? Odit ipsa eos earum
                dignissimos illum maiores!</p>
            <div class="row">
                <div class="card col-lg-4 col-md-6">
                    <img class="card-img-top" src="home_img/img1.jpg">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                        <span>March 24 2019</span>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum blanditiis id
                            magni inventore eligendi maxime rem sit asperiores necessitatibus eos consequuntur vitae,
                            tempore dignissimos atque mollitia, impedit voluptatum illum illo?</p>
                        <a href="">Read More</a>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6">
                    <img class="card-img-top" src="home_img/img2.jpg">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                        <span>March 24 2019</span>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum blanditiis id
                            magni inventore eligendi maxime rem sit asperiores necessitatibus eos consequuntur vitae,
                            tempore dignissimos atque mollitia, impedit voluptatum illum illo?</p>
                        <a href="">Read More</a>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6">
                    <img class="card-img-top" src="home_img/img3.jpg">
                    <div class="card-body">
                        <h5 class="card-title">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</h5>
                        <span>March 24 2019</span>
                        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Harum blanditiis id
                            magni inventore eligendi maxime rem sit asperiores necessitatibus eos consequuntur vitae,
                            tempore dignissimos atque mollitia, impedit voluptatum illum illo?</p>
                        <a href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------Events---------------------------------->

    <!--------------------------------Organizations ---------------------------------->
    <div class="Organizations">
        <div class="container">
            <h2>Organizations</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe placeat officiis amet vitae reiciendis qui
                obcaecati explicabo, aut, consectetur maiores consequuntur architecto tempore? Odit ipsa eos earum
                dignissimos illum maiores!</p>
            <div class="card-deck">
                <div class="card col-lg-4 col-md-6">
                    <div class="card-body">
                        <img src="home_img/img1.jpg">
                        <h3 class="card-title">Organization 1</h3>
                        <a class="don-btn">donate now</a>
                    </div>
                </div>
                <div class="card col-lg-4 col-md-6">
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
                </div>
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
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 box">
                    <h1>tabara3</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam itaque, est facere culpa debitis
                        aspernatur accusantium perferendis esse praesentium harum qui provident eius placeat corrupti
                        facilis, deserunt, accusamus neque nobis?</p>
                    <i class="fa-solid fa-circle-arrow-right"></i>
                    <a href="#">read more</a>
                </div>
                <div class="col-lg-3 col-md box">
                    <h3>helpful links</h3>
                    <div class="links">
                        <ul class="list-unstyled active">
                            <li>
                                <i class="fa-solid fa-chevron-right"></i>
                                <a href="#!">about</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right"></i>
                                <a href="#!">Organizations</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-chevron-right"></i>
                                <a href="#!">partenrs</a>
                            </li>
                            <i class="fa-solid fa-chevron-right"></i>
                            <a href="#!">contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md box">
                    <h3>contact us</h3>
                    <p>524632 levo road near red fort.US</p>
                    <p>Phone:962-791445926</p>
                    <p>email:<a href="https://t.anshasi@gmail.com" style="text-transform: lowercase;">t.anshasi@gmail.com</a></p>
                </div>
            </div>
        </div>
    </div>
    <!--------------------------------footer ---------------------------------->























    <script src="js/main.js"></script>
    <!--<script src="js/all.min.js"></script>From Font Awesome (6)-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--From Bootstrap-->
</body>

</html>