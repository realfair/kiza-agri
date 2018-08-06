<?php 
$coo_members=array();
$coo_members=$cooperative->loadCooperativeMembers($cooperativeId);
?>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Amazina</th>
                <th>No Indangamuntu</th>
                <th>Itariki y'amavuko</th>
                <th>Igitsina</th>
                <th>Telefoni</th>
                <th>Umusaruro.</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($coo_members as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['id_no']; ?></td>
                    <td><?php echo $value['dob']; ?></td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                        <?php 
                            if($value['gender']==0){
                                echo "Gabo";
                            }else{
                                echo "Gore";
                            }
                        ?>
                        </span>
                    </td>
                    <td><?php echo $value['phone']; ?></td>
                    <td>
                        <span class="uk-badge uk-badge-danger">
                        <?php 
                         echo $cooperative->getMemberTotalHarvest($value['memberId'],$cooperativeId);
                        ?>
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
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/common.min.js"></script>
 <?php include 'views/utils/my_scripts.php'; ?>
