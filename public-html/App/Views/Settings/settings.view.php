<?php
$dbUserRow = phpGetUserData($_SESSION["uid"]);
?>
<div class="row">
    <div class="col-lg-12">
        <h5 class="mt-3">Profile info</h5>
        <hr>
    </div>
</div>

<div class="row">
    <div class="col-lg-8" style="margin: auto">
        <form name="formSettingsBasics"  action="../../Controllers/Settings/settings.controller.php" method="post">
            <button type="submit" style="float: right" id="deleteUserAccount" name="deleteUserAccount"
                    class="btn btn-warning">Delete account</button>
            <div class="form-group">
                <label for="formSettingsBasicsFirstName" class="mt-3">First name</label>
                <input type="text"
                       class="form-control <?php if ($_SESSION['msgid'] != '201' && $_SESSION['msgid'] != '') {
                           echo 'is-valid';
                       } else {
                           echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                       } ?>"
                       id="formSettingsBasicsFirstName" name="formSettingsBasicsFirstName"
                       placeholder="Enter your first name (min 1 char.)"
                       value="<?php echo $dbUserRow['user_firstname']; ?>">

                <?php if ($_SESSION["msgid"] == "201") { ?>
                    <div class="invalid-feedback">
                        <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <div class="form-group">
                <label for="formSettingsBasicsLastName">Last name</label>
                <input type="text"
                       class="form-control <?php if ($_SESSION['msgid'] != '202' && $_SESSION['msgid'] != '') {
                           echo 'is-valid';
                       } else {
                           echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                       } ?>"
                       id="formSettingsBasicsLastName" name="formSettingsBasicsLastName"
                       placeholder="Enter your last name (min 1 char.)"
                       value="<?php echo $dbUserRow['user_lastname']; ?>">

                <?php if ($_SESSION["msgid"] == "202") { ?>
                    <div class="invalid-feedback">
                        <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <?php if ($dbUserRow['user_role'] != 0) { ?>
                <div class="form-group">
                    <label for="formSettingsBasicsNickName">Nickname</label>
                    <input type="text"
                           class="form-control <?php if ($_SESSION['msgid'] != '203' && $_SESSION['msgid'] != '') {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSettingsBasicsNickName" name="formSettingsBasicsNickName"
                           placeholder="Enter your nickname (min 1 char.)"
                           value="<?php echo $dbUserRow['user_nickname']; ?>">

                    <?php if ($_SESSION["msgid"] == "203") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label for="formSettingsBasicsAge">Age</label>
                    <input type="text"
                           class="form-control <?php if ($_SESSION['msgid'] != '204' && $_SESSION['msgid'] != '') {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSettingsBasicsAge" name="formSettingsBasicsAge"
                           placeholder="Enter your Age" onkeyup="jsSettingsValidateAge('formSettingsBasicsAge')"
                           value="<?php echo $dbUserRow['user_age']; ?>">

                    <?php if ($_SESSION["msgid"] == "204") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label for="formSettingsBasicsTown">Town</label>
                    <input type="text"
                           class="form-control <?php if ($_SESSION['msgid'] != '205' && $_SESSION['msgid'] != '') {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSettingsBasicsTown" name="formSettingsBasicsTown"
                           placeholder="Enter your town (min 1 char.)"
                           value="<?php echo $dbUserRow['user_town']; ?>">

                    <?php if ($_SESSION["msgid"] == "205") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="form-group">
                    <label for="formSettingsBasicsHobbies">Hobbies</label>
                    <input type="text"
                           class="form-control <?php if ($_SESSION['msgid'] != '206' && $_SESSION['msgid'] != '') {
                               echo 'is-valid';
                           } else {
                               echo(phpShowInputFeedback($_SESSION['msgid'])[0]);
                           } ?>"
                           id="formSettingsBasicsHobbies" name="formSettingsBasicsHobbies"
                           placeholder="Enter your hobbies (min 1 char.)"
                           value="<?php echo $dbUserRow['user_hobbies']; ?>">

                    <?php if ($_SESSION["msgid"] == "206") { ?>
                        <div class="invalid-feedback">
                            <?php echo(phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <button type="submit" id="formSettingsBasicsSubmit" name="formSettingsBasicsSubmit"
                    class="btn btn-primary btn-info">Save</button>
            <button type="submit" id="formSettingsBasicsClear" name="formSettingsBasicsClear"
                    class="btn btn-primary btn-info">Clear</button>
        </form>
    </div>
</div>

<script src="../../../JS/settings.js"></script>
