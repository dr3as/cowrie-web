<?php
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
echo "<h2>Download</h2><br>";
echo $_GET['sashum']
// Attempt select query execution
$sql_downloads = "SELECT DISTINCT url, shasum FROM downloads WHERE shasum != \"NULL\"";
if($result_downloads = mysqli_query($link, $sql_downloads)){
    if(mysqli_num_rows($result_downloads) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>url</th>";
                echo "<th>shasum</th>";
            echo "</tr>";
        while($row_downloads = mysqli_fetch_array($result_downloads)){
            echo "<tr>";
                echo "<td>" . $row_downloads['url'] . "</td>";
                echo "<td><a href=\"index.php?url=download&download=". $row_downloads['shasum'] ."\">" . $row_downloads['shasum'] . "</a></td>";
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
?>