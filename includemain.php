<?php
//import login for db
require "config.php";
//Create var for connecting to DB
$link = mysqli_connect($mysql_host, $mysql_user, $mysql_pw, $mysql_db);
//if url var is set to auth
if($_GET['url'] == "auth"){
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_auth = "SELECT * FROM auth ORDER BY timestamp DESC LIMIT 100";
if($result_auth = mysqli_query($link, $sql_auth)){
    if(mysqli_num_rows($result_auth) > 0){
        echo "<h2>Logins</h2>";
        echo "<h3>Last 100 Logins</h3>";
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Session</th>";
                echo "<th>Success</th>";
                echo "<th>username</th>";
                echo "<th>password</th>";
                echo "<th>timestamp</th>";
            echo "</tr>";
        while($row_auth = mysqli_fetch_array($result_auth)){
            echo "<tr>";
                #echo "<td>" . $row_auth['id'] . "</td>";
                echo "<td>" . $row_auth['session'] . "</td>";
                echo "<td>" . $row_auth['success'] . "</td>";
                echo "<td>" . $row_auth['username'] . "</td>";
                echo "<td>" . $row_auth['password'] . "</td>";
                echo "<td>" . $row_auth['timestamp'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_auth);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_auth. " . mysqli_error($link);
}

$sql_auth_username_count = "SELECT username, count(*) as username_count FROM auth GROUP BY username ORDER BY username_count DESC LIMIT 25";
if($result_auth_username_count = mysqli_query($link, $sql_auth_username_count)){
    if(mysqli_num_rows($result_auth_username_count) > 0){
        echo "<h3>Top 25 Usernames</h3>";
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                #echo "<th>Session</th>";
                #echo "<th>Success</th>";
                echo "<th>Username</th>";
                echo "<th>Count</th>";
                #echo "<th>timestamp</th>";
            echo "</tr>";
        while($row_auth_username_count = mysqli_fetch_array($result_auth_username_count)){
            echo "<tr>";
                #echo "<td>" . $row_auth['id'] . "</td>";
                #echo "<td>" . $row_auth['session'] . "</td>";
                #echo "<td>" . $row_auth['success'] . "</td>";
                echo "<td>" . $row_auth_username_count['username'] . "</td>";
                echo "<td>" . $row_auth_username_count['username_count'] . "</td>";
                #echo "<td>" . $row_auth['timestamp'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_auth_username_count);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_auth_username_count. " . mysqli_error($link);
}

$sql_auth_password_count = "SELECT password, count(*) as password_count FROM auth GROUP BY password ORDER BY password_count DESC LIMIT 25";
if($result_auth_password_count = mysqli_query($link, $sql_auth_password_count)){
    if(mysqli_num_rows($result_auth_password_count) > 0){
        echo "<h3>Top 25 Passwords</h3>";
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                #echo "<th>Session</th>";
                #echo "<th>Success</th>";
                echo "<th>Password</th>";
                echo "<th>Count</th>";
                #echo "<th>timestamp</th>";
            echo "</tr>";
        while($row_auth_password_count = mysqli_fetch_array($result_auth_password_count)){
            echo "<tr>";
                #echo "<td>" . $row_auth['id'] . "</td>";
                #echo "<td>" . $row_auth['session'] . "</td>";
                #echo "<td>" . $row_auth['success'] . "</td>";
                echo "<td>" . $row_auth_password_count['password'] . "</td>";
                echo "<td>" . $row_auth_password_count['password_count'] . "</td>";
                #echo "<td>" . $row_auth['timestamp'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_auth_password_count);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_auth_password_count. " . mysqli_error($link);
}

$sql_auth_username_password_count = "SELECT username, password, count(*) as username_password_count FROM auth GROUP BY username, password ORDER BY username_password_count DESC LIMIT 25";
if($result_auth_username_password_count = mysqli_query($link, $sql_auth_username_password_count)){
    if(mysqli_num_rows($result_auth_username_password_count) > 0){
        echo "<h3>Top 25 Combinations</h3>";
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                #echo "<th>Session</th>";
                echo "<th>Username</th>";
                echo "<th>Password</th>";
                echo "<th>Count</th>";
                #echo "<th>timestamp</th>";
            echo "</tr>";
        while($row_auth_username_password_count = mysqli_fetch_array($result_auth_username_password_count)){
            echo "<tr>";
                #echo "<td>" . $row_auth['id'] . "</td>";
                #echo "<td>" . $row_auth['session'] . "</td>";
                echo "<td>" . $row_auth_username_password_count['username'] . "</td>";
                echo "<td>" . $row_auth_username_password_count['password'] . "</td>";
                echo "<td>" . $row_auth_username_password_count['username_password_count'] . "</td>";
                #echo "<td>" . $row_auth['timestamp'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_auth_username_password_count);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_auth_username_password_count. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "clients"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_clients = "SELECT * FROM clients";
if($result_clients = mysqli_query($link, $sql_clients)){
    if(mysqli_num_rows($result_clients) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Version</th>";
            echo "</tr>";
        while($row_clients = mysqli_fetch_array($result_clients)){
            echo "<tr>";
                #echo "<td>" . $row_clients['id'] . "</td>";
                echo "<td>" . $row_clients['version'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_clients);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_clients. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "input"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_input = "SELECT * FROM input";
if($result_input = mysqli_query($link, $sql_input)){
    if(mysqli_num_rows($result_input) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>session</th>";
                echo "<th>timestamp</th>";
                #echo "<th>realm</th>";
                echo "<th>success</th>";
                echo "<th>input</th>";
            echo "</tr>";
        while($row_input = mysqli_fetch_array($result_input)){
            echo "<tr>";
                #echo "<td>" . $row_input['id'] . "</td>";
                echo "<td>" . $row_input['session'] . "</td>";
                echo "<td>" . $row_input['timestamp'] . "</td>";
                #echo "<td>" . $row_input['realm'] . "</td>";
                echo "<td>" . $row_input['success'] . "</td>";
                echo "<td>" . $row_input['input'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_input);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_input. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "sensors"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_sensors = "SELECT * FROM sensors";
if($result_sensors = mysqli_query($link, $sql_sensors)){
    if(mysqli_num_rows($result_sensors) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>ip</th>";
            echo "</tr>";
        while($row_sensors = mysqli_fetch_array($result_sensors)){
            echo "<tr>";
                #echo "<td>" . $row_sensors['id'] . "</td>";
                echo "<td>" . $row_sensors['ip'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_sensors);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_sensors. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
}
elseif($_GET['url'] == "sessions"){

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_sessions = "SELECT * FROM sessions";
if($result_sessions = mysqli_query($link, $sql_sessions)){
    if(mysqli_num_rows($result_sessions) > 0){
        echo "<table>";
            echo "<tr>";
                #echo "<th>id</th>";
                echo "<th>Starttime</th>";
                echo "<th>Endtime</th>";
                #echo "<th>Sensor</th>";
                echo "<th>ip</th>";
                echo "<th>termsize</th>";
                echo "<th>client</th>";
            echo "</tr>";
        while($row_sessions = mysqli_fetch_array($result_sessions)){
            echo "<tr>";
                #echo "<td>" . $row_sessions['id'] . "</td>";
                echo "<td>" . $row_sessions['starttime'] . "</td>";
                echo "<td>" . $row_sessions['endtime'] . "</td>";
                #echo "<td>" . $row_sessions['sensor'] . "</td>";
                echo "<td>" . $row_sessions['ip'] . "</td>";
                echo "<td>" . $row_sessions['termsize'] . "</td>";
                echo "<td>" . $row_sessions['client'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result_sessions);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_sessions. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
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
