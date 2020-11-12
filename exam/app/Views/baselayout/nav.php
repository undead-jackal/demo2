<?php $uri =  service('uri'); ?>
<!-- <div id="fab" class="fabCollapse" class="animate zoomIn">
  <a  href="<?= route_to('My Cart') ?>"> <i id="icon-cart" class="fa fa-shopping-cart"></i> </a>
</div> -->
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
          <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                  <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                  <i class="fa fa-navicon visible-on-sidebar-mini"></i>
              </button>
          </div>

          <?php if (strpos($uri->getPath(), 'admin') !== false): ?>
            <a href="<?= route_to('Add Exam') ?>" class="btn btn-primary btn-wd">Create Exam</a>

          <?php endif; ?>

      </div>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
                  <li class="nav-item nav-name">
                    <?php
                        if (strpos($uri->getPath(), 'admin') !== false) {
                          echo "<h5>Welcome Admin</h5>";
                        }elseif (strpos($uri->getPath(), 'user') !== false) {
                          echo "<h5>Welcome User</h5>";
                        }
                     ?>
                  </li>
            </ul>
        </div>
    </div>
</nav>
