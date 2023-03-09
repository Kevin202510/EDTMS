<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formData">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="logo" id="logo">
            <input type="hidden" id="method" name="update">
            <div class="row">
                <div class="col-md-4 text-center"> 
                <label for="user_profile" class="form-label">Brand Logo
                    <img id="userprofile" src="../assets/img/profiles/userlogomale.png" onerror="this.onerror=null;this.src='../assets/img/brandlogos/rusilogo.png'" class="img-thumbnail" style="height:300px">
                    <input class="form-control" style="display:none;" name="user_profile" type="file" id="user_profile">
                </label>
              </div>
            <div class="col-md-8">
                <div class="mb-3">
                    <label class="form-label">Role id</label>
                    <select class="form-control" name="user_role_id" id="user_role_id">
                        <option>Choose Role</option>
                        <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("roles","*");
                                $rolesList = $newAPIFunctions->sql;
                            
                                $index = 1;
                                while ($roles = mysqli_fetch_assoc($rolesList)){
                        ?>

                        <option value="<?php echo $roles['role_id']; ?>"><?php echo $roles['display_name']; ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" id="user_fname" name="user_fname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" id="user_mname" name="user_mname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="user_lname" name="user_lname">
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>
                <div class="mb-3">
                    <label class="form-label">Contact</label>
                    <input type="text" class="form-control" id="contact" name="contact">
                </div>
                <div class="mb-3">
                    <label class="form-label">Date Of Birthday</label>
                    <input type="text" class="form-control" id="DOB" name="DOB">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="addNew" id="btn-mul" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>