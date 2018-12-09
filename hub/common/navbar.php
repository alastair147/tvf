<?php
    /**
     * Created by PhpStorm.
     * User: spenc
     * Date: 22/10/2018
     * Time: 12:20 AM
     */

    $nav = "<div class=\"sidebar\" data-color=\"green\" data-image=\"../assets/img/sidebar-5.jpg\">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color=\"purple | azure | green | orange | danger\"

          Tip 2: you can also add an image using data-image tag
      -->
        <div class=\"logo\" style=\"background-color: rgba(134,134,134,0.17)\">
            <a href=\"#\" class=\"simple-text logo-normal\">
                <img src=\"../assets/img/tvf.png\" width=\"200px\">
            </a>
        </div>
        <div class=\"sidebar-wrapper\" style=\"background-color: rgba(134,134,134,0.17)\">
            <ul class=\"nav\" style=\"overflow-y: scroll;\">
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../index.php\">
                        <i class=\"material-icons\">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../downloads.php\">
                        <i class=\"material-icons\">get_app</i>
                        <p>Downloads</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../submit.php\">
                        <i class=\"material-icons\">label</i>
                        <p>Submit a Job</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../loggedjobs.php\">
                        <i class=\"material-icons\">view_headline</i>
                        <p>Logged Jobs</p>
                    </a>
                </li>
                <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../loa.php\">
                        <i class=\"material-icons\">weekend</i>
                        <p>Holiday / Leave Form</p>
                    </a>
                </li>
                <!-- ADMIN ONLY SECTION -->";
                if ($auth->isStaff()):
                    echo "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"../../admin/users.php\">
                            <i class=\"material-icons\">people</i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"leaveforms.php\">
                            <i class=\"material-icons\">directions_walk</i>
                            <p>Leave Forms</p>
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"adminevents.php\">
                            <i class=\"material-icons\">event_note</i>
                            <p>All Events</p>
                        </a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"newevent.php\">
                            <i class=\"material-icons\">calendar_today</i>
                            <p>Post a new Event</p>
                        </a>
                    </li>";
                endif;
                if ($auth->isMedia()):
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"upload.php\">
                        <i class=\"material-icons\">cloud_download</i>
                        <p>Upload File</p>
                    </a>
                </li>";
                endif;
                echo "<li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"../../login/logout.php\">
                        <i class=\"material-icons\">vpn_key</i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>";