<html>
 <body>

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

    $vat_client = $_REQUEST['vat_client'];
    $vat_doctor = $_REQUEST['vat_doctor'];
    $date_timestamp = $_REQUEST['date_timestamp'];
    $description = $_REQUEST['description'];
    
    echo($vat_client);
    echo($vat_doctor);
    echo($date_timestamp);
    echo($description); 

    $sql = "INSERT INTO appointment VALUES ('$vat_doctor', '$date_timestamp', '$description', '$vat_client')";
        echo("<p>$sql</p>");
        $nrows = $connection->exec($sql);
        echo("<p>Rows inserted: $nrows</p>");
        $connection = null;

    
?>
 </body>
</html>