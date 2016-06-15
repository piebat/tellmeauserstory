<?php

function getStories($q){
    $link = mysql_connect('localhost', 'battisto_UStory', 'DT;lSn5Ces{a')
        or die('Could not connect: ' . mysql_error());
    mysql_select_db('battisto_UserStory') or die('Could not select database');

    // Performing SQL query
    $query =  "SELECT storia FROM `battisto_UserStory`.`Stories` WHERE who='".$q."' ORDER BY id DESC;";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    if ($result) {
        
        echo "<table class='table table-striped'>";
        echo ' <thead>
            <tr>
            <th>Storie Archiviate</th>
            </tr>
            ';
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
mysql_free_result($result);

// Closing connection
mysql_close($link);

    }
}

if (isset($_GET['q'])) {
$p = $_REQUEST["q"];
getStories($p);
                        }
?>