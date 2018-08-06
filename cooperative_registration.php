<?php 
require 'class_loader.php';
$provinces=array();
$provinces=$system->get_provinces();
?>
<div id="register_form" style="display: none">
    <button type="button" class="uk-position-top-right uk-close uk-margin-right back_to_login"></button>
    <h2 class="heading_a uk-margin-medium-bottom">Kora konti ya Koperative</h2>
    <form id="frm_coop_reg" method="POST">
        <div class="uk-form-row">
            <label for="register_username">Izina rya cooperative</label>
            <input class="md-input" type="text" id="coo_name" name="coo_name" required="" />
        </div>
        <div class="uk-form-row">
            <label for="register_password">Telefoni ya koperative</label>
            <input class="md-input" type="number" id="coo_phone" name="coo_phone" required=""/>
        </div>
        <div class="uk-form-row">
            <label for="register_password_repeat">Intara mu herereyemo!</label>
            <select id="province" name="province" class="md-input" required="">
                <?php 
                foreach ($provinces as $key => $value) {
                    ?>
                    <option value="<?php echo $value['provinceId']; ?>">
                        <?php echo $value['name']; ?>
                    </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="uk-form-row">
            <label for="register_email">Akarere koperative iherereyemo</label>
            <select id="districts" name="districts" class="md-input" required="">
                
            </select>
        </div>
        <div class="uk-form-row">
            <label for="register_email">TIN ya koperative niba ihari</label>
            <input type="text" class="md-input" required="" name="tin_number" id="tin_number">
        </div>
        <div class="uk-form-row">
            <label for="register_email">Amazina ya perezida</label>
            <input type="text" class="md-input" required="" name="president" id="president">
        </div>
        <div class="uk-form-row">
            <label for="register_email">Ijambo ry' ibanga</label>
            <input type="password" class="md-input" required="" name="password" id="password">
        </div>
        <div class="uk-form-row">
            <label for="password">Ongera ushyiremo ijambo ry' ibanga</label>
            <input type="password" class="md-input" required="" name="cpassword" id="cpassword">
        </div>
        <div class="uk-margin-medium-top">
            <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">ANDIKISHA KOPERATIVE</a>
        </div>
    </form>
</div>
    <?php include_once 'views/utils/access_scripts.php'; ?>
    <?php include_once 'views/utils/my_scripts.php'; ?>