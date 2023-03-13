<?php include('layouts/header.php'); ?>
<?php 
    if(!$_SESSION['userFullname']){
        header('Location: ../index.php');
    }
?>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include('layouts/navbar.php'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include('layouts/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Hi, welcome back!</h4>
              <p class="font-weight-normal mb-2 text-muted"><?php echo date("M-d-Y"); ?></p>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-xl-3 flex-column d-flex grid-margin stretch-card">
              <div class="row flex-grow">
                <div class="col-sm-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Storage</h4>
                          <p>100% free</p>
                          <h4 class="text-dark font-weight-bold mb-2">1 TeraByte</h4>
                          <canvas id="customers"></canvas>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12 stretch-card">
                    <div class="card">
                      <div class="card-body">
                          <h4 class="card-title">Document / Files</h4>
                          <p>Total of <span id="totalDocument"></span> documents</p>
                          <h4 class="text-dark font-weight-bold mb-2" id="totalDocu">0</h4>
                          <canvas id="orders"></canvas>
                      </div>
                    </div>
               </div>
              </div>
            </div>
            <div class="col-xl-9 d-flex grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">EDTMS Metrics</h4>
                      <div class="row">
                        <div class="col-lg-5">
                          <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit amet cumque cupiditate</p> -->
                        </div>
                        <!-- <div class="col-lg-7">
                          <div class="chart-legends d-lg-block d-none" id="chart-legends"></div>
                        </div> -->
                      </div>
                      <div class="row">
                          <div class="col-sm-12">
                              <canvas id="web-audience-metrics-satacked" class="mt-3"></canvas>
                          </div>
                      </div>
                        
                    </div>
                  </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include('layouts/footer.php'); ?>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <?php include('layouts/script.php'); ?>