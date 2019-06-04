<?php
if( $_POST )
{

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
     die('Could not connect: ' . mysql_error());
     }
$db_selected = mysql_select_db(DB_NAME, $link);
if (!$db_selected) {
die('Can\'t connect to ' . DB_NAME . ': ' . mysql_error());
}

$name = $_POST['name'];
$comment = $_POST['comment'];

$name = htmlspecialchars($name);
$comment = htmlspecialchars($comment);


$query = "INSERT INTO `tempepro_marcusform`.`Form DB` (`id`, `name`, `comment`) VALUES (NULL, '$name', '$comment');";
// Send the info
mysql_query($query);

echo "<h2>I appreciate the feedback!</h2>";

mysql_close($link);

}
?>
