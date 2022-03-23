<?php
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt select query execution
$sql_input = "SELECT * FROM input LIMIT 25";
if($result_input = mysqli_query($link, $sql_input)){
    if(mysqli_num_rows($result_input) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>session</th>";
                echo "<th>timestamp</th>";
                echo "<th>success</th>";
                echo "<th>input</th>";
            echo "</tr>";
        while($row_input = mysqli_fetch_array($result_input)){
            echo "<tr>";
                echo "<td>" . $row_input['session'] . "</td>";
                echo "<td>" . $row_input['timestamp'] . "</td>";
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
?>