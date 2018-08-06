<?php
$fertilizers=array();
$fertilizers=$cooperative->loadSystemPesticides();
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th><?php echo $errors->pesticide_name(); ?></th>
                <th><?php echo $errors->fertilizer_quantity(); ?></th>
                <th><?php echo $errors->fertilizer_remaining_quantity(); ?></th>
                <th><?php echo $errors->fertilizer_members_quantity(); ?></th>
                <th>Uko Ihagaze</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($fertilizers as $key => $value) {
                $fertValue=$cooperative->loadCooperativePesticides($cooperativeId,$value['pesticideId']);
                ?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                        <?php 
                        echo $cooperative->loadCooperativePesticides($cooperativeId,$value['pesticideId']);
                        ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-success">
                        <?php echo $cooperative->getCooperativeRemainingPesticide($value['pesticideId'],$cooperativeId); ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-warning">
                        <?php echo $cooperative->getMemberRemainingPesticide($value['pesticideId'],$cooperativeId); ?>
                        </span>
                    </td>
                    <td>
                        <?php 
                        if($fertValue>0){
                            ?>
                            <span class="uk-badge uk-badge-info">
                                IRAHARI
                            </span>
                            <?php
                        }else{
                            ?>
                            <span class="uk-badge uk-badge-danger">
                                NTAYIHARI
                            </span>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if($fertValue>0){
                            ?>
                            <a href="member-pesticides?fertilizer=<?php echo $value['pesticideId'];?>&status=1" class="md-btn md-btn-success md-btn-mini" data-uk-tooltip title="Reba abahawe ifumbire" action="<?php echo $value['pesticideId']; ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="member-pesticides?fertilizer=<?php echo $value['pesticideId'];?>&status=0" class="md-btn md-btn-warning md-btn-mini" data-uk-tooltip title="Reba abatarahawe ifumbire" action="<?php echo $value['pesticideId']; ?>">
                                <i class="fa fa-user"></i>
                            </a>
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
