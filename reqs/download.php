<?php
$shasum = $_GET['shasum'];
echo "<h2>Download</h2>";
echo "<b>";
echo $_GET['shasum'];
echo "</b><br>";
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
// Attempt select query execution
#$sql_auth_username_count = "SELECT username, count(*) as username_count FROM auth GROUP BY username ORDER BY username_count DESC LIMIT 25";
#$row_auth_username_count['username_count']
$sql_download_number = "SELECT shasum, count(*) as download_number FROM downloads where shasum = \"$shasum\"";
if($result_download_number = mysqli_query($link, $sql_download_number)){
    if(mysqli_num_rows($result_download_number) > 0){
        echo "This file is downloaded ";
        while($row_download_number = mysqli_fetch_array($result_download_number)){
            echo $row_download_number['download_number'];
        }
        echo " times";
         // Free result set
        mysqli_free_result($result_download_number);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql_download_number. " . mysqli_error($link);
}
echo "<a href=\"https://www.virustotal.com/gui/file/"$shasum">Link to VirusTotal</a>";
// Close connection
mysqli_close($link);
?>