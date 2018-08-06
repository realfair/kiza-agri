<?php
$cooperativeCrops=array();
$cooperativeCrops=$admin->loadCooperativeCrops($cooperativeId);
//var_dump($cooperativeCrops);
if(!$admin->analyseResult($cooperativeCrops)){
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
                <th>Status</th>
                <th>Reg Date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativeCrops as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php
                        echo $admin->field_data("system_crops","cropid",$value['crop'],"name"); ?>
                    </td>
                    <td>
                        <?php
                        echo $admin->field_data("cropsgrade","gradeId",$value['grade'],"grade"); ?>
                    </td>
                    <td>
                        <?php echo $value['status']; ?>
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