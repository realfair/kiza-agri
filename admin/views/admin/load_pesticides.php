<?php 
$systemPesticides=array();
$systemPesticides=$admin->loadSystemData("system_pesticides");
if(count($systemPesticides)==1){
    if(!$admin->analyseResult($systemPesticides)){
        header("Location: dashboard");
    }
}else{
    //var_dump($systemPesticides);
}
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($systemPesticides as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['pesticideId']; ?>
                    </td>
                    <td>
                        <?php echo $value['name']; ?>
                    </td>
                    <td>
                        <?php echo $value['status']; ?>
                    </td>
                    <td>
                        <a href="" class="btn btn-success">
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