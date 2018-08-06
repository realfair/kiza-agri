<?php 
$coo_lands=array();
$coo_lands=$cooperative->loadCooperativeLand($cooperativeId);
$coo_members=array();
$coo_members=$cooperative->loadCooperativeMembers($cooperativeId);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nomero</th>
                <th>Amazina</th>
                <th><?php echo $errors->td_member_land(); ?></th>
                <th><?php echo $errors->td_cooperative_land(); ?></th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($coo_members as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value['memberId']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td>
                        <?php 
                        $land=$cooperative->getTotalMemberLand($value['memberId']);
                        if($land==0){
                            ?>
                            <span class="uk-badge uk-badge-danger">
                                <?php echo $land.' Ares'; ?>
                            </span>
                            <?php
                        }else{
                            ?>
                            <span class="uk-badge uk-badge-info">
                                <?php echo $land.' Ares';; ?>
                            </span>
                            <?php  
                        }
                        ?>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-warning">
                        <?php echo $cooperative->getMemberCooperativeLand($value['memberId']); ?>
                        </span>
                    </td>
                    <td>
                        <a class="md-btn md-btn-danger md-btn-mini" data-uk-tooltip title="Mukuremo" action="<?php echo $value['memberId']; ?>">
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
