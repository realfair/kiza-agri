<?php 
$systemCrops=array();
$systemCrops=$system->getSystemCrops();
?>
<div class="uk-modal" id="modal_header_footer">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title"><?php echo $errors->save_crop_title(); ?></h3>
        </div>
        <form id="frm_add_crop">
            <div class="row">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label><?php echo $errors->crop_name(); ?></label>
                            <select id="crop_name" class="md-input">
                                <?php 
                                foreach ($systemCrops as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['cropid']; ?>">
                                        <?php echo $value['name']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                                <option>
                                    
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div id="" class="uk-width-medium-1-1">
                            <label><?php echo $errors->crop_grades(); ?></label>
                            <select id="cropsGrades" class="md-input">
                                
                            </select>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <input type="hidden" value="<?php echo $cooperativeId ?>" name="cooperativeId" id="cooperativeId">
                            <button type="submit" class="md-btn md-btn-primary md-btn-large md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">
                                    <i class="fa fa-user-plus"></i>
                                    <?php echo $errors->crop_save_button(); ?>
                                </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">BIREKE</button>
        </div>
    </div>
</div>