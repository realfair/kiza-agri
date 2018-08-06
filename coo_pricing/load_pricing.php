<?php 
$cooperativePricing=array();
$cooperativePricing=$cooperative->loadCooperativePricing($cooperativeId);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Igihingwa</th>
                <th>Ubwoko</th>
                <th><?php echo $errors->crop_variety_header(); ?></th>
                <th><?php echo $errors->price_header(); ?></th>
                <th>Uko bihagaze.</th>
                <th>Itariki cyanditsweho</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($cooperativePricing as $key => $value) {
                ?>
                <tr>
                    <td><?php
                    echo $system->selectTableField("system_crops","name","cropid",$value['crop']);
                    ?></td>
                    <td>
                        <?php
                    echo $system->selectTableField("cropsgrade","grade","gradeId",$value['grade']);
                    ?>
                        
                    </td>
                    <td>
                        <?php
                    echo $system->selectTableField("cropsvariety","name","varietyId",$value['variety']);
                    ?>
                    </td>
                    <td>
                        <?php echo $value['price']; ?>
                    </td>
                    <td>
                        <?php
                        if($value['status']=="ACTIVE"){
                            ?>
                            <span class="uk-badge uk-badge-success">
                                NICYO CYEMEWE
                            </span>
                            <?php
                        }elseif($value['status']=="PENDING"){
                            ?>
                            <span class="uk-badge uk-badge-warning">
                                CYARAHAGARITSWE
                            </span>
                            <?php                        }
                        ?>
                    </td>
                    <td><?php echo $value['regDate']; ?></td>
                    <td>
                        <a class="md-btn md-btn-danger md-btn-mini deleteCrop" data-uk-tooltip title="kuramo" action="<?php echo $value['cropid']; ?>">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/common.min.js"></script>
