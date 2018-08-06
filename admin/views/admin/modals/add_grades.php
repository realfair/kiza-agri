<?php 
$systemCrops=$admin->loadSystemCrops();
//var_dump($systemCrops);
?>
<div class="modal fade" id="example1" aria-hidden="true" aria-labelledby="exampleModalTabs"
 >
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Adding Crop Grades</h5>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form id="frm_save_grade">
                            <div class="form-group">
                                <label>Select crop to add Grades for.</label>
                                <select id="cropKey" class="form-control" required="">
                                  <?php 
                                  foreach ($systemCrops as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['cropid']; ?>">
                                      <?php echo $value['name']; ?>
                                    </option>
                                    <?php
                                  }
                                  ?>
                                </select>
                            </div>
                            <div class="form-group">
                              <label>Add grade Here.</label>
                              <input id="txtGrade" type="text" name="grade" class="form-control" required="">
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
        <a href="crops_all" class="btn btn-default">Close</a>
      </div>
    </div>
  </div>
</div>  