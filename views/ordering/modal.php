<div class="uk-modal" id="modal_header_footer<?php echo $value['orderId']; ?>" aria-hidden="true" style="display: none; overflow-y: scroll;">
    <div class="uk-modal-dialog" style="top: -4px;">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Kora igikorwa kubusabe bwa : <?php 
                        echo $system->selectTableField("users","name","id",$value['sellerId']);
                        ?>
                        <i class="material-icons" data-uk-tooltip="{pos:'top'}" title="headline tooltip"></i>
            </h3>
        </div>
        <div class="row">
            <div>
                <p><h3>Yasabye Ibiro : <span class="uk-badge uk-badge-danger"><?php echo $requiredQuantity=$value['quantity'].' KG'; ?></span></h3></p>
                <p><h3>Mufite ibiro: <span class="uk-badge uk-badge-success"><?php echo $ourQuantity=$cooperative->getVarietyHarvest($cooperativeId,$value['varietyId']); ?>KG</span>
                </h3>
                <?php 
                if($requiredQuantity<=$ourQuantity){
                    ?>
                    <a class="md-btn md-btn-primary md-btn-block md-btn-wave-light waves-effect waves-button waves-light sellBtn">
                    <b>Mugurisheho</b>
                    </a>
                    <?php
                }
                ?>
                </p>
                <div style="display: none;" class="md-card-content sellDiv">
                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-1 uk-row-first">
                            <div class="uk-form-row">
                                <div class="uk-grid" data-uk-grid-margin="">
                                    <div class="uk-width-medium-1-1 uk-row-first">
                                        <div class="md-input-wrapper">
                                            <label>Shyiramo ingano yo Kugurisha</label>
                                            <input type="number" class="md-input sellQ">
                                            <input type="hidden" class="cooperativeKey" value="<?php echo $cooperativeId; ?>" name="">
                                            <input type="hidden" class="sellerKey" value="<?php echo $value['sellerId']; ?>" name="">
                                            <input type="hidden" class="variety" value="<?php echo $value['varietyId']; ?>" name="">
                                            <input type="hidden" class="requiredQ" value="<?php echo $value['quantity']; ?>" name="">
                                            <input type="hidden" class="ourQ" value="<?php echo $ourQuantity; ?>" name="">
                                            <button style="margin:10px;" type="submit" class="md-btn md-btn-primary sellB">EMEZA UGURISHE</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <div class="uk-modal-footer uk-text-right">
            <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
        </div>
    </div>
</div>