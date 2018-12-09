<!DOCTYPE html>
<html lang="en">

<?php require('common/header.php');
    require_once("common/sqlconnect.php");

    $title = "TVF - Downloads";
    $userrole = "Driver"; // Allows all users to access
    include "../login/misc/pagehead.php";
?>

<body class="">
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
                <li>
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
                <li class="active">
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
                    <?php echo '<a class="navbar-brand" href="#pablo">Submit a Load</a>' ?>
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
        </nav>        <!-- End Navbar -->
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Submit a Job</h4>
                                    <p class="card-category">Complete this form to submit your job</p>
                                </div>
                                <div class="card-body">
                                    <form action="common/submit_job.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Enter your Username</label>
                                                    <input type="text" class="form-control" name="user" title="Username Goes Here" disabled required value="<?php echo $_SESSION['username'] ?>">
                                                    <input type="hidden" class="form-control" name="username" title="Username Goes Here" required value="<?php echo $_SESSION['username'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Date (Supply today's date in your timezone)</label>
                                                    <input type="date" class="form-control" name="date" title="Date you completed the job" required value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Pickup City</label>
                                                    <input type="text" class="form-control" name="pickupcity" required title="Location of the pickup">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Destination City</label>
                                                    <input type="text" class="form-control" name="destinationcity" required required title="Location of the Destination">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Pickup Company</label>
                                                    <input type="text" class="form-control" name="pickupcompany" required title="Company you picked up the load from">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Destination Company</label>
                                                    <input type="text" class="form-control" name="destinationcompany" required title="Company you dropped off the load to">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Distance Driven</label>
                                                    <input type="text" class="form-control" name="distance" required title="How far did you drive">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Were you in a convoy? (yes or no)</label>
                                                    <input type="text" class="form-control" name="convoy" required title="Did you drive with other users/SGC Drivers">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">What was your Cargo?</label>
                                                    <input type="text" class="form-control" name="cargo" required title="What was your cargo">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Total Weight of Cargo?</label>
                                                    <input type="text" class="form-control" name="weight" required title="How heavy was the load">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Potential Income</label>
                                                    <input type="text" class="form-control" name="potentialincome" maxlength="8" required title="How much were you expecting to make">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Total Income</label>
                                                    <input type="text" class="form-control" name="totalincome" maxlength="8" required title="The amount you made final">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Total Damage Taken</label>
                                                    <input type="text" class="form-control" name="totaldamage" required title="How much damage did you take">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary pull-right">Submit Job</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title"></h4>
                                    <p class="card-category">Extra Detail</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Notes</label>
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Coming Soon...</label>
                                                    <textarea class="form-control" rows="5" name="notes" disabled></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!--   Core JS Files   -->
                <script src="assets/js/core/jquery.min.js"></script>
                <script src="assets/js/core/popper.min.js"></script>
                <script src="assets/js/core/bootstrap.min.js"></script>
                <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
                <!--  Google Maps Plugin    -->
                <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
                <!-- Chart JS -->
                <script src="assets/js/plugins/chartjs.min.js"></script>
                <!--  Notifications Plugin    -->
                <script src="assets/js/plugins/bootstrap-notify.js"></script>
                <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
                <script src="assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
                <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
                <script src="assets/demo/demo.js"></script>
                <script>
                    $(document).ready(function () {
                        // Javascript method's body can be found in assets/js/demos.js
                        demo.initDashboardPageCharts();

                    });
                </script>
                </body>

                </html>
