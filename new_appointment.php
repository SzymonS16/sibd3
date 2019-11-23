<html>
 <body>
 <h3>Make appointment for client <?=$_REQUEST['vat']?></h3>
 <form name="app" action="" method="post">
 <p><input type="hidden" name="vat"
value="<?=$_REQUEST['vat']?>"/></p>
 <p>date: <input type="datetime-local" name="date"/></p>
 <p>description: <input type="text" name="description"/></p>
 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>

<?php 
    if(isset($_REQUEST['date'])){
        $date = $_REQUEST['date'];
        $date = date("Y-m-d H:i:s", strtotime($date));

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

        echo($date);
        
        //search a doctor list - TO DO
        $sql = "SELECT * FROM appointment where date_timestamp = '$date'";
        $result = $connection->query($sql);
        foreach($result as $row){
            echo("<tr>\n");
            echo("<td>{$row['vat_doctor']}</td>\n");
            echo("<td>{$row['date_timestamp']}</td>\n");
            echo("</tr>\n");
        }
        echo("</table>\n");
        $connection = null;
    }
    else{
        echo("Fill desire date of appointment!");
    }
?>
