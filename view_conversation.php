<?php 
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/views/utils/system_header.php';
?>
<?php 
//check if message id is setted
if(isset($_GET['message'])){
    //get setted keye
    $messageId=$function->sanitize($_GET['message']);
    //check message id is registered
    $isValidMessage=$cooperative->checkMessageId($messageId);
    if(!$isValidMessage){
        backHome();
    }else{
        //get message receiver
        $adminId=$system->selectTableField("coo_communication","adminId","messageId",$messageId);
    }
}else{
    backHome();
}

function backHome(){
    header("Location: communication");
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

    <div id="page_heading" data-uk-sticky="{ top: 48, media: 960 }">
        <h1>Ubutumwa  na :<font color="#009966;">
            <?php echo $system->selectTableField("admin_users","userName","userId",$adminId); ?>
        .</font>.</h1>
    </div>

    <div id="page_content_inner">

        <div class="md-card">
            <div class="md-card-content">
                <div class="uk-grid uk-grid-divider" data-uk-grid-margin>
                    <div class="uk-width-medium-3-4">
                        <div class="uk-margin-large-bottom">
                            <h2 class="heading_c uk-margin-medium-bottom">
                                <font style="font-weight: bold;font-size: 20px;">
                                    <?php 
                                    if(isset($_GET['title'])){
                                        echo $_GET['title'];
                                    }
                                    ?>
                                </font>
                            </h2>
                            <div class="md-card">
                                <div class="md-card-content">
                                    <?php 
                                        if(isset($_GET['synced'])){
                                            echo $_GET['synced'];
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="uk-margin-large-bottom">
                            <h2 class="heading_c uk-margin-small-bottom">Comments</h2>
                            <ul class="uk-comment-list">
                                <?php 
                                $comments=$cooperative->loadMessageComments($messageId);
                                if(count($comments)>0){
                                   foreach ($comments as $key => $value) {
                                       if($value['senderId'] == $cooperativeId){
                                        ?>
                                        <li style="background-color: #0066cc;border-radius: 10px;">
                                            <article class="uk-comment">
                                                <header class="uk-comment-header">
                                                    <img class="md-user-image uk-comment-avatar" src="assets/img/avatars/user.png" alt="">
                                                    <h4 style="color: #fff;" class="uk-comment-title">
                                                        <?php 
                                                        echo $system->selectTableField("cooperatives","president","cooperativeId",$value['senderId']);
                                                        ?>
                                                    </h4>
                                                    <div style="color: #fff;" class="uk-comment-meta">
                                                        <?php echo $function->formatDate($value['sentDate']); ?>
                                                    </div>
                                                </header>
                                                <div class="uk-comment-body">
                                                    <p style="color: #fff;">
                                                        <?php echo $value['comment']; ?>
                                                    </p>
                                                </div>
                                            </article>
                                        </li>
                                        <?php
                                       }else{
                                        ?>
                                        <li style="background-color: #009966;border-radius: 10px;">
                                            <article class="uk-comment">
                                                <header class="uk-comment-header">
                                                    <img class="md-user-image uk-comment-avatar" src="assets/img/avatars/user.png" alt="">
                                                    <h4 style="color: #fff;" class="uk-comment-title">
                                                        <?php 
                                                        echo $system->selectTableField("admin_users","userName","userId",$value['senderId']);
                                                        ?>
                                                    </h4>
                                                    <div style="color: #fff;" class="uk-comment-meta">
                                                        <?php echo $function->formatDate($value['sentDate']); ?>
                                                    </div>
                                                </header>
                                                <div class="uk-comment-body">
                                                    <p style="color: #fff;">
                                                        <?php echo $value['comment']; ?>
                                                    </p>
                                                </div>
                                            </article>
                                        </li>
                                        <?php
                                       }
                                   }
                                }else{
                                    ?>
                                <li style="background-color: red;border-radius: 10px;padding: 10px;">
                                    <article class="uk-comment">
                                        <div class="uk-comment-body">
                                            <p style="color: #fff;">
                                                <?php echo $errors->no_comments(); ?>
                                            </p>
                                        </div>
                                    </article>
                                </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <textarea id="txt_comment" cols="30" rows="4" class="md-input" placeholder="Add Comment..."></textarea>
                        <a id="btn_add_comment" coop="<?php echo $cooperativeId; ?>" user="<?php echo $adminId; ?>" action="<?php echo $messageId; ?>" class="md-btn uk-margin-top">OHEREZA IGITEKEREZO</a>
                    </div>
                    <div style="display: none;" class="uk-width-medium-1-4">
                        <div class="uk-margin-medium-bottom">
                            <p>
                                Priority:
                                <span class="uk-badge uk-badge-success uk-text-upper uk-margin-small-left">Major</span>
                            </p>
                            <p>
                                Status:
                                <span class="uk-badge uk-badge-outline uk-text-upper uk-margin-small-left">Open</span>
                            </p>
                        </div>
                        <h2 class="heading_c uk-margin-small-bottom">Details</h2>
                        <ul class="md-list md-list-addon">
                            <li>
                                <div class="md-list-addon-element">
                                    <img class="md-user-image md-list-addon-avatar" src="assets/img/avatars/avatar_02_tn.png" alt=""/>
                                </div>
                                <div class="md-list-content">
                                    <span class="md-list-heading">Amir Erdman</span>
                                    <span class="uk-text-small uk-text-muted">Assignee</span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-addon-element">
                                    <i class="md-list-addon-icon material-icons">&#xE8DF;</i>
                                </div>
                                <div class="md-list-content">
                                    <span class="md-list-heading">14 Jun 2015</span>
                                    <span class="uk-text-small uk-text-muted">Created</span>
                                </div>
                            </li>
                            <li>
                                <div class="md-list-addon-element">
                                    <i class="md-list-addon-icon material-icons">&#xE8B5;</i>
                                </div>
                                <div class="md-list-content">
                                    <span class="md-list-heading">18 Jun 2015</span>
                                    <span class="uk-text-small uk-text-muted">Updated</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
    <?php include 'views/utils/data_scripts.php'; ?>
    <?php include 'views/utils/my_scripts.php'; ?>
</body>
</html>