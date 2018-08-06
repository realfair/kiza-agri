
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th><b>Nomero</b></th>
                <th><b>Umuguzi</b></th>
                <th><b>Igihingwa</b></th>
                <th><b>Ubwoko</b></th>
                <th><b>Ubuziranenge</b></th>
                <th><b>Ingano.</b></b></th>
                <th><b>Kora</b></th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($orderingList as $key => $value) {
                ?>
                <?php include 'modal.php'; ?>
                <tr>
                    <td><?php echo $value['orderId']; ?></td>
                    <td>
                        <a href="#">
                        <?php 
                        echo $system->selectTableField("users","name","id",$value['sellerId']);
                        ?>
                        </a>
                    </td>
                    <td>
                        <?php
                        $gradeId=$cooperative->varietyGrade($value['varietyId']);
                        $cropId=$cooperative->gradeCrop($gradeId);
                        echo $system->selectTableField("system_crops","name","cropid",$cropId);
                        ?>
                    </td>
                    <td>
                        <?php
                        $gradeId=$cooperative->varietyGrade($value['varietyId']); 
                        echo $system->selectTableField("cropsgrade","grade","gradeId",$gradeId);
                        ?>
                        
                    </td>
                    <td>
                        <?php 
                         echo $system->selectTableField("cropsvariety","name","varietyId",$value['varietyId']);
                        ?>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                        <?php 
                        echo $value['quantity'];
                        ?>
                        </span>
                    </td>
                    <td>
                            <button class="md-btn md-btn-primary md-btn-wave-light" data-uk-tooltip title="Emeza cg Wange" data-uk-modal="{target:'#modal_header_footer<?php echo $value['orderId']; ?>'}">
                                KORA
                            </button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
