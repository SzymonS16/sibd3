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
        
        if(!empty($date)){
            $time = date('H:i:s', strtotime($date));  
            if(($time < date('H:i:s',strtotime("09:00:00"))) || ($time > date('H:i:s',strtotime("16:00:00")))){
                echo('Clinic working hours: 9 AM - 5 PM, change time of appointment');
            }

            else{
                $previous = date("Y-m-d H:i:s", strtotime('-1 hours', strtotime($date)));
                $forward = date("Y-m-d H:i:s", strtotime('+1 hours', strtotime($date)));
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
                $description = $_REQUEST['description'];

                //search a doctor list
                $sql = "SELECT e.vat, e.name 
                FROM employee as e
                INNER JOIN(
	                SELECT doc.vat
	                FROM doctor as doc) as docs
                ON e.vat = docs.vat	
                LEFT JOIN(
                    SELECT app.vat_doctor
                    FROM appointment as app
                    WHERE app.date_timestamp > '$previous' AND app.date_timestamp < '$forward') as ax
                ON e.vat = ax.vat_doctor
                WHERE ax.vat_doctor IS NULL";


                $result = $connection->query($sql);
                echo("<table>\n");
                foreach($result as $row){
                    echo("<tr>\n");
                    echo("<td>{$row['vat']}</td>\n");
                    echo("<td>{$row['name']}</td>\n");
                    
                    echo("<td><form name=\"app\" action=\"insert_appointment.php\" method=\"post\">\n");
                    
                    echo("<p><input type=\"hidden\" name=\"vat_client\"\n");
                    echo("value=\"{$vat}\"/></p>");
                    
                    echo("<p><input type=\"hidden\" name=\"vat_doctor\"\n");
                    echo("value=\"{$row['vat']}\"/></p>");
                    
                    echo("<p><input type=\"hidden\" name=\"date_timestamp\"\n");
                    echo("value=\"{$date}\"/></p>");
                    
                    echo("<p><input type=\"hidden\" name=\"description\"\n");
                    echo("value=\"{$description}\"/></p>");
                    
                    echo("<p><input type=\"submit\" value=\"Make appointment\"/></p>");
                    echo("</form></td>");
                    
                    echo("</tr>\n");
                }
                echo("</table>\n");
                $connection = null;
            }
        }
        
        else{
            echo("Fill desire date of appointment!");
        }
    }
    
?>
