<?php 
$root_url=$_SERVER['DOCUMENT_ROOT'].'/kiza/admin/';
$header_url=$root_url.'views/utils/system_header.php';
include_once $header_url;
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
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Available Crops</h4>
                        <h6 class="card-subtitle">
                            you can Export data to Copy, CSV, Excel, PDF & Print
                        </h6>
                        <button class="btn btn-info" data-target="#exampleTabs" data-toggle="modal" type="button">ADD NEW CROP</button>
                        <?php include $urls['add_crop']; ?>
                        <button class="btn btn-info" data-target="#example1" data-toggle="modal" type="button">ADD CROPS GRADE</button>
                        <?php include $urls['add_grade']; ?>
                        <button class="btn btn-info" data-target="#exampleTabs123" data-toggle="modal" type="button">ADD GRADE VARIETY</button>\<?php include $urls['add_variety']; ?>
                        <?php 
                        include $urls['load_system_crops'];
                        ?>
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