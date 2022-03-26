<?php
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_sessions = "SELECT * FROM sessions LIMIT 25";
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
?>