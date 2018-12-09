<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
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

<?php

$footer = "<footer class=\"footer\">
            <div class=\"container-fluid\">
                <nav class=\"float-left\">
                    <ul>
                      <li>
                        <a href=\"#\">
                          The Veteran Fleet Hub
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <div class=\"copyright float-right\">
                    &copy;
                    <script>
                      document.write(new Date().getFullYear())
                    </script>, made with <i class=\"material-icons\">favorite</i> by
                    <a href=\"http://thewebdevguys.host\" target=\"_blank\">TheWebDevGuys</a> & The Veteran Fleet IT Team
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

