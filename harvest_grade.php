<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/views/utils/system_header.php';
if(isset($_GET['from'])){
	$cropId=$function->sanitize($_GET['from']);
	//check if crops is registered.
	if(!$cooperative->checkCropId($cropId)){
		header("Location: dashboard");
		exit();
	}
}else{
	header("Location: dashboard");
	exit();
}
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
                <?php echo $errors->fertilizer_header(); ?> :<?php echo $cooperativeName; ?>
            </h3>
            <!-- statistics (small charts) -->
            <?php include 'harvest_grade/crop_statistics.php'; ?>
            <?php include 'harvest_grade/load_crop_grades.php'; ?>

        </div>
    </div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>