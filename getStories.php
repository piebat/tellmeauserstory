<?php
    $link = mysql_connect('localhost', 'battisto_UStory', 'DT;lSn5Ces{a')
        or die('Could not connect: ' . mysql_error());
    mysql_select_db('battisto_UserStory') or die('Could not select database');

    // Performing SQL query
    $query =  "SELECT * FROM `battisto_UserStory`.`Stories`;";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    if ($result) {
        echo "<table>\n";
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
?>