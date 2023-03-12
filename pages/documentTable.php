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
              <embed
                src="../assets/documents/administrator@gmail.com/Seek.pdf"
                type="application/pdf"
              />
              <div class="card">
                <div class="card-header">
                  <div class="d-flex justify-content-between">
                  <h4 class="card-title">List of Document|Files</h4>
                  <div style="float: right;" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="filesearch">
                      <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
                  </div>
                  </div>
                </div>
                <div class="card-body">
                    <button style="float: right;" type="button" id="create-new" class="btn btn-success btn-rounded btn-sm"><i class="icon-plus"></i></button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Category
                          </th>
                          <th>
                            File|Document Name
                          </th>
                          <th>
                            Created | Updated
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
        <?php include('documents/modal.php'); ?>
        <?php include('layouts/footer.php'); ?>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script type="module" src="documents/index.js"></script>
  <?php include('layouts/script.php'); ?>