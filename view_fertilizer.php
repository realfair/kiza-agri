<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/views/utils/system_header.php';
if(isset($_GET['fertilizer']) && isset($_GET['status'])){
    //get setted fertilizer
    $fertilizerId=$function->sanitize($_GET['fertilizer']);
    //check if fertilizer exist in our system
    $isValid=$cooperative->checkFertilizer($fertilizerId);
    if(!$isValid){
        header("Location:fertilizers");
        exit();  
    }
    $allowedStatus=array(1,0);
    $status=$_GET['status'];
    if(!in_array($_GET['status'], $allowedStatus)){
        header("Location:fertilizers");
        exit();   
    }
    //get fertilizer name.
    $table="system_fertilizers";
    $id_name="fertilizerId";
    $id_field=$fertilizerId;
    $fieldname="name";
    $fertilizerName=$system->selectTableField($table,$id_name,$id_field,$fieldname);
}else{
    header("Location:fertilizers");
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
                <?php
                if($status==1){
                    echo $errors->memberWithFertilizer();
                }else{
                    echo $errors->memberWithNoFertilizer();
                }
                ?> :<?php echo $fertilizerName; ?>
            </h3>
            <!-- statistics (small charts) -->
            <?php include 'coo_fertilizers/add_modal.php'; ?>
            <?php include 'view_fertilizer/fertilizers_statistics.php'; ?>
            <?php 
            $coo_members=array();
            $coo_members=$cooperative->loadCooperativeMembers($cooperativeId);
            if($status==1){
               include 'view_fertilizer/members_with_fertilizer.php'; 
           }else{
                include 'view_fertilizer/members_with_no_fertilizer.php';
           }
            ?>
        </div>
    </div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>