<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formData">
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['userEmail'];  ?>">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['user_active_id']; ?>">
            <div class="col-md-4 text-center"> 
                <label for="file_document_name" class="form-label">Document Upload
                    <img id="filedocumentname" src="../assets/images/profiles/userlogomale.png" onerror="this.onerror=null;this.src='../assets/img/brandlogos/rusilogo.png'" class="img-thumbnail" style="height:300px">
                    <input class="form-control" style="display:none;" name="file_document_name" type="file" id="file_document_name">
                </label>
            </div>
            <div class="mb-3">
                <label class="form-label">Document Name</label>
                <input type="text" class="form-control" id="document_name" name="document_name">
            </div>
            <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option>Choose Category</option>
                        <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("categories","*");
                                $rolesList = $newAPIFunctions->sql;
                            
                                $index = 1;
                                while ($roles = mysqli_fetch_assoc($rolesList)){
                        ?>

                        <option value="<?php echo $roles['id']; ?>"><?php echo $roles['category_name']; ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">isRestricted</label>
                    <select class="form-control" name="isRestricted" id="isRestricted">
                        <option value="0">Yes</option>
                        <option value="1">No</option>
                    </select>
                </div>
             <input type="hidden" id="method" name="update">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="addNew" id="btn-mul" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>