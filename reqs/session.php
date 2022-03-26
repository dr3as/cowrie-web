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
            if($client = mysqli_query($link, "SELECT version from clients where id = \"$clientid\"")){
                $row_client_version = mysqli_fetch_row($client);
                
                echo $row_client_version['0'];
        }
        echo "<br>";
        if($username_password = mysqli_query($link, "SELECT username, password from auth where session = \"$session\"")){
            while($row_session_username_password = mysqli_fetch_array($username_password)){
                echo "Username/Password: "
                echo $row_session_username_password['username'];
                echo "/";
                echo $row_session_username_password['password'];
    }
}
        ##
        echo "<br><br>";
        echo "Commands executed in this session:<br>";
        $sql_session_commands = "SELECT input FROM input where session = \"$session\"";
if($result_session_commands = mysqli_query($link, $sql_session_commands)){
    if(mysqli_num_rows($result_session_commands) > 0){
        while($row_session_commands = mysqli_fetch_array($result_session_commands)){
            echo $row_session_commands['input'];
            echo "<br>";
        }
        // Free result set
        mysqli_free_result($result_session_commands);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_session_commands. " . mysqli_error($link);
}
####
        ##
        echo "<br><br>";
        echo "Files downloaded in this session:<br>";
        $sql_session_downloads = "SELECT url, shasum FROM downloads where session = \"$session\"";
if($result_session_downloads = mysqli_query($link, $sql_session_downloads)){
    if(mysqli_num_rows($result_session_downloads) > 0){
        while($row_session_downloads = mysqli_fetch_array($result_session_downloads)){
            #echo "<td><a href=\"index.php?url=download&shasum=". $row_downloads['shasum'] ."\">" . $row_downloads['shasum'] . "</a></td>";
            #echo "<a href=\"index.php?url=download&shasum=". $row_session_downloads['shasum'] ."\">". $row_session_downloads['url']; ."</a>";
            if($row_session_downloads['shasum'] != "NULL" && $row_session_downloads['url'] != ""){
            echo "<a href=\"index.php?url=download&shasum=";
            echo $row_session_downloads['shasum'];
            echo "\">";
            echo $row_session_downloads['url'];
            echo "</a>";
            echo "<br>";
        }
        elseif($row_session_downloads['url'] != ""){
            echo $row_session_downloads['url'];
            echo "<br>";
        }
        else{
            echo "<a href=\"index.php?url=download&shasum=";
            echo $row_session_downloads['shasum'];
            echo "\">";
            echo $row_session_downloads['shasum'];
            echo "</a>";
            echo "<br>";
        }
        }
        // Free result set
        mysqli_free_result($result_session_downloads);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_session_downloads. " . mysqli_error($link);
}
####
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