<!DOCTYPE html>
<html lang="en">

<?php require('common/header.php');
    require_once("common/sqlconnect.php");

    $title = "Hub Home Page";
    $userrole = "Driver"; // Allows all users to access
    include "../login/misc/pagehead.php";
?>

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>
        The Veteran Fleet Hub
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet"/>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/demo/demo.css" rel="stylesheet"/>
</head>

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
                            <?php echo '<a class="nav-link" href="users/profile.php?id='.$_SESSION['uid'].'">' ?>
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

        <div class="panel-header panel-header-lg">
            <!--<canvas id="bigDashboardChart"></canvas>-->
            <div style="padding-left: 5px; padding-right: 5px" class="row">
                <div class="col-lg-3">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 style="text-align: center" class="card-title">Registered Users</h4>
                            <br>
                            <h5 style="text-align: center"><?php

                                        $connection = new Connection();
                                        $conn = $connection->getConnection();

                                        $sql = $conn->prepare("SELECT * FROM u_members WHERE banned = 0 AND verified = 1");
                                        $sql->execute();

                                        $count = $sql->rowCount();
                                        echo $count;

                                    ?></h5>
                        </div>
                        <div class="card-footer">
                            <div style="text-align: center" class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 style="text-align: center" class="card-title">Company Revenue</h4>
                            <br>
                            <h5 style="text-align: center">$0</h5>
                        </div>
                        <div class="card-footer">
                            <div style="text-align: center" class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated // Still coming
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 style="text-align: center" class="card-title">Company Jobs</h4>
                            <br>
                            <h5 style="text-align: center"><?php

                                    $sql = $conn->prepare("SELECT id FROM user_jobs");
                                    $sql->execute();
                                    $row = $sql->rowCount();

                                    echo $row;
                                ?></h5>
                        </div>
                        <div class="card-footer">
                            <div style="text-align: center" class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h4 style="text-align: center" class="card-title">Twitter Followers</h4>
                            <br>
                            <h5 style="text-align: center"><?php
                                    require_once('assets/TwitterAPIExchange.php');

                                    /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
                                    $settings = array(
                                        'oauth_access_token' => "1261301210-TDuNrXxEqAlKigPmHvBTeu4UDcdx0pEgUeen7zt",
                                        'oauth_access_token_secret' => "qhUcyi2DrdVx2eZLyQOa1ymaRfbT1ZZVs6GRwohm0e973",
                                        'consumer_key' => "gRxzBSnRiyugM5NLGhmwOgdDy",
                                        'consumer_secret' => "xv1MwvVHhyvUfP5tuFTmxsfi0vWqzdFZ9zbrW4W9KkotgatcMY"
                                    );

                                    $ta_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
                                    $getfield = '?screen_name=tvf_vtc';
                                    $requestMethod = 'GET';
                                    $twitter = new TwitterAPIExchange($settings);
                                    $follow_count=$twitter->setGetfield($getfield)
                                        ->buildOauth($ta_url, $requestMethod)
                                        ->performRequest();
                                    $data = json_decode($follow_count, true);
                                    $followers_count=$data[0]['user']['followers_count'];
                                    echo $followers_count;
                                    ?></h5>
                        </div>
                        <div class="card-footer">
                            <div style="text-align: center" class="stats">
                                <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="content">
            <div class="row">
                    <?php
                    $connection = new Connection();
                    $conn = $connection->getConnection();

                    $sql = $conn->prepare("SELECT id, event_name, organiser, date, start_time, truck FROM events ORDER BY `id` ASC LIMIT 3");
                    $sql->execute();
                    $result = $sql->fetchAll();
                    if ($auth->isDriver()) {
                        foreach ($result as $row) {
                            echo "
                                <div class=\"col-lg-4\">
                                    <div style='padding-right: 30px; padding-left: 30px;' class=\"card card-chart\">
                                        <div class=\"card-header\">
                                            <h4 style='text-align: center' class=\"card-title\">Upcoming Event {$row['event_name']}
                                        </div>
                                        <div class=\"card-body\">
                                            <div class=\"chart-area\">";

                            echo "Event Name: " . $row["event_name"];
                            echo "<br>";
                            echo "Event Orangiser: " . $row["organiser"];
                            echo "<br>";
                            echo "Event Date: " . $row["date"];
                            echo "<br>";
                            echo "Event Time: " . $row["start_time"];
                            echo "<br>";
                            echo "Event Truck: " . $row["truck"];
                            echo "<br>";
                            echo "<a href='viewevent.php?id={$row['id']}'><button type='submit' style='float: right;' class='btn btn-primary btn-round'>More Info</button></a>";

                            echo "
                                            </div>
                                        </div>
                                        <div class=\"card-footer\">
                                            <div class=\"stats\">
                                                <i class=\"now-ui-icons ui-2_time-alarm\"></i> {$row['date']}
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        }
                    } else {
                        echo "No Events Planned.";
                    } return null;
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card  card-tasks">
                                        <div class="card-header ">
                                            <h5 class="card-category">Backend development</h5>
                                            <h4 class="card-title">Tasks</h4>
                                        </div>
                                        <div class="card-body ">
                                            <div class="table-full-width table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="text-left">Sign contract for "What are conference organizers afraid
                                                            of?"
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title=""
                                                                    class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                                    data-original-title="Edit Task">
                                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title=""
                                                                    class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                                    data-original-title="Remove">
                                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox">
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="text-left">Lines From Great Russian Literature? Or E-mails From My
                                                            Boss?
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title=""
                                                                    class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                                    data-original-title="Edit Task">
                                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title=""
                                                                    class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                                    data-original-title="Remove">
                                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="checkbox" checked>
                                                                    <span class="form-check-sign"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="text-left">Flooded: One year later, assessing what was lost and what
                                                            was found when a ravaging rain swept through metro Detroit
                                                        </td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" rel="tooltip" title=""
                                                                    class="btn btn-info btn-round btn-icon btn-icon-mini btn-neutral"
                                                                    data-original-title="Edit Task">
                                                                <i class="now-ui-icons ui-2_settings-90"></i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title=""
                                                                    class="btn btn-danger btn-round btn-icon btn-icon-mini btn-neutral"
                                                                    data-original-title="Remove">
                                                                <i class="now-ui-icons ui-1_simple-remove"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer ">
                                            <hr>
                                            <div class="stats">
                                                <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-category">All Persons List</h5>
                                            <h4 class="card-title"> Employees Stats</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class=" text-primary">
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Country
                                                    </th>
                                                    <th>
                                                        City
                                                    </th>
                                                    <th class="text-right">
                                                        Salary
                                                    </th>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            Dakota Rice
                                                        </td>
                                                        <td>
                                                            Niger
                                                        </td>
                                                        <td>
                                                            Oud-Turnhout
                                                        </td>
                                                        <td class="text-right">
                                                            $36,738
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Minerva Hooper
                                                        </td>
                                                        <td>
                                                            Curaçao
                                                        </td>
                                                        <td>
                                                            Sinaai-Waas
                                                        </td>
                                                        <td class="text-right">
                                                            $23,789
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Sage Rodriguez
                                                        </td>
                                                        <td>
                                                            Netherlands
                                                        </td>
                                                        <td>
                                                            Baileux
                                                        </td>
                                                        <td class="text-right">
                                                            $56,142
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Doris Greene
                                                        </td>
                                                        <td>
                                                            Malawi
                                                        </td>
                                                        <td>
                                                            Feldkirchen in Kärnten
                                                        </td>
                                                        <td class="text-right">
                                                            $63,542
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Mason Porter
                                                        </td>
                                                        <td>
                                                            Chile
                                                        </td>
                                                        <td>
                                                            Gloucester
                                                        </td>
                                                        <td class="text-right">
                                                            $78,615
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
                                    </script>
                                    , Designed by
                                    <a href="https://www.invisionapp.com" target="_blank">Invision</a>. Coded by
                                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                                </div>
                            </div>
                        </footer>
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
