<?php
//import login for db
require "config.php";
//Create var for connecting to DB
$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pw, $mysql_db);
//if url var is set to auth use the auth file
if($_GET['url']){
$get_url = $_GET['url'];
}
if($get_url == "auth"){
    require "reqs/auth.php";
}
//if url var is set to clients use the client file
elseif($get_url == "clients"){
    require "reqs/clients.php";
}
elseif($get_url == "input"){
    require "reqs/input.php";
}
elseif($get_url == "sessions"){
    require "reqs/sessions.php";
}
elseif($get_url == "session"){
    require "reqs/session.php";
}
elseif($get_url == "downloads"){
    require "reqs/downloads.php";
}
elseif($get_url == "download"){
    require "reqs/download.php";
}
else{
echo "Use the menu on the left to navigate between different statistics/info";
}
?>
