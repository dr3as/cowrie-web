<?php
$session = $_GET['session'];
echo "<h2>Session</h2>";
echo "<b>";
echo $session;
echo "</b><br>";
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution


// Close connection
mysqli_close($link);
?>