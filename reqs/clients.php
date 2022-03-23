<?php
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
?>