<div class="uk-modal" id="modal_header_footer">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Andika umunyamuryango mushya. </h3>
        </div>
        <form id="frm_add_member">
            <div class="row">
                <div class="uk-form-row">
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Amazina</label>
                            <input id="names" type="text" class="md-input" required="" />
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Nomera y'indangamuntu</label>
                            <input id="id_no" type="number" maxlength="16" class="md-input" required="" />
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Nomera ya Telefoni <em>Niba ihari</em></label>
                            <input id="phone" type="number" maxlength="16" class="md-input" required="" />
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Itariki y'amavuko urugero:01/01/1990</label>
                            <input id="dob" type="text" maxlength="16" class="md-input" required="" />
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <label>Hitamo igitsina</label>
                            <select id="gender" class="md-input" required="" >
                                <option value="0">Gabo</option>
                                <option value="1">Gore</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-grid" data-uk-grid-margin>
                        <div class="uk-width-medium-1-1">
                            <input type="hidden" value="<?php echo $cooperativeId ?>" name="cooperative" id="cooperative">
                            <button type="submit" class="md-btn md-btn-primary md-btn-large md-btn-wave-light md-btn-icon waves-effect waves-button waves-light">
                                    <i class="fa fa-user-plus"></i>
                                    ANDIKA UMUNYAMURYANGO
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