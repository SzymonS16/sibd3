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

    if((empty($_REQUEST['vat']))
    && (empty($_REQUEST['name']))
    && (empty($_REQUEST['street']))
    && (empty($_REQUEST['city']))
    && (empty($_REQUEST['zip'])))
    {
        $sql = "SELECT * FROM client"; 
    }
    else{
        $vat = $_REQUEST['vat'];
        $name = $_REQUEST['name'];
        $street = $_REQUEST['street'];
        $city = $_REQUEST['city'];
        $zip = $_REQUEST['zip'];

        $where = "WHERE ";
        $first = TRUE;

        if(!empty($vat)){
            $where .= "vat = '$vat'";
            $first = FALSE;
        }

        if(!empty($name)){
            if($first){
                $where .= " name LIKE '%$name%'";
                $first = FALSE;
            }
            else{
                $where .= " and name LIKE '%$name%'"; 
            }
        }

        if(!empty($street)){
            if($first){
                $where .= " street LIKE '%$street%'";
                $first = FALSE;
            }
            else{
                $where .= " and street LIKE '%$street%'";
            }       
        }

        if(!empty($city)){
            if($first){
                $where .= " city LIKE '%$city%'";
                $first = FALSE;
            }
            else{
                $where .= " and city LIKE '%$city%'";
            }
        }

        if(!empty($zip)){
            if($first){
                $where .= " zip LIKE '%$zip%'";
                $first = FALSE;
            }
            else{
                $where .= " and zip LIKE '%$zip%'";
            }
        }
        
        $sql = "SELECT * FROM client $where"; 
    }
    
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
        echo("<td>{$row['vat']}</td>\n");
        echo("<td>{$row['name']}</td>\n");
        echo("<td><a href=\"new_appointment.php?vat=");
        echo($row['vat']);
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