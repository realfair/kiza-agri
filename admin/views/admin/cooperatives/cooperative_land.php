<?php 
$cooperativeLand=$admin->loadCooperativeLand($cooperativeId);
//var_dump($cooperativeLand);
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Member</th>
                <th>Member's Land</th>
                <th>Cooperative's Land</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativeLand as $key => $value) {
                ?>
                <tr>
                    <td>
                        <span style="font-weight: bold;background: #009966;color:#fff;" class="badge badge-default">
                        	<?php 
                        	echo $system->table_field("coo_members","memberId",$value['memberId'],"name");
                        	?>
                        </span>
                    </td>
                    <td>
                    	<span class="badge badge-warning">
                        	<?php echo $value['member_land']." Ares"; ?>
                        </span>
                    </td>
                    <td>
                    	<span class="badge badge-danger">
                        	<?php echo $value['coop_land']." Ares"; ?>
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