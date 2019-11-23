<html>
 <body>
<?php
$host = "db.ist.utl.pt";
$user = "ist195137";
$pass = "taec8707";
$dsn = "mysql:host=$host;dbname=$user";
try
{
$connection = new PDO($dsn, $user, $pass);
}
catch(PDOException $exception)
{
echo("<p>Error: ");
echo($exception->getMessage());
echo("</p>");
exit();
}

$vat = $_REQUEST['vat'];
$date = $_REQUEST['date'];

//search a doctor list - TO DO
$sql = "SELECT * FROM doctor";
$result = $connection->exec($sql);
foreach($result as $row){
    echo("<tr>\n");
    echo("<td>{$row['vat']}</td>\n");
    echo("<td>{$row['name']}</td>\n");
    echo("</tr>\n");
}
echo("</table>\n");
 $connection = null;
?>
 </body>
</html>
