<?php 
$systemUsers=$admin->load_system_users();
?>
<div class="table-responsive m-t-40">
    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($systemUsers as $key => $value) {
                ?>
                <tr>
                    <td>
                        <?php echo $value['userId']; ?>
                    </td>
                    <td>
                        <?php echo $value['userName']; ?>
                    </td>
                    <td>
                        <?php echo $value['email']; ?>
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