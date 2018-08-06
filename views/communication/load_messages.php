
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="dt_colVis_buttons"></div>
        <table id="dt_tableExport" class="uk-table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Umutwe.</th>
                <th>Igihimba.</th>
                <th>Ubwoko.</th>
                <th>Status.</th>
                <th>Sent.</th>
                <th>Kora</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($cooperativeMessages as $key => $value) {
                ?>
                <tr>
                    <td>
                        <font style="font-weight: bold;">
                            <?php echo $value['title']; ?>
                        </font>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                            <?php echo $value['body']; ?>
                        </span>
                    </td>
                    <td>
                        <span class="uk-badge uk-badge-info">
                            <?php echo $value['category']; ?>
                        </span>
                    </td>
                    <td>
                        <?php
                        if($value['status']=="UNREAD"){
                            ?>
                            <span class="uk-badge uk-badge-danger">
                                <?php echo $value['status']; ?>
                            </span>
                            <?php
                        }else{
                            ?>
                            <span class="uk-badge uk-badge-success">
                                <?php echo $value['status']; ?>
                            </span>
                            <?php   
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $function->formatDate($value['sentDate']); ?>
                    </td>
                    <td>
                        <a href="conversation?message=<?php echo $value['messageId']; ?>&title=<?php echo $value['title']; ?>&synced=<?php echo $value['body']; ?>&mobile=<?php echo md5($value['status']); ?>" class="md-btn md-btn-warning md-btn-mini" data-uk-tooltip title="Soma ikiganiro Mwagiranye" action="">
                            <i class="fa fa-eye"></i> REBA IKIGANIRO
                        </a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script src="assets/js/common.min.js"></script>
