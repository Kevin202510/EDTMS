<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formData">
            <input type="hidden" name="doc_id" id="doc_id">
            <div class="mb-3">
                <label class="form-label">Filename</label>
                <input type="text" class="form-control" id="file_document_name" name="file_document_name">
            </div>
            <div class="mb-3">
                    <label class="form-label">Reciever Name</label>
                    <select class="form-control" name="reciever_id" id="reciever_id">
                        <option>Choose Role</option>
                        <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("users","*");
                                $rolesList = $newAPIFunctions->sql;
                            
                                $index = 1;
                                while ($roles = mysqli_fetch_assoc($rolesList)){
                        ?>

                        <option value="<?php echo $roles['id']; ?>"><?php echo $roles['user_fname']." ".$roles['user_mname']." ".$roles['user_lname']; ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Sender Name</label>
                    <select class="form-control" name="sender_id" id="sender_id">
                        <option>Choose Role</option>
                        <?php
                                include_once('../API/DBCRUDAPI.php');
                                $newAPIFunctions = new DBCRUDAPI();
                                $newAPIFunctions->select("users","*");
                                $rolesList = $newAPIFunctions->sql;
                            
                                $index = 1;
                                while ($roles = mysqli_fetch_assoc($rolesList)){
                        ?>

                        <option value="<?php echo $roles['id']; ?>"><?php echo $roles['user_fname']." ".$roles['user_mname']." ".$roles['user_lname']; ?></option>

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