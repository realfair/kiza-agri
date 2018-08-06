<?php 
$systemCrops=$admin->loadSystemCrops();
//var_dump($systemCrops);
?>
<div class="modal fade" id="exampleTabs123" aria-hidden="true" aria-labelledby="exampleModalTabs"
 >
  <div class="modal-dialog modal-simple">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Adding Crop Varieties</h5>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="basic-form">
                        <form id="frm_save_variety">
                            <div class="form-group">
                                <label>Select crop to add Variety for for.</label>
                                <select id="crop_key_section" class="form-control" required="">
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
                              <label>Select Grade Here</label>
                              <select id="crop_grade_section" class="form-control" required="">
                                
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Add Variety Here.</label>
                              <input id="txtVariety" type="text" name="txtVariety" class="form-control" required="">
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