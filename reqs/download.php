<?php
echo "<h2>Download</h2>";
echo "<b>"
echo $_GET['shasum'];
echo "</b>"
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
$sql_download_number = "SELECT DISTINCT url, shasum FROM downloads WHERE shasum != \"NULL\"";
if($result_download_number = mysqli_query($link, $sql_download_number)){
    if(mysqli_num_rows($result_download_number) > 0){
        echo "This file is downloaded ";
        echo " times";
         // Free result set
        mysqli_free_result($result_download_number);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_download_number. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>