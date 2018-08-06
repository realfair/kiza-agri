<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Amazina</th>
                <th>Afite <?php echo $pesticideName;?></th>
                <th>Ibiro Afite</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($coo_members as $key => $value) {
                //get member fertilizer in order to display hi/her record
                $quantity=$cooperative->getMemberPesticides($value['memberId'],$pesticideId);
                if($quantity==0){
                    ?>
                        <tr>
                            <td><?php echo $value['name']; ?></td>
                            <td>
                                <span class="uk-badge uk-badge-warning">Oya</span>
                            </td>
                            <td>
                                <span class="uk-badge uk-badge-success uk-badge-notification">
                                    <?php echo $quantity; ?>
                                </span>
                                
                            </td>
                            <td>
                                <a coop="<?php echo $cooperativeId; ?>" data="<?php echo $pesticideId; ?>" pesticide="<?php echo $pesticideName; ?>" class="md-btn md-btn-primary md-btn-mini givePesticide" data-uk-tooltip title="Mukuremo" action="<?php echo $value['memberId']; ?>">
                                    <i class="fa fa-plus"></i>Tanga
                                </a>
                            </td>
                        </tr>
                    <?php
                }
                ?>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>