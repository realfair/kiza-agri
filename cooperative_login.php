<div id="login_form">
    <div class="login_heading">
        <div class="user_avatar"></div>
    </div>
    <form id="frm_login">
        <div class="uk-form-row">
            <label for="login_username">Izina ryo kwinjira</label>
            <input class="md-input" type="text" id="login_username" name="login_username" required=""/>
        </div>
        <div class="uk-form-row">
            <label for="login_password">Ijambo ry'ibanga</label>
            <input class="md-input" type="password" id="login_password" name="login_password" required="" />
        </div>
        <div class="uk-margin-medium-top">
            <button class="md-btn md-btn-primary md-btn-block md-btn-large">INJIRA MURI KONTI</button>
        </div>
        <div class="uk-margin-top">
            <a href="#" id="login_help_show" class="uk-float-right">Ukeneye ubufasha?</a>
            <span class="icheck-inline">
                <input style="visibility: hidden;" type="checkbox" name="login_page_stay_signed" id="login_page_stay_signed" data-md-icheck />
                <label for="login_page_stay_signed" class="inline-label">Stay signed in</label>
            </span>
        </div>
    </form>
</div>
    <?php include_once 'views/utils/access_scripts.php'; ?>
    <?php include_once 'views/utils/my_scripts.php'; ?>