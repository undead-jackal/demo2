<div class="mobile-block">
  <div class="row">
    <div class="col-lg-12 col-md-12">

    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-minimize">
                <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                    <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                    <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                </button>
            </div>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">
                <li class="nav-item nav-name">
                  <h5>Enricke Janu Morales</h5>
                </li>
                <li class="nav-item">
                  <a href="<?= route_to("Products") ?>" class="nav-link">Home</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- <nav id="navbar" class="navbar navbar-expand-lg fixed-top">
  <a class="navbar-brand" href="">selling<span><strong>fork</strong></span> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class=""> <i class="fas fa-bars color-dom"></i> </span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <ul class="navbar-nav my-2 my-lg-0">
      <li class="nav-item text-right p-3">
        <button class="navbar-toggler close" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> <i class="fas fa-times color-dom"></i> </span>
        </button>
      </li>
    </ul>
    <ul class="navbar-nav sidebar-lay mr-auto mt-2 mt-lg-0"></ul>
    <ul class="navbar-nav my-2 my-lg-0">

      <li class="nav-item">
        <a href="<?= route_to("Products") ?>" class="nav-link">Home</a>
      </li>

      <li class="nav-item">
        <a href="<?= route_to("My Order") ?>" class="nav-link">My Order</a>
      </li>

      <li class="nav-item">
        <div class="input-group mb-2">
         <input type="text" class="form-control" name="search"  placeholder="Search">
         <div class="input-group-prepend">
           <button type="button" data-id="'+k.id+'" class="btn btn-primary addCart"> <i class="fa fa-search"></i> </button>
         </div>
        </div>
      </li>


    </ul>
  </div>
</nav> -->

<div id="fab" class="fabCollapse" class="animate zoomIn">
  <a  href="<?= route_to('My Cart') ?>"> <i id="icon-cart" class="fa fa-shopping-cart"></i> </a>

</div>
<!-- END FAB BUTTON -->
