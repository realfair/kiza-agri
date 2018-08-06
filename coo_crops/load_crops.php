<?php 
$cooperativeCrops=array();
$cooperativeCrops=$cooperative->getCooperativeCrops($cooperativeId);
//var_dump($cooperativeCrops);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Igihingwa</th>
                <th>Ubwoko</th>
                <th>Uko Gihagaze</th>
                <th>Itariki cyanditsweho</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($cooperativeCrops as $key => $value) {
                ?>
                <tr>
                    <td><?php
                    echo $system->selectTableField("system_crops","name","cropid",$value['crop']);
                    ?>
                        
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                        <?php
                    echo $system->selectTableField("cropsgrade","grade","gradeId",$value['grade']);
                    ?>
                        </span>
                    </td>
                    <td><?php echo $value['status']; ?></td>
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
