<?php
$fertilizers=array();
$fertilizers=$cooperative->loadSystemFertilizers();
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th><?php echo $errors->fertilizer_name(); ?></th>
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
                $fertValue=$cooperative->loadCooperativeFertilizer($cooperativeId,$value['fertilizerId']);
                ?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                        <?php 
                        echo $cooperative->loadCooperativeFertilizer($cooperativeId,$value['fertilizerId']);
                        ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-success">
                        <?php echo $cooperative->getFertilizerCooperativeRemaining($value['fertilizerId'],$cooperativeId); ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-warning">
                        <?php echo $cooperative->getFertilizerMemberRemaining($value['fertilizerId'],$cooperativeId); ?>
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
                            <a href="member-fertilizers?fertilizer=<?php echo $value['fertilizerId'];?>&status=1" class="md-btn md-btn-success md-btn-mini" data-uk-tooltip title="Reba abahawe ifumbire" action="<?php echo $value['fertilizerId']; ?>">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="member-fertilizers?fertilizer=<?php echo $value['fertilizerId'];?>&status=0" class="md-btn md-btn-warning md-btn-mini" data-uk-tooltip title="Reba abatarahawe ifumbire" action="<?php echo $value['fertilizerId']; ?>">
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
