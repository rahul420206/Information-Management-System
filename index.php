<?php include('includes/config.php') ?>
<?php include('header.php') ?>

<?php
$error = '';
if(isset($_POST['submit']))
{
  $name     = $_POST['name'];
  $email    = $_POST['email'];
  $password = md5(1234567890);
  $type     = $_POST['type'];

  $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");
  if(mysqli_num_rows($check_query) > 0)
  {
    $error = 'Email already exists';
  }
  else
  {    
    mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$password','$type')") or die(mysqli_error($db_conn));
    $_SESSION['success_msg'] = 'User has been succefuly registered';
    header('location: index.php');
    exit;
  }
  
}

?>


<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
<a class="navbar-brand" href="#"><b>IMS</b></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
  aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent-333">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">ABOUT Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Courses</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Events</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">Dropdown
      </a>
      <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto nav-flex-icons">

    <li class="nav-item dropdown">
       <?php if (isset($_SESSION['login'])) { ?>
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user mr-2"></i>Account
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-default"
        aria-labelledby="navbarDropdownMenuLink-333">
        <a class="dropdown-item" href="/ims/admin/dashboard.php">Dashboard</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
      </div>
      <?php } else {?>
      <a href="login.php" class="nav-link"><i class="fa fa-user mr-2"></i>User login</a>
        <?php } ?>
    </li>
  </ul>
</div>
</nav>
<!--/.Navbar -->

 <div class="d-flex shadow" style="height:500px;background:linear-gradient(-45deg, #3923a7 50%, transparent 50%)">
    <div class="container-fluid my-auto">
      <div class="row">
          <div class="col-lg-6 my-auto">
          <h1 class="display-3 font-weight-bold" style="font-size: 60px;">Information Management System</h1>
              <p style="text-align: left;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt suscipit accusamus, ratione doloribus, qui fugiat neque provident autem facilis laboriosam iste! Excepturi reprehenderit corrupti nulla doloribus optio dolorum tenetur error.</p>
              <a href="" class="btn btn-lg btn-primary">Call to Action </a>
          </div>
          <div class="col-lg-6">
                <div class="col-lg-8 mx-auto card shadow-lg">
                  <div class="card-body">
                    <h3>Sign Up form</h3>
                    <form action="" method="post" class="">
                    <!-- Material input --> 
                    <div class="md-form">
                      <input type="text"  id="form1" class="form-control">
                      <label for="form1">Your Name</label>
                    </div>
                    <!-- Material input --> 
                    <div class="md-form">
                      <input type="email"  id="email" class="form-control">
                      <label for="email">Your Email</label>
                    </div>
                    <!-- Material input --> 
                    <div class="md-form">
                      <input type="text"  id="mobile" class="form-control">
                      <label for="mobile">Your Mobile</label>
                    </div>
                    <!-- Material input --> 
                    <div class="md-form">
                      <input type="text"  id="Department" class="form-control">
                      <label for="Department">Category</label>
                    </div>
                    <!-- Material input -->
                    <div class="md-form">
                  <!-- <input type="text" id="class" class="form-control"> -->
                  <textarea name="" id="message" class="form-control md-textarea" rows="3"></textarea>
                  <label for="message">Password </label>
                </div>

                    <button class="btn btn-primary btn-block">Submit Form</button>
                </form>
                  </div>
                </div>
          </div>
      </div>
    </div>
 </div>



<!--- About Us ---->
<section class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 py-5 ">
        <h2 class="font-weight-bold">About <br>  Information Management System</h2>
        <div class="pr-5">
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque quidem id ad dolores iusto nobis sunt, atque, eligendi nesciunt ipsa aliquam mollitia nemo magnam quae adipisci libero voluptatum omnis vel. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo dicta ipsum ea sint quisquam sit dignissimos numquam. Velit aliquid necessitatibus id adipisci officiis nobis voluptates maiores consectetur, sunt nisi? Commodi.</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quos ab, recusandae repellendus cum quasi totam saepe sit earum tenetur modi vitae explicabo, neque, consequatur aut ipsam dolore magni laudantium?</p>
        </div>
        <a href="about-us.php" class="btn btn-secondary">Know More</a>
      </div>
      <div class="col-lg-6" style="background:url(./assets/images/chi.jpg)">
      </div>
    </div>
  </div>
</section>
<style>
  .course-image
  {
    width:100%;
    height: 170px !important;
    object-fit: cover;
    object-position: center;
  }
  </style>
