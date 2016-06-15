
<?php
    
if (isset($_POST['who'])) {
    $who = strip_tags($_POST['who']);
    $what = strip_tags($_POST['what']);
    $why = strip_tags($_POST['why']);
    $story = strip_tags($_POST['type']);

    $storia = addslashes("Come " . $who . ", voglio " . $what . " così " . $why . ".");
    
    // Connecting, selecting database
    $link = mysql_connect('localhost', 'battisto_UStory', 'DT;lSn5Ces{a')
        or die('Could not connect: ' . mysql_error());
    mysql_select_db('battisto_UserStory') or die('Could not select database');

    // Performing SQL query
    $query =  "INSERT INTO `battisto_UserStory`.`Stories` (`id`, `who`, `what`, `why`, `storia`) VALUES (NULL,'".addslashes($who)."','".addslashes($what)."','".addslashes($why)."','".$storia."');";
    $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    if ($result) {
        echo '<h2> Storia Savata per ' . $who .'</h2>';
        echo '<script type="text/javascript">
  showHint("'.$who.'");
</script>';
    }
}
?>