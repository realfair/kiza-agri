<?php 
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$header_url=$root_url.'views/utils/system_header.php';
include_once $header_url;
//check if getter are setted
if(isset($_GET['coop'])){
    //get cooperative
    $rand_coop=(int)$function->sanitize($_GET['coop']);
    $cooperativeId=($rand_coop/1000);
    //check if cooperative is valid
    $isValidCooperative=$admin->checkCooperativeId($cooperativeId);
    if(!$isValidCooperative){
        header("Location :dashboard");
        exit();
    }else{
        //get cooperative name
        $cooperativeName=$system->table_field("cooperatives","cooperativeId",$cooperativeId,"name");
    }
}else{
    header("Location :dashboard");
    exit();
}
?>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader" style="display:none;">
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
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cooperative :<?php echo $cooperativeName; ?></h4>
                        <h6 class="card-subtitle">
                            you can Export data to Copy, CSV, Excel, PDF & Print
                        </h6>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="fa fa-home"></i>
                                            </span>
                                            <span class="hidden-xs-down">Members</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">Crops</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#pricing" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">Pricing</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#harvest" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">Harvest</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#fertilizers" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">Fertilizers</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#pesticides" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">Pesticides</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#land" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-user"></i>
                                            </span>
                                            <span class="hidden-xs-down">Land</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                                            <span class="hidden-sm-up"><i class="ti-email"></i></span>
                                            <span class="hidden-xs-down">Messages</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#about" role="tab">
                                            <span class="hidden-sm-up">
                                                <i class="ti-email"></i>
                                            </span>
                                            <span class="hidden-xs-down">About</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <?php 
                                            include $urls['load_cooperative_members'];
                                            ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <?php include $urls['load_cooperative_crops']; ?>
                                    </div>
                                    <div class="tab-pane  p-20" id="pricing" role="tabpanel">
                                        <?php include $urls['load_cooperative_pricing']; ?>
                                    </div>
                                    <div class="tab-pane p-20" id="harvest" role="tabpanel">
                                        <?php include_once $urls['load_cooperative_harvest']; ?>
                                    </div>
                                    <div class="tab-pane p-20" id="fertilizers" role="tabpanel">
                                        <?php include_once $urls['cooperative_fertilizers']; ?>
                                    </div>
                                    <div class="tab-pane p-20" id="pesticides" role="tabpanel">
                                        <?php include_once $urls['cooperative_pesticide']; ?>
                                    </div>
                                    <div class="tab-pane p-20" id="land" role="tabpanel">
                                        <?php include_once $urls['cooperative_land']; ?>
                                    </div>
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">
                                        <?php include_once $urls['load_messages']; ?>
                                    </div>
                                    <div class="tab-pane p-20" id="about" role="tabpanel">
                                        About cooperative
                                    </div>
                                </div>
                    </div>
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