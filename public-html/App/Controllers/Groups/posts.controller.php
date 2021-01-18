<?php
session_start();
require('../../model.php');


$posts_content = $_POST["formPostsContent"];
$posts_group_id = $_POST["formPostsGroupID"];
$posts_content_pattern = "~^[^<>]{1,}$~";

$posts_content_validation = preg_match($posts_content_pattern, $posts_content);


//query the database only if post content is regex compliant
if ($posts_content_validation) {

    //insert the database row
    phpInsertPost($posts_group_id, $_SESSION["uid"], $posts_content);

    //system feedback - your message has been sent
    $_SESSION["msgid"] = "511";

}else{
    //input feedback - for Javascript turned off
    if (!$posts_content_validation) {
        //message not regex compliant
        $_SESSION["msgid"] = "501";
        //return the messaging_recipient back to the form
        $_SESSION["posts_content"] = $posts_content;
    }
}


header('Location: ../../Views/Gate/gate.view.php?module=posts&gid=' . $posts_group_id);

?>
