<html>
<head>
<title>Cowrie Web</title>
<style type="text/css">
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require "config.php";
if ($dark_mode == "on") {
echo "body {background-color: black; color: lightgrey;} a:link{color: DeepSkyBlue;} a:visited{color: DeepSkyBlue;} a:hover{color: lightgrey;} a:active{color: lightgrey;}";
}
?>
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:lightgrey;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px; overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:lightgrey;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px; font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
</head>
<body>
<h1>Cowrie Web</h1>
<table class="tg">
<thead>
  <tr>
    <td class="tg-0lax">
    <br>
    <a href="index.php">Home</a><br>
    <a href="index.php?url=auth">Logins</a><br>
    <a href="index.php?url=clients">Clients</a><br>
    <a href="index.php?url=input">Commands</a><br>
    <a href="index.php?url=sessions">Sessions</a><br>
    <a href="index.php?url=downloads">Downloads</a><br>
    </td>
    <td class="tg-0lax">
    <?php
    require "includemain.php";
    ?>
    </td>
  </tr>
</thead>
</table>
<body>
</html>
