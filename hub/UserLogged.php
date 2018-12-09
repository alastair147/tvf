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
                <li>
                    <a href="submit.php">
                        <i class="now-ui-icons files_paper"></i>
                        <p>Submit a Job</p>
                    </a>
                </li>
                <li class="active">
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
                    <?php echo '<a class="navbar-brand" href="#pablo">'.$_SESSION['username'].' - Your Jobs</a>' ?>
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
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title ">TVF Logged Jobs</h4>
                                            <p class="card-category">Find all our users logged jobs</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <?php
                                                    $u = $_SESSION['username'];

                                                    $connection = new Connection();
                                                    $conn = $connection->getConnection();

                                                    $sql = $conn->prepare("SELECT id, date, username, pickup_city, destination_city, cargo FROM user_jobs WHERE username=:id");
                                                    $sql->bindParam(':id', $u);                                                    $sql->execute();
                                                    $result = $sql->fetchAll();

                                                    echo "<table class=\"table\">
                                            <thead class=\" text-primary\">
                                            <th>
                                                ID:
                                            </th>
                                            <th>
                                                Date: 
                                            </th>
                                            <th>
                                                User: 
                                            </th>
                                            <th>
                                                Pickup:
                                            </th>
                                            <th>
                                                Destination:
                                            </th>
                                            <th>
                                                Cargo:
                                            </th>
                                            <th>
                                                View Job:
                                            </th>
                                            <th>
                                                Remove Job:
                                            </th>
                                            </thead>
                                            <tbody>";
                                                        // output data of each row
                                                        foreach ($result as $row) {
                                                            echo "<tr><td>".$row["id"]."</td><td>".$row["date"]."</td><td>".$row["username"]."</td><td>".$row["pickup_city"]."</td><td>".$row["destination_city"]."</td><td>".$row["cargo"]."</td><td><a href='viewjob.php?id={$row['id']}'>View Job</a></td><td><a href='common/deletejob.php?id={$row['id']}&user={$_SESSION['uid']}'>Remove</a></td>";
                                                        }
                                                        echo "</tr>";
                                                        echo "</table>";
                                                ?>

                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
