<?php
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_auth = "SELECT * FROM auth ORDER BY timestamp DESC LIMIT 25";
if($result_auth = mysqli_query($link, $sql_auth)){
    if(mysqli_num_rows($result_auth) > 0){
        echo "<table>";
        echo "<h2>Logins</h2>";
        echo "<h3>Last 25 Logins</h3>";
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
?>