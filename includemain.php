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
elseif($_GET['url'] == "downloads"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_downloads = "SELECT * FROM downloads";
if($result_downloads = mysqli_query($link, $sql_downloads)){
    if(mysqli_num_rows($result_downloads) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Session</th>";
                echo "<th>Timestamp</th>";
                echo "<th>url</th>";
                echo "<th>outfile</th>";
                echo "<th>shasum</th>";
            echo "</tr>";
        while($row_downloads = mysqli_fetch_array($result_downloads)){
            echo "<tr>";
                #echo "<td>" . $row_downloads['id'] . "</td>";
                echo "<td>" . $row_downloads['session'] . "</td>";
                echo "<td>" . $row_downloads['timestamp'] . "</td>";
                echo "<td>" . $row_downloads['url'] . "</td>";
                echo "<td>" . $row_downloads['outfile'] . "</td>";
                echo "<td>" . $row_downloads['shasum'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_downloads);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_downloads. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "keyfingerprints"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_keyfingerprints = "SELECT * FROM keyfingerprints";
if($result_keyfingerprints = mysqli_query($link, $sql_keyfingerprints)){
    if(mysqli_num_rows($result_keyfingerprints) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Session</th>";
                echo "<th>username</th>";
                echo "<th>fingerprint</th>";
            echo "</tr>";
        while($row_keyfingerprints = mysqli_fetch_array($result_keyfingerprints)){
            echo "<tr>";
                #echo "<td>" . $row_keyfingerprints['id'] . "</td>";
                echo "<td>" . $row_keyfingerprints['session'] . "</td>";
                echo "<td>" . $row_keyfingerprints['username'] . "</td>";
                echo "<td>" . $row_keyfingerprints['fingerprint'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_keyfingerprints);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_keyfingerprints. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "params"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_params = "SELECT * FROM params";
if($result_params = mysqli_query($link, $sql_params)){
    if(mysqli_num_rows($result_params) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Session</th>";
                echo "<th>arch</th>";
            echo "</tr>";
        while($row_params = mysqli_fetch_array($result_params)){
            echo "<tr>";
                #echo "<td>" . $row_params['id'] . "</td>";
                echo "<td>" . $row_params['session'] . "</td>";
                echo "<td>" . $row_params['arch'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_params);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_params. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "ipforwards"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_ipforwards = "SELECT * FROM ipforwards";
if($result_ipforwards = mysqli_query($link, $sql_ipforwards)){
    if(mysqli_num_rows($result_ipforwards) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Session</th>";
                echo "<th>timestamp</th>";
                echo "<th>dst_ip</th>";
                echo "<th>dst_port</th>";
            echo "</tr>";
        while($row_ipforwards = mysqli_fetch_array($result_ipforwards)){
            echo "<tr>";
                #echo "<td>" . $row_ipforwards['id'] . "</td>";
                echo "<td>" . $row_ipforwards['session'] . "</td>";
                echo "<td>" . $row_ipforwards['timestamp'] . "</td>";
                echo "<td>" . $row_ipforwards['dst_ip'] . "</td>";
                echo "<td>" . $row_ipforwards['dst_port'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_ipforwards);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_ipforwards. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "ipforwardsdata"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_ipforwardsdata = "SELECT * FROM ipforwardsdata";
if($result_ipforwardsdata = mysqli_query($link, $sql_ipforwardsdata)){
    if(mysqli_num_rows($result_ipforwardsdata) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Session</th>";
                echo "<th>timestamp</th>";
                echo "<th>dst_ip</th>";
                echo "<th>dst_port</th>";
                echo "<th>data</th>";
            echo "</tr>";
        while($row_ipforwardsdata = mysqli_fetch_array($result_ipforwardsdata)){
            echo "<tr>";
                #echo "<td>" . $row_ipforwardsdata['id'] . "</td>";
                echo "<td>" . $row_ipforwardsdata['session'] . "</td>";
                echo "<td>" . $row_ipforwardsdata['timestamp'] . "</td>";
                echo "<td>" . $row_ipforwardsdata['dst_ip'] . "</td>";
                echo "<td>" . $row_ipforwardsdata['dst_port'] . "</td>";
                echo "<td>" . $row_ipforwardsdata['data'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_ipforwardsdata);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_ipforwardsdata. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}

else{
echo "Use the menu on the left to navigate between different statistics/info";
}
?>
