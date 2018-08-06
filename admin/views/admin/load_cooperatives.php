<?php 
$cooperatives=array();
$cooperatives=$admin->loadCooperatives();
?>
<div class="table-responsive m-t-40">
    <button id="activateAll" class="btn btn-success">activate all</button>
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Phone</th>
                <th>TIN</th>
                <th>President</th>
                <th>District</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($cooperatives as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['cooperativeCode']; ?>
                    </td>
                    <td>
                        <?php echo $value['name']; ?>
                    </td>
                    <td>
                        <?php echo $value['phone']; ?>
                    </td>
                    <td>
                        <?php echo $value['TIN']; ?>
                    </td>
                    <td>
                        <?php echo $value['president']; ?>
                    </td>
                    <td>
                        <?php echo $system->table_field("districts","districtId",$value['location'],"name");?>
                    </td>
                    <td>
                        <?php
                            if($value['status']=="PENDING"){
                                ?>
                                <span class="badge badge-danger">
                                    <?php echo $value['status']; ?>
                                </span>
                                <?php
                            }elseif($value['status']=="ACTIVE"){
                                ?>
                                <span class="badge badge-success">
                                    <?php echo $value['status']; ?>
                                </span>
                                <?php
                            }
                        ?>
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