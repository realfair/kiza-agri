<?php 
$cooperativeHarvest=$admin->loadCooperativeHarvest($cooperativeId);
//var_dump($cooperativeHarvest);
?>
<div class="row">
	<div class="col-lg-12">
		<p>
			<ul style="display: inline-block;">
				<li style="display: inline-block;">
					<div style="width:60px;height:20px;background: #26DAD2;float: left;"></div>
					:Represent Crop
				</li>
				<li style="display: inline-block;">
					<div style="width:60px;height:20px;background: #1976D2;float: left;"></div>
					:Represent Crop Grades
				</li>
				<li style="display: inline-block;">
					<div style="width:60px;height:20px;background: #FFB22B;float: left;"></div>
					:Represent Grade Varieties
				</li>
				<li style="display: inline-block;">
					<div style="width:60px;height:20px;background: #009966;float: left;"></div>
					:Represent Members
				</li>
				<li style="display: inline-block;">
					<div style="width:60px;height:20px;background: #EF5350;float: left;"></div>
					:Represent Members Harvest
				</li>
				<li style="display: inline-block;">
					<div style="width:60px;height:20px;background: #333;float: left;"></div>
					:Represent Cooperative Harvest
				</li>
			</ul>
		</p>
	</div>
</div>
<div class="table-responsive m-t-40">
    <table id="example2322" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Crop</th>
                <th>Crop grade</th>
                <th>Grade Variety</th>
                <th>Member</th>
                <th>Member's Harvest</th>
                <th>Cooperative's Harvest</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativeHarvest as $key => $value) {
                ?>
                <tr>
                    <td>
                        <span class="badge badge-success">
                        	<?php 
                        	echo $system->table_field("system_crops","cropid",$value['crop'],"name");
                        	?>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-info">
                        	<?php 
                        	echo $system->table_field("cropsgrade","gradeId",$value['grade'],"grade");
                        	?>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-warning">
                        	<?php 
                        	echo $system->table_field("cropsvariety","varietyId",$value['variety'],"name");
                        	?>
                        </span>
                    </td>
                    <td>
                        <span style="font-weight: bold;background: #009966;color:#fff;" class="badge badge-default">
                        	<?php 
                        	echo $system->table_field("coo_members","memberId",$value['memberId'],"name");
                        	?>
                        </span>
                    </td>
                    <td>
                    	<span class="badge badge-danger">
                    		<?php echo $value['memberHarvest']." KG"; ?>
                    	</span>
                    	
                    </td>
                    <td>
                    	<span style="background: #333333;color: #fff;" class="badge badge-danger">
                    		<?php echo $value['cooperativeHarvest']." KG"; ?>
                    	</span>
                    </td>
                    <td>
                    	<?php echo $value['status']; ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>