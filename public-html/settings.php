<?php
$db_data = array($_SESSION["uid"]);
$dbUserRow = phpFetchDB('SELECT * FROM users WHERE user_id = ?', $db_data);
$db_data = "";
?>

<h5>Basics</h5>
<hr>

<div class="row">
    <div class="col-lg-12">
        <form name="formSettingsBasics" action="settings.controller.php" method="post" novalidate>
            <div class="form-group">
                <label for="formSettingsBasicsFirstName">First name</label>
                <input type="text" class="form-control <?php if ($_SESSION['msgid']!='201' && $_SESSION['msgid']!='')
                { echo 'is-valid'; }else{ echo (phpShowInputFeedback($_SESSION['msgid'])[0]); } ?>"
                       id="formSettingsBasicsFirstName" name="formSettingsBasicsFirstName"
                       placeholder="Enter your first name" onkeyup="jsSettingsValidateName('formSettingsBasicsFirstName')"
                        value="<?php echo $dbUserRow['user_firstname'];?>">

                <?php if ($_SESSION["msgid"]=="201") { ?>
                    <div class="invalid-feedback">
                        <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="formSettingsBasicsLastName">Last name</label>
                <input type="text" class="form-control <?php if ($_SESSION['msgid']!='202' && $_SESSION['msgid']!='')
                { echo 'is-valid'; }else{ echo (phpShowInputFeedback($_SESSION['msgid'])[0]); } ?>"
                       id="formSettingsBasicsLastName" name="formSettingsBasicsLastName"
                       placeholder="Enter your last name" onkeyup="jsSettingsValidateName('formSettingsBasicsLastName')"
                       value="<?php echo $dbUserRow['user_lastname'];?>">

                <?php if ($_SESSION["msgid"]=="202") { ?>
                    <div class="invalid-feedback">
                        <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="formSettingsBasicsNickName">Nickname</label>
                <input type="text" class="form-control <?php if ($_SESSION['msgid']!='203' && $_SESSION['msgid']!='')
                { echo 'is-valid'; }else{ echo (phpShowInputFeedback($_SESSION['msgid'])[0]); } ?>"
                       id="formSettingsBasicsNickName" name="formSettingsBasicsNickName"
                       placeholder="Enter your nickname" onkeyup="jsSettingsValidateName('formSettingsBasicsNickName')"
                       value="<?php echo $dbUserRow['user_nickname'];?>">

                <?php if ($_SESSION["msgid"]=="203") { ?>
                    <div class="invalid-feedback">
                        <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <button type="submit" id="formSettingsBasicsSubmit" name="formSettingsBasicsSubmit"
                    class="btn btn-primary btn-info">Save</button>
            <button type="submit" id="formSettingsBasicsClear" name="formSettingsBasicsClear"
                    class="btn btn-primary btn-info">Clear</button>
        </form>
    </div>
</div>


<script src="settings.js"></script>