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

$VAT = $_REQUEST['VAT'];
$date = $_REQUEST['date'];

//search a doctor list - TO DO
$sql = "SELECT * FROM doctor";
echo("<p>$sql</p>");
$nrows = $connection->exec($sql);
 $connection = null;
?>
 </body>
</html>
