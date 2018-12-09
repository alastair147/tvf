<!DOCTYPE html>
<html lang="en">

<?php require('../common/header.php');
    require_once("../common/sqlconnect.php");

    $title = "User Profile";
    $userrole = "Driver"; // Allows all users to access
    include "../../login/misc/pagehead.php";
?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
        The Veteran Fleet Hub
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="user-profile">
  <div class="wrapper ">
      <div class="sidebar" data-color="blue">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
          <div class="logo">
              <a href="#" class="simple-text logo-mini">
                  TVF
              </a>
              <a href="#" class="simple-text logo-normal">
                  The Veteran Fleet
              </a>
          </div>
          <div class="sidebar-wrapper">
              <ul class="nav">
                  <li class="active ">
                      <a href="index.php">
                          <i class="now-ui-icons tech_watch-time"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li>
                      <a href="downloads.php">
                          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
                          <p>Downloads</p>
                      </a>
                  </li>
                  <li>
                      <a href="submit.php">
                          <i class="now-ui-icons files_paper"></i>
                          <p>Submit a Job</p>
                      </a>
                  </li>
                  <li>
                      <a href="UserLogged.php">
                          <i class="now-ui-icons ui-1_bell-53"></i>
                          <p>Your Logged Jobs</p>
                      </a>
                  </li>
                  <li>
                      <a href="loggedjobs.php">
                          <i class="now-ui-icons ui-1_bell-53"></i>
                          <p>All Logged Jobs</p>
                      </a>
                  </li>
                  <li>
                      <a href="loa.php">
                          <i class="now-ui-icons tech_watch-time"></i>
                          <p>Holiday / Leave form</p>
                      </a>
                  </li>
                  <!-- ADMIN ONLY SECTION -->
                  <?php if ($auth->isStaff()): ?>
                      <li>
                          <a href="../admin/users.php">
                              <i class="now-ui-icons users_single-02"></i>
                              <p>Users</p>
                          </a>
                      </li>
                      <li>
                          <a href="admin/leaveforms.php">
                              <i class="now-ui-icons ui-1_calendar-60"></i>
                              <p>Submitted Leave Forms</p>
                          </a>
                      </li>
                      <li>
                          <a href="admin/adminevents.php">
                              <i class="now-ui-icons business_badge"></i>
                              <p>All Events</p>
                          </a>
                      </li>
                      <li>
                          <a href="admin/newevent.php">
                              <i class="now-ui-icons files_single-copy-04"></i>
                              <p>Submit a Event</p>
                          </a>
                      </li>
                  <?php endif; ?>
                  <?php if ($auth->isMedia()): ?>
                      <li>
                          <a href="admin/upload.php">
                              <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
                              <p>Upload File</p>
                          </a>
                      </li>
                  <?php endif; ?>
                  <li>
                      <a href="../login/logout.php">
                          <i class="now-ui-icons media-1_button-power"></i>
                          <p>Logout</p>
                      </a>
                  </li>
              </ul>
          </div>
      </div>
      <div class="main-panel">
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
              <div class="container-fluid">
                  <div class="navbar-wrapper">
                      <div class="navbar-toggle">
                          <button type="button" class="navbar-toggler">
                              <span class="navbar-toggler-bar bar1"></span>
                              <span class="navbar-toggler-bar bar2"></span>
                              <span class="navbar-toggler-bar bar3"></span>
                          </button>
                      </div>
                      <?php echo '<a class="navbar-brand" href="#pablo">Dashboard - Hello, '.$_SESSION['username'].'</a>' ?>
                  </div>
                  <div class="collapse navbar-collapse justify-content-end" id="navigation">
                      <ul class="navbar-nav">
                          <li class="nav-item">
                              <a class="nav-link" href="#pablo">
                                  <i class="now-ui-icons users_single-02"></i>
                                  <p>
                                      <span class="d-lg-none d-md-block">Account</span>
                                  </p>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </nav>
          <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Email">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Andrew">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="Mike">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="Andrew">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/bg5.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
                    <h5 class="title">Mike Andrew</h5>
                  </a>
                  <p class="description">
                    michael24
                  </p>
                </div>
                <p class="description text-center">
                  "Lamborghini Mercy
                  <br> Your chick she so thirsty
                  <br> I'm in that two seat Lambo"
                </p>
              </div>
              <hr>
              <div class="button-container">
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-facebook-f"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-twitter"></i>
                </button>
                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                  <i class="fab fa-google-plus-g"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container">
          <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by
            <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
</body>

</html>