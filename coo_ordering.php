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
               Ubusabe bw' abaguzi ba :<?php echo $cooperativeName; ?>
            </h3>
            <?php include 'views/ordering/statistics.php'; ?>
            <?php 
            $orderingList=array();
            $orderingList=$cooperative->getOurOrders($cooperativeId);
            if(count($orderingList)>0){
            	include 'views/ordering/load_orders.php'; 
            }else{
            	include 'views/ordering/no_order.php'; 
            }
            ?>
        </div>
    </div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>