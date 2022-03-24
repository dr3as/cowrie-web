<?php
//import login for db
require "config.php";
//Create var for connecting to DB
$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pw, $mysql_db);
//if url var is set to auth use the auth file
if($_GET['url'] == "auth"){
    require "reqs/auth.php";
}
//if url var is set to clients use the client file
elseif($_GET['url'] == "clients"){
    require "reqs/clients.php";
}
elseif($_GET['url'] == "input"){
    require "reqs/input.php";
}
elseif($_GET['url'] == "sessions"){
    require "reqs/sessions.php";
}
elseif($_GET['url'] == "session"){
    require "reqs/session.php";
}
elseif($_GET['url'] == "downloads"){
    require "reqs/downloads.php";
}
elseif($_GET['url'] == "download"){
    require "reqs/download.php";
}
else{
echo "Use the menu on the left to navigate between different statistics/info";
}
?>
