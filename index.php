<html>
<head>
<title>Cowrie Logs</title>
<style type="text/css">
<?php
if ($dark_mode == "on") {
echo "body {background-color: black; color: lightgrey;}";
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
