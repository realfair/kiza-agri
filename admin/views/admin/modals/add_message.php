<div class="modal fade" id="messageModal" aria-hidden="true" aria-labelledby="exampleModalTabs"
 >
  <div class="modal-dialog modal-large">
    <div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="exampleModalTabs">Send message to Cooperative:<?php echo $system->table_field("cooperatives","cooperativeId",$cooperativeId,"name");?></h4> 
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                        <form id="frm_send_message" method="POST">
                            <div class="form-group">
                                <label>Message Title</label>
                                <input id="messageTitle" type="text" class="form-control" placeholder="message title" required="">
                            </div>
                            <div class="form-group">
                                <label>Message Category</label>
                                <select id="category" class="form-control" required="">
                                  <option value="MESSAGE">MESSAGE</option>
                                  <option value="NOTIFICATION">NOTIFICATION</option>
                                  <option value="ALERT">ALERT</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <textarea id="messageBody" style="min-height: 200px;" class="form-control" required=""></textarea>
                            </div>
                            <input type="hidden" id="cooperative" value="<?php echo $cooperativeId; ?>" name="">
                            <input type="hidden" id="admin" value="<?php echo $userId; ?>">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="coop_view?coop=<?php echo ($cooperativeId * 1000); ?>" class="btn btn-default">Close</a>
      </div>
    </div>
  </div>
</div>  