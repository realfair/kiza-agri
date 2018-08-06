<?php
$cooperativePricing=array();
$cooperativePricing=$admin->loadCooperativePricing($cooperativeId);
//var_dump($cooperativeCrops);
if(!$admin->analyseResult($cooperativePricing)){
	?>
	<script type="text/javascript">window.location="dashboard";</script>
	<?php
}else{
 //var_dump($cooperativeMembers);	
}


?>
<div class="table-responsive m-t-40">
    <table id="example233" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>CropName</th>
                <th>Grade</th>
                <th>Variety</th>
                <th>Price</th>
                <th>Status</th>
                <th>Reg Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativePricing as $key => $value) {
                $cropName=$admin->field_data("system_crops","cropid",$value['crop'],"name");
                $gradeName=$admin->field_data("cropsgrade","gradeId",$value['grade'],"grade");
                $varietyName=$admin->field_data("cropsvariety","varietyId",$value['variety'],"name");
                ?>
                <tr>
                    <td>
                        <?php
                        echo $cropName
                         ?>
                    </td>
                    <td>
                        <?php
                        echo $gradeName;
                         ?>
                    </td>
                    <td>
                        <?php echo $varietyName; ?>
                    </td>
                    <td>
                        <span class="badge badge-danger">
                            <?php echo $value['price'].' RWF'; ?>
                        </span>
                    </td>
                    <td>
                        <?php
                        if($value['status']=="ACTIVE"){
                            ?>
                            <span class="badge badge-info">
                                <?php echo $value['status']; ?>
                            </span>
                            <?php
                        }else{
                            ?>
                            <span class="badge badge-warning">
                                <?php echo $value['status']; ?>
                            </span>
                            <?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $value['regDate']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>