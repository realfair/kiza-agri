<?php 
$cooperativeMembers=array();
$cooperativeMembers=$admin->loadCooperativeMembers($cooperativeId);
if(!$admin->analyseResult($cooperativeMembers)){
	?>
	<script type="text/javascript">window.location="dashboard";</script>
	<?php
}else{
 //var_dump($cooperativeMembers);	
}


?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>ID Number</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperativeMembers as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['name']; ?>
                    </td>
                    <td>
                        <?php echo $value['phone']; ?>
                    </td>
                    <td>
                        <?php echo $value['id_no']; ?>
                    </td>
                    <td>
                        <?php echo $value['dob']; ?>
                    </td>
                    <td>
                        <?php 
                        if($value['gender']==1){
                        	echo "Male";
                        }else{
                        	echo "Female";
                        }
                        ?>
                    </td>
                    <td>
                    	<?php echo $value['status']; ?>
                    </td>
                    <td>
                        <a href="coop_view?coop=<?php echo ($value['cooperativeId'] * 1000); ?>" class="btn btn-success">
                            VIEW
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>