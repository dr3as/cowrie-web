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
$sql_session_ip = "SELECT ip, client FROM sessions where id = \"$session\"";
if($result_session_ip = mysqli_query($link, $sql_session_ip)){
    if(mysqli_num_rows($result_session_ip) > 0){
        echo "IP: ";
        while($row_session_ip = mysqli_fetch_array($result_session_ip)){
            echo $row_session_ip['ip'];
            echo "<br>Client: ";
            $clientid = $row_session_ip['client'];
            if($client = mysql_query($link, "SELECT version from clients where id = \"$clientid\"")){
            echo $row_session_ip['client'];
            echo mysqli_num_rows($client);
        }
        }
            // Free result set
        mysqli_free_result($result_session_ip);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_session_ip. " . mysqli_error($link);
}
// Attempt select query execution


// Close connection
mysqli_close($link);
?>