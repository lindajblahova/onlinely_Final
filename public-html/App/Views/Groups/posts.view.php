<?php
$dbPostsList = phpGetPostsInGroup($_GET["gid"]);
$dbUserIsAdmin = phpGetUserData($_SESSION["uid"]);
?>
<div class="row">
    <div class="col-lg-6">
        <h5><?php echo phpGetGroupName($_GET["gid"]); ?></h5>
    </div>
    <div class="col-lg-6">
        <?php if (phpGetGroupOwnerID($_GET["gid"]) == $_SESSION["uid"]) { ?>
            <a href="../Gate/gate.view.php?module=group&gid=<?php echo $_GET["gid"]; ?>"
               class="btn btn-primary btn-sm float-right mt-3" role="button">Settings</a>
        <?php } ?>
    </div>
</div>
<hr>


<div class="row">
    <div class="col-lg-12">
        <form name="formPosts" action="../../Controllers/Groups/posts.controller.php" method="post">
            <div class="form-group">
                <label for="formPostsContent">Create a new post</label>
                <textarea class="form-control <?php if ($_SESSION['msgid']!='501' && $_SESSION['msgid']!='')
                { echo 'is-valid'; }else{ echo (phpShowInputFeedback($_SESSION['msgid'])[0]); } ?>"
                          id="formPostsContent" name="formPostsContent"
                          placeholder="Write the post here. Tags are not allowed." required><?php echo $_SESSION["posts_content"];?></textarea>

                <?php if ($_SESSION["msgid"]=="501") { ?>
                    <div class="invalid-feedback">
                        <?php echo (phpShowInputFeedback($_SESSION["msgid"])[1]); ?>
                    </div>
                <?php } ?>
            </div>

            <input type="hidden" id="formPostsGroupID" name="formPostsGroupID" value="<?php echo $_GET['gid']; ?>">
            <button type="submit" id="formPostsSubmit" name="formPostsSubmit" class="btn btn-primary btn-success mb-5">Send</button>
        </form>
    </div>
</div>

<p><strong>Latest posts</strong></p>
<hr>

<div class="row">
    <div class="col-lg-8" style="margin: auto;">
        <?php foreach ($dbPostsList as $dbPostRow) { ?>

            <div class="message_header">
                <h4><?php echo phpGetUserEmail($dbPostRow["post_author_id"]); ?>
                    |  <?php echo $dbPostRow["post_date"]; ?></h4>
            </div>

            <div id="databasePostsContent<?php echo $dbPostRow['post_id'];?>"
                 class="message_content"><?php echo $dbPostRow["post_content"]; ?></div>
            <hr>
        <?php }?>
    </div>

</div>

<?php
$_SESSION["posts_content"] = "";
?>