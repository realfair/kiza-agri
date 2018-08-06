<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/views/utils/system_header.php';
?>
<body class="disable_transitions sidebar_main_open sidebar_main_swipe">
    <!-- main header -->
    <?php include 'views/utils/navigation.php'; ?>
    <!-- main header end -->
    <!-- main sidebar -->
    <?php include 'views/utils/sidebar.php'; ?>
    <!-- main sidebar end -->

    <div id="page_content">
        <div id="page_content_inner">

            <h3 class="heading_b uk-margin-bottom">
                <?php echo $errors->land_header_message(); ?> :<?php echo $cooperativeName; ?>
            </h3>
            <!-- statistics (small charts) -->
            <?php include 'coo_land/add_modal.php'; ?>
            <?php include 'coo_land/land_statistics.php'; ?>
            <?php 
            $landCounter=$cooperative->getCooperativeTotalLand($cooperativeId);
            if($landCounter>0){
                ?>
                <?php include 'coo_land/load_land.php'; ?>
                <?php
            }else{
                ?>
                <div style="background: #dd4422;" class="uk-alert uk-alert-large" data-uk-alert>
                    <h4 class="heading_b">Nta makuru ahari</h4>
                    <?php 
                    echo $errors->no_land_message();
                    ?>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>