<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Amazina</th>
                <th>Afite <?php echo $fertilizerName;?></th>
                <th>Ibiro Afite</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($coo_members as $key => $value) {
                //get member fertilizer in order to display hi/her record
                $quantity=$cooperative->getMemberFertilizer($value['memberId'],$fertilizerId);
                if($quantity>0){
                    ?>
                    <tr>
                        <td><?php echo $value['name']; ?></td>
                        <td>
                            <span class="uk-badge uk-badge-primary">yego</span>
                        </td>
                        <td>
                            <span class="uk-badge uk-badge-success uk-badge-notification">
                                <?php echo $quantity; ?>
                            </span>
                            
                        </td>
                        <td>
                            <a class="md-btn md-btn-danger md-btn-mini deleteMember" data-uk-tooltip title="Mukuremo" action="<?php echo $value['memberId']; ?>">
                                <i class="fa fa-trash-o"></i>
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