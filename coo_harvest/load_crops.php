<?php 
$cooperativeCrops=array();
$cooperativeCrops=$cooperative->loadCooperativeCrops($cooperativeId);
//var_dump($cooperativeCrops);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Igihingwa</th>
                <th>Umusaruro</th>
                <th>Uko Gihagaze</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($cooperativeCrops as $key => $value) {
                $harvest=$cooperative->getCropAllHarvest($value['crop'],$cooperativeId);
                ?>
                <tr>
                    <td><?php
                    echo $system->selectTableField("system_crops","name","cropid",$value['crop']);
                    ?></td>
                    <td><?php
                        echo $harvest;
                    ?></td>
                    <td>
                        <?php 
                        if($harvest>0){
                            ?>
                            <span class="uk-badge">BIRAHARI</span>
                            <?php
                        }else{
                            ?>
                            <span class="uk-badge uk-badge-danger">
                                BYARASHIZE
                            </span>
                            <?php  
                        }
                        ?>
                        
                    </td>
                    <td>
                        <?php 
                        if($harvest>0){
                            ?>
                                <a href="harvest_grades?from=<?php echo $value['crop']; ?>" class="md-btn md-btn-primary md-btn-mini md-btn-wave-light waves-effect waves-button waves-light" href="javascript:void(0)">REBA</a>
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
