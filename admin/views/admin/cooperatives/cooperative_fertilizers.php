<?php 
$cooperativeFertilizers=$admin->loadCooperativeFertilizer($cooperativeId);
//var_dump($cooperativeFertilizers);
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Fertilizer</th>
                <th>Quantity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativeFertilizers as $key => $value) {
                ?>
                <tr>
                    <td>
                        <span class="badge badge-success">
                        	<?php 
                        	echo $system->table_field("system_fertilizers","fertilizerId",$value['fertilizer'],"name");
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