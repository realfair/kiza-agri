<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/views/utils/system_header.php';
if(isset($_GET['fertilizer']) && isset($_GET['status'])){
    //get setted fertilizer
    $pesticideId=$function->sanitize($_GET['fertilizer']);
    //check if fertilizer exist in our system
    $isValid=$cooperative->checkPesticide($pesticideId);
    if(!$isValid){
        header("Location:pesticides");
        exit();  
    }
    $allowedStatus=array(1,0);
    $status=$_GET['status'];
    if(!in_array($_GET['status'], $allowedStatus)){
        header("Location:pesticides");
        exit();   
    }
    //get fertilizer name.
    $table="system_pesticides";
    $id_name="pesticideId";
    $id_field=$pesticideId;
    $fieldname="name";
    $pesticideName=$cooperative->getPesticideName($pesticideId);
}else{
    header("Location:pesticides");
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
                    echo $errors->memberWithPesticide();
                }else{
                    echo $errors->memberWithNoPesticide();
                }
                ?> :<?php echo $pesticideName; ?>
            </h3>
            <!-- statistics (small charts) -->
            <?php include 'views/pesticides/add_modal.php'; ?>
            <?php include 'views/pesticides/statistics.php'; ?>
            <?php 
            $coo_members=array();
            $coo_members=$cooperative->loadCooperativeMembers($cooperativeId);
            if($status==1){
               include 'views/pesticides/member_with_pesticide.php'; 
           }else{
                include 'views/pesticides/member_with_no_pesticide.php';
           }
            ?>
        </div>
    </div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>