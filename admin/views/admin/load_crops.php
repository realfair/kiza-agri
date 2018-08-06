<?php 
$systemCrops=$admin->crop_data();
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Crop grade</th>
                <th>Crop Variety</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($systemCrops as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['cropid']; ?>
                    </td>
                    <td>
                        <?php echo $value['name']; ?>
                    </td>
                    <td>
                        <?php echo $value['grade']; ?>
                    </td>
                    <td>
                        <?php 
                        $varieties=$admin->getGradeVarieties($value['gradeId']);
                        //var_dump($varieties);
                        if(count($varieties)>0){
                            foreach ($varieties as $key => $value1) {
                                ?>
                                <span class="badge badge-danger">
                                    <?php echo $value1['name']; ?>
                                </span>
                                <?php
                            }
                        }
                        ?>
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