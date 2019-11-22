<html>
 <body>
 <h3>Clients</h3>

<?php
    $host = "db.tecnico.ulisboa.pt";
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
    $name = $_REQUEST['name'];
    $street = $_REQUEST['street'];
    $city = $_REQUEST['city'];
    $zip = $_REQUEST['zip'];

    $sql = "SELECT * FROM client"; //sql TO DO
    $result = $connection->query($sql);
    if ($result == FALSE)
    {
    $info = $connection->errorInfo();
    echo("<p>Error: {$info[2]}</p>");
    exit();
    }
    echo("<table border=\"0\" cellspacing=\"5\">\n");
    
    if($result -> rowCount() > 0){
        foreach($result as $row)
        {
        echo("<tr>\n");
        echo("<td>{$row['VAT']}</td>\n");
        echo("<td>{$row['name']}</td>\n");
        echo("<td><a href=\"new_appointment.php?VAT=");
        echo($row['VAT']);
        echo("\">Make appointment</a></td>\n");
        echo("</tr>\n");
        }
        echo("</table>\n");
        $connection = null;
    }
    else{
        echo("<p>Client not found!</p>");
        echo("<p><a href=\"new_client.php");
        echo("\">Create new client</a></p>\n");
    }  
?>
 </body>
</html>