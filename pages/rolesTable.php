<?php include('layouts/header.php'); ?>
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
        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">List of Roles</h4>
                    <button style="float: right;" type="button" id="create-new" class="btn btn-success btn-rounded btn-sm"><i class="icon-plus"></i></button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Display Name
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody id="main-table"></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <?php include('roles/modal.php'); ?>
        <?php include('layouts/footer.php'); ?>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script type="module" src="roles/index.js"></script>
  <?php include('layouts/script.php'); ?>