<!-- Our Courses -->
<section class="py-5 bg-light">
  <div class="text-center mb-5">
    <h2 class="font-weight-bold">Internships</h2>
    <p class="text-muted">We are Hiring Interns! So what are you waiting for? Participate now and start applying to internships before others!</p>
  </div>

  <div class="container">
    <div class="row">
          
      <?php 
      $query = mysqli_query($db_conn,"SELECT * FROM courses ORDER BY id DESC LIMIT 0, 8");
      while($course = mysqli_fetch_object($query))
      {?>
      <div class="col-lg-3 mb-4">
        <div class="card">
          <div>
            <img src="./dist/uploads/<?php echo $course->image?>" alt="" class="img-fluid rounded-top course-image">
          </div>
          <div class="card-body">
            <b><?php echo $course->name?></b>
            <p class="card-text">
              <b>Duration: </b> <?php echo $course->duration?> <br>
              <b>Stipend: </b> 4000/- Rs
            </p>
            <form method="post" action="enroll.php">
              <input type="hidden" name="course_id" value="<?php echo $course->id ?>">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>
              <button type="submit" class="btn btn-block btn-primary btn-sm" onclick="window.location.href='index.php';">Enroll Now</button>

            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>


  


  <!-- Teachers -->
  <section class="py-5">
    <div class="text-center mb-5">
      <h2 class="font-weight-bold">Our Teachers</h2>
      <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
    </div>

    <div class="container">
      <div class="row">
        <?php for ($i = 0; $i < 6; $i++){ ?>
        <div class="col-lg-4 my-5">
          <div class="card">
            <div class="col-5 position-absolute" style="top:-50px">
              <img src="./assets/images/placeholder.jpg" alt="" class="mw-100 border rounded-circle">
            </div>
            <div class="card-body pt-5 mt-4">
              <h5 class="card-title mb-0">Teacher's Name</h5>
              <p><i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i> <i class="fa fa-star text-warning"></i></p>
              <p class="card-text">
                <b>Courses: </b> 5 <br>
                <b>Ratings: </b> 
              </p>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <h2 class="font-weight-bold">Our College</h2>
  <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
<style>
h2 {
  text-align: center;
}

p {
  text-align:center;
}

</style>

<br>

<br>


<br>

<br>

<br>

<br>

<!---Achievements--->
<!---<style>
body {font-family:Arial, Helvetica, sans-serif; font-size:12px;}

.fadein { 
position:relative; height:332px; width:500px; margin:0 auto;
background: url("slideshow-bg.png") repeat-x scroll left top transparent;
padding: 10px;
 }
.fadein img{
	position:absolute;
	width: calc(96%);
    height: calc(94%);
    object-fit: scale-down;
}
</style> --->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
$(function(){
	$('.fadein img:gt(0)').hide();
	setInterval(function(){$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');}, 3000);
});
</script>
<div class="slider-container">
  <div class="fadein">
    <?php 
      // display images from directory
      // directory path
      $dir = "./slider/";

      $scan_dir = scandir($dir);
      foreach($scan_dir as $img):
        if(in_array($img,array('.','..')))
          continue;
    ?>
    <img src="<?php echo $dir.$img ?>" alt="<?php echo $img ?>">
    <?php endforeach; ?>
  </div>
</div>

<style>
  .slider-container {
    max-width: 500px;
    margin: 0 auto;
    text-align: center;
  }
  
  .fadein {
    position: relative;
    height: 332px;
    margin: 0 auto;
    background: url("slideshow-bg.png") repeat-x scroll left top transparent;
    padding: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .fadein img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 200%;
    height: 200%;
    object-fit: scale-down;
  }
  
</style>


<br>

<br>

<br>

<br>



<!-- Test -->

<html>
<head>
	<meta charset="UTF-8">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="style.css"/>
<!--Jquery-->
<script type="text/javascript" src="./js/JQuery3.3.1.js"></script>
<script type="text/javascript" src="./js/lightslider.js"></script>


<br>
<br>
<br>
</div>

<div class="section">
    <hr style="margin: 10px 0px;">

    <div class="grid-cont">
    <h4 style="font-size: 36px; font-weight: bold; text-align: left;">Achievements</h4>
    <h3 style="font-size: 18px; font-weight: bold; text-align: left; margin-bottom: 25px;">Photos of students who got placed in campus placements</h3>
        <div class="grid">
        <div class="grid1">
             <div class="grid-img"><img src="images/1.jpg"></div>
             <div class="grid-text">
                 <p>N. Praveen</p>
                 <p>Company: Google</p>
                <p>Package: 50 LPA</p>
             </div>
        </div>
      <div class="grid1">
             <div class="grid-img"><img src="images/2.jpg"></div>
             <div class="grid-text">
                 <p>R. Mukesh</p>
                 <p>Company: Apple</p>
                <p>Package: 50 LPA</p>
             </div>
        </div>
        <div class="grid1">
             <div class="grid-img"><img src="images/5.jpg"></div>
             <div class="grid-text">
                 <p>N. James</p>
                 <p>Company: Amazon</p>
                <p>Package: 45 LPA</p>
             </div>
        </div>
        <div class="grid1">
             <div class="grid-img"><img src="images/9.jpg"></div>
             <div class="grid-text">
                 <p>P. Chetan</p>
                 <p>Company: Microsoft </p>
                <p>Package: 40 LPA</p>
             </div>
        </div>
        <div class="grid1">
             <div class="grid-img"><img src="images/2.jpg"></div>
             <div class="grid-text">
                 <p>S. Anirudh</p>
                 <p>Company: Netflix</p>
                <p>Package: 40 LPA</p>
             </div>
        </div>
        <div class="grid1">
             <div class="grid-img"><img src="images/1.jpg"></div>
             <div class="grid-text">
                 <p>S. Vikas</p>
                 <p>Company: Flipkart</p>
                <p>Salary: 40 LPA</p>
             </div>
        </div>
        <div class="grid1">
             <div class="grid-img"><img src="images/l-7.jpg"></div>
             <div class="grid-text">
                 <p>adcb</p>
                 <p>Company: XYZ Inc.</p>
                <p>Salary: 40 LPA</p>
             </div>
        </div>
        <div class="grid1">
             <div class="grid-img"><img src="images/l-8.jpg"></div>
             <div class="grid-text">
                 <p>Test</p>
                 <p>Company: XYZ Inc.</p>
                <p>Salary: 40 LPA</p>
             </div> 
        </div>
    </div>
</div>

<style>
    hr {
        margin: 20px auto;
        width: 50%;
        text-align: left;
    }

    .grid-text p {
        margin-bottom: 10px;
        line-height: 1.2em;
        font-weight: bold;
        text-align: left;
    }
    .section {
    background-color: #f1f1f1; /* Set your desired background color here */
    padding: 20px; /* Add some padding to the section to create some space between the content and the background */
}

</style>


<script src="./js/script.js" type="text/javascript"></script>
</div>
</body>
</html>


<!---Testimonals--->
<section class="py-5">
  <div class="text-center mb-5">
    <h2 class="font-weight-bold">What Pepole Says</h2>
    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus perspiciatis obcaecati facilis nulla</p>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="border rounded position-relative">
          <div class="p-4 text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi dolorum officia illum, cumque quo accusamus expedita dignissimos eligendi libero eum perferendis quos, aliquid assumenda! Cumque a quis molestias.
          </div>
          <i class="fa fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
        </div>
        <div class="text-center mt-n2">
          <img src="./assets/images/placeholder.jpg" alt="" class="rounded-circle border" width="100" height="100">
          <h6 class="mb-0 font-weight-bold">Name Of Candidate</h6>
          <p><i>Designation</i></p>
        </div>
      </div>
      <div class="col-6">
        <div class="border rounded position-relative">
          <div class="p-4 text-center">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus corporis quasi dolorum officia illum, cumque quo accusamus expedita dignissimos eligendi libero eum perferendis quos, aliquid assumenda! Cumque a quis molestias.
          </div>
          <i class="fa fa-quote-left fa-3x position-absolute" style="top:.5rem; left: .5rem; opacity:.2"></i>
        </div>
        <div class="text-center mt-n2">
          <img src="./assets/images/placeholder.jpg" alt="" class="rounded-circle border" width="100" height="100">
          <h6 class="mb-0 font-weight-bold">Name Of Candidate</h6>
          <p><i>Designation</i></p>
        </div>
      </div>
    </div>
  </div>
</section>


<!----Footer---->
<footer style="background:url(./assets/images/chi.jpg) center/cover no-repeat">
  <div  class="py-5 text-white" style="background:#000000bb"> 
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <h5>Useful Links</h5>

            <ul class="fa-ul ml-4">
              <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Home</a></li>
              <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>About Us</a></li>
              <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Courses</a></li>
              <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Terms & Conditions</a></li>
              <li><a href="" class="text-light"><i class="fa-li fa fa-angle-right"></i>Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-lg-4">
            <h5>Social Presence</h5>

            <div>
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-facebook-f fa-stack-1x fa-inverse text-dark"></i>
              </span>
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-instagram fa-stack-1x fa-inverse text-dark"></i>
              </span>
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-twitter fa-stack-1x fa-inverse text-dark"></i>
              </span>
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-linkedin fa-stack-1x fa-inverse text-dark"></i>
              </span>
              <span class="fa-stack">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fab fa-youtube fa-stack-1x fa-inverse text-dark"></i>
              </span>
            </div>
          </div>
          <div class="col-lg-3">
            <h5>Subscribe Now</h5>
            <form action="">
              <!-- Material input -->
              <div class="form-group">
                <input type="email" id="email-s" class="form-control" placeholder="Your Email">
              </div>
              <button class="btn btn-secondary py-2 btn-block">Submit</button>
            </form>
          </div>
        </div>
    </div>
  </div>
</footer>

<section class="py-2 bg-dark text-light">
  <div class="container-fluid">
    Copyright 2022-2023 All Rights Reseved. <a href="#" class="text-light">Information Management System</a>
  </div>
</section>

<?php include('footer.php') ?>