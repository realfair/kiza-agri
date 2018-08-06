<?php 
$cooperativePesticides=$admin->loadCooperativePesticides($cooperativeId);
//var_dump($cooperativePesticides);
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Pesticide</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativePesticides as $key => $value) {
                ?>
                <tr>
                    <td>
                        <span class="badge badge-success">
                        	<?php 
                        	echo $system->table_field("system_pesticides","pesticideId",$value['pesticide'],"name");
                        	?>
                        </span>
                    </td>
                    <td>
                    	<span class="badge badge-danger">
                        	<?php echo $value['quantity']." KG"; ?>
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