<head>
    <!-- Main Style Sheet -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- Fonts and Icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
</head>

<?php

$footer = "<footer class=\"footer\">
            <div class=\"container-fluid\">
                <nav class=\"float-left\">
                    <ul>
                      <li>
                        <a href=\"https://www.creative-tim.com\">
                          SGC Logistics Hub
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <div class=\"copyright float-right\">
                    &copy;
                    <script>
                      document.write(new Date().getFullYear())
                    </script>, made with <i class=\"material-icons\">favorite</i> by
                    <a href=\"http://thewebdevguys.host\" target=\"_blank\">TheWebDevGuys</a> & SGC Logistics IT Team
                  </div>
                </div>
              </footer>";

class Popup
{
    private $delete = null;
    public function Pop() {
        try{
            $message = "Row Deleted";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }catch(Exception $e){
            echo "ERROR";
            return null;
        }
    }
}
?>

