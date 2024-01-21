<?php 
    require("khach-hang.php");
    require("../function/mailer.php");
    db_user_update_vevification($_POST["code"],$_POST["id"]);
    $user = db_user_select_by_id($_POST["id"]);
    sendGmailCodebyMailer($user["email"],$user["user"],$_POST["code"],$user["name"]);
    echo db_user_select_by_id($_POST["id"])["created_time"];
?>