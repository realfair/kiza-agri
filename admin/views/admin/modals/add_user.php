<div class="modal fade" id="exampleTabs" aria-hidden="true" aria-labelledby="exampleModalTabs"
 >
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="exampleModalTabs">Add new System Admin.</h4> 
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form id="frm_save_user">
                            <div class="form-group">
                                <label>User Names</label>
                                <input id="user_names" type="text" class="form-control" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>User Email</label>
                                <input id="user_mail" type="email" class="form-control" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Enter user password</label>
                                <input id="user_password" type="password" class="form-control" placeholder="***" required="">
                            </div>
                            <div class="form-group">
                                <label>Re-Enter user password</label>
                                <input id="c_password" type="password" class="form-control" placeholder="***" required="">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="users" class="btn btn-default">Close</a>
      </div>
    </div>
  </div>
</div>  