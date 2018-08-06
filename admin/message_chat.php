<?php
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$header_url=$root_url.'views/utils/system_header.php';
include_once $header_url;
if(isset($_GET['conversation'])){
    $conversation=$function->sanitize($_GET['conversation']);
    //check if conversation is saved
    if($admin->checkMessageId($conversation)){
        //get admin name and cooperative info
        $cooperativeId=$admin->field_data("coo_communication","messageId",$conversation,"cooperativeId");
        $cooperativeName=$admin->field_data("cooperatives","cooperativeId",$cooperativeId,"name");
        $adminId=$admin->field_data("coo_communication","messageId",$conversation,"adminId");
        ?>
        <script type="text/javascript">
            const cooperative="<?php echo $cooperativeId ?>";
            const user="<?php echo $adminId;?>";
            const message="<?php echo $conversation; ?>";
        </script>
        <?php
    }else{
    ?>
    <script type="text/javascript">window.location="dashboard";</script>
    <?php  
    }
}else{
    ?>
    <script type="text/javascript">window.location="dashboard";</script>
    <?php
}
?>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include 'views/utils/header.php'; ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include 'sidebar.php'; ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Container fluid  -->
<div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Conversation: With <?php echo $cooperativeName; ?></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="coop_view?coop=<?php echo ($cooperativeId * 1000); ?>"><?php echo $cooperativeName; ?></a>
                        </li>
                        <li class="breadcrumb-item active">Conversation</li>
                    </ol>
                </div>
</div>
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <?php include $urls['conversation']; ?>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <?php include 'views/utils/footer.php'; ?>
    <!-- End footer -->
</div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <?php include 'views/utils/scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>

</html>