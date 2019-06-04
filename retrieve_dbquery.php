<?php

$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if (!$link) {
     die('Could not connect: ' . mysql_error());
     }
$db_selected = mysql_select_db(DB_NAME, $link);
if (!$db_selected) {
die('Can\'t connect to ' . DB_NAME . ': ' . mysql_error());
}

$id = (int)$_GET['id'];

$query = "SELECT *
FROM `Form DB`
WHERE `id` =$id
LIMIT 0 , 30";
// Send the info
$info = mysql_query($query);

echo "<h2>People's Comments</h2>";
while($row = mysql_fetch_array($info, MYSQL_ASSOC)) {
$name = $row['name'];
$comment = $row['comment'];

$name = htmlspecialchars($row['name'],ENT_QUOTES);
$comment = htmlspecialchars($row['comment'],ENT_QUOTES);

echo "
Name: $name<br />
Comment: $comment<br />";
}

mysql_close($link);

?>
