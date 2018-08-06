<?php 
$cooperativeMembers=array();
$cooperativeMembers=$cooperative->loadCooperativeMembers($cooperativeId);
?>
<div class="uk-modal" id="modal_header_footer">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title"><?php echo $errors->add_land_modal(); ?></h3>
        </div>
        <form id="frm_add_land">
            <div class="row">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label><?php echo $errors->modal_member_text(); ?></label>
                            <select id="member" class="md-input">
                                <?php 
                                foreach ($cooperativeMembers as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value['memberId']; ?>">
                                        <?php echo $value['name']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label><?php echo $errors->member_land_text(); ?></label>
                            <input id="member_land" type="number" maxlength="16" class="md-input" required="" />
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label><?php echo $errors->cooperative_land_text(); ?></label>
                            <input id="coo_land" type="number" maxlength="16" class="md-input" required="" />
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <input type="hidden" value="<?php echo $cooperativeId ?>" name="cooperative" id="cooperative">
                            <button id="btn_save_land" type="submit" class="md-btn md-btn-primary md-btn-large md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">
                                    <i class="fa fa-user-plus"></i>
                                    <?php echo $errors->land_save_button(); ?>
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