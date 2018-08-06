
<!doctype html>
<html lang="en">
<?php include 'views/utils/access_header.php'; ?>
<body class="login_page login_page_v2">

    <div class="uk-container uk-container-center">
        <div class="md-card">
            <div class="md-card-content padding-reset">
                <div class="uk-grid uk-grid-collapse">
                    <div class="uk-width-large-2-3 uk-hidden-medium uk-hidden-small">
                        <div class="login_page_info uk-height-1-1" style="background-image: url('assets/img/backgrounds/login_bg.jpg')">
                            <div class="info_content">
                                <h1 class="heading_b">Ikaze kuri Kizalab Agri</h1>
                                Dufasha kubika umusaruro , kumenya amakuru ku musaruro ndetse n' ibindi.
                                <p>
                                    <a class="md-btn md-btn-success md-btn-small md-btn-wave" href="javascript:void(0)">More info</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-large-1-3 uk-width-medium-2-3 uk-container-center">
                        <div class="login_page_forms">
                            <div id="login_card">
                                <?php include 'cooperative_registration.php'; ?>
                                <?php include 'cooperative_login.php'; ?>
                                <?php include 'home/login_help.php'; ?>
                                <?php include 'home/view_reset_password.php'; ?>
                                
                            </div>
                            <div class="uk-margin-top uk-text-center">
                                <a href="#" id="signup_form_show">
                                    ANDIKISHA KOPERATIVE
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include_once 'views/utils/access_scripts.php'; ?>
    <?php include_once 'views/utils/my_scripts.php'; ?>
</body>
</html>