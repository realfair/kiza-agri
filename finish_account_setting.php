<?php 
require_once $_SERVER['DOCUMENT_ROOT'].'/kiza/auth.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/kiza/class_loader.php';
$user_id=$_SESSION['user_id'];
$names=$_SESSION['names'];
$user_type=$_SESSION['user_type'];
//get user cooperative
$cooperativeId=$cooperative->getUserCooperative($user_id);
?>
<!doctype html>
<html lang="en">
<?php include 'views/utils/access_header.php'; ?>
<body class="login_page">

    <div class="login_page_wrapper">
        <div class="md-card" id="login_card">
            <div class="md-card-content large-padding" id="login_form">
                <div class="login_heading">
                    <div class="user_avatar"></div>
                    <h3>Uzuzamo amakuru yanyuma<br> <sub><?php echo $names; ?></sub></h3>
                </div>
                <form id="frm_finish" method="POST">
                    <div class="uk-form-row">
                        <label for="login_password">Umurenge Koperative iherereyemo</label>
                        <?php 
                        $sector=(int)$cooperative->getCooperativeFieldData($cooperativeId,"sector");
                        if($sector>0){

                        }else{
                            ?>

                        <select class="md-input" id="sector" required="">
                            <?php 
                            //get sector from cooperative district
                            $sectors=array();
                            $districtId=(int)$cooperative->getCooperativeFieldData($cooperativeId,"location");
                            $sectors=$system->district_sectors($districtId);
                            foreach ($sectors as $key => $value) {
                                ?>
                                <option value="<?php echo $value['sectorId']; ?>">
                                    <?php echo $value['name']; ?>
                                </option>
                                <?php
                            }
                            ?>
                            
                        </select>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="uk-form-row" style="display: none;">
                        <label for="login_password">Akagari Koperative iherereyemo</label>
                        <select class="md-input" required="">
                            <option>Kacyiru</option>
                        </select>
                    </div>
                    <div class="uk-form-row" style="display: none;">
                        <label for="login_password">Umudugudu Koperative iherereyemo</label>
                        <select class="md-input" required="">
                            <option>Kacyiru</option>
                        </select>
                    </div>
                    <div class="uk-margin-medium-top">
                        <input type="hidden" value="<?php echo $cooperativeId; ?>" name="cooperative" id="cooperative">
                        <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large">
                            Injira muri konti
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once 'views/utils/access_scripts.php'; ?>
    <?php include_once 'views/utils/my_scripts.php'; ?>
</body>
</html>