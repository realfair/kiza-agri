<?php 
$gradeVariety=array();
$gradeVariety=$cooperative->getGradeVarieties($gradeId);
//var_dump($cooperativeCrops);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Ubuziranenge</th>
                <th>Umusaruro wose</th>
                <th>Umusaruro w'abaturage</th>
                <th>Umusaruro wa Koperative</th>
                <th>Uko Gihagaze</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($gradeVariety as $key => $value) {
                $harvest_grade=$cooperative->getVarietyCooperativeTotalHarvest($cooperativeId,$cropId,$gradeId,$value['varietyId']);
                ?>
                <tr>
                    <td><?php
                        echo $value['name'];
                    ?></td>
                    <td>
                        <span class="uk-badge uk-badge-success">
                        <?php echo $harvest_grade; ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-warning">
                        <?php echo $cooperative->getVarietyMembersHarvest($cooperativeId,$cropId,$gradeId,$value['varietyId']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                       <?php echo $cooperative->getVarietyCooperativeHarvest($cooperativeId,$cropId,$gradeId,$value['varietyId']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-danger">
                            <?php echo $value['status']; ?>
                        </span>
                    </td>
                    <td>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
