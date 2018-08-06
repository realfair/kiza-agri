<?php 
$cropGrades=array();
$cropGrades=$cooperative->getCropGrades($cropId);
//var_dump($cooperativeCrops);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Ubwoko</th>
                <th>Umusaruro wose</th>
                <th>Umusaruro w'abaturage</th>
                <th>Umusaruro wa Koperative</th>
                <th>Uko Gihagaze</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($cropGrades as $key => $value) {
                $harvest_grade=$cooperative->getCropGradeCooperativeTotalHarvest($cooperativeId,$cropId,$value['gradeId']);
                ?>
                <tr>
                    <td><?php
                        echo $value['grade'];
                    ?></td>
                    <td>
                        <?php echo $harvest_grade; ?>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-warning">
                        <?php echo $cooperative->getCropGradeCooperativeMemberHarvest($cooperativeId,$cropId,$value['gradeId']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                       <?php echo $cooperative->getCropGradeCooperativeHarvest($cooperativeId,$cropId,$value['gradeId']); ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-danger">
                            <?php echo $value['status']; ?>
                        </span>
                    </td>
                    <td>
                        <?php 
                        if($harvest_grade>0){
                            ?>
                            <a href="variety_grade?from=<?php echo $value['gradeId']; ?>" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)">REBA</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
