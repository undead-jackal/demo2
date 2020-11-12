<div class="mobile-block">
  <div class="row">
    <div class="col-lg-8 col-md-8 text-center" style="color:#ffffff">
        <h1><i class="fas fa-exclamation-circle"></i></h1>
        <h4>Sorry This Web App is for desktop only</h4>
    </div>
  </div>
</div>
<?php
$uri =  service('uri');
?>
<div class="sidebar" data-color="orange" data-image="../assets/img/sidebar-5.jpg">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="https://www.creative-tim.com/" class="simple-text logo-mini"></a>
            <a href="https://www.creative-tim.com/" class="simple-text logo-normal">
              Examine
            </a>
        </div>

        <ul class="nav">
          <?php

          $nav_demo3 = array(
            array(
              "text" => "All Exam",
              "link" => route_to("Exam Creator"),
              "icon" => "fas fa-copy"
            ),
            array(
              "text" => "Students's Exams",
              "link" => route_to("ViewScores"),
              "icon" => "fas fa-users"
            ),
            array(
              "text" => "Logout",
              "link" => "/",
              "icon" => "fa fa-undo"
            )
          );
          $nav_demo4 = array(
            array(
              "text" => "All Exam",
              "link" => route_to("examTaker"),
              "icon" => "fas fa-copy"
            ),
            array(
              "text" => "Logout",
              "link" => "/",
              "icon" => "fa fa-undo"
            )

          );
          if (strpos($uri->getPath(), 'admin') !== false) {
            echo sidebar_content($nav_demo3);
          }elseif (strpos($uri->getPath(), 'user') !== false) {
            echo sidebar_content($nav_demo4);
          }
           ?>
        </ul>
    </div>
</div>
