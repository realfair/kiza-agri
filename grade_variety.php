<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/views/utils/system_header.php';
if(isset($_GET['from'])){
	$gradeId=$function->sanitize($_GET['from']);
	//check if crops is registered.
	if(!$cooperative->checkGrade($gradeId)){
		header("Location: dashboard");
		exit();
	}
	//get grade name
	$gradeName=$system->selectTableField("cropsgrade","grade","gradeId",$gradeId);
	//get grade crop
	$cropId=$system->selectTableField("cropsgrade","cropId","gradeId",$gradeId);
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
                <?php echo $errors->grade_varieties(); ?> :<?php echo $gradeName; ?>
            </h3>
            <!-- statistics (small charts) -->
            <?php include 'grade_variety/grade_statistics.php'; ?>
            <?php include 'grade_variety/load_grade_varieties.php'; ?>
        </div>
    </div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>