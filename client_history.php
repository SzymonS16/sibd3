<?php 
    if(!empty($_REQUEST['vat'])){
        
        $cl = $_REQUEST['vat'];

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
        
        $sql = "SELECT * FROM appointment WHERE vat_client = '$cl' ORDER BY date_timestamp DESC";

        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        
        echo("<h1>Appointment history</h1>");

        if($result -> rowCount() > 0){
            $i = 0;
            echo("<table border=\"0\" cellspacing=\"5\">\n");
            echo("<tr>\n");
            echo("<th>vat_doctor</th>\n");
            echo("<th>date_timestamp</th>\n");
            
            
            echo("<th>description</th>\n");
            echo("<th>vat_client</th>\n");
            echo("</tr>\n");
            foreach($result as $row)
            {
            echo("<tr>\n");
            echo("<td>{$row['vat_doctor']}</td>\n");
            echo("<td>{$row['date_timestamp']}</td>\n");
            
            echo("<td><a href=\"consultation_details.php?vat_doctor=");
            echo($row['vat_doctor']);
            echo("&date_timestamp=");
            echo($row['date_timestamp']);
            echo("\">Details</a></td>\n");
            
            
            echo("<td>{$row['description']}</td>\n");
            echo("<td>{$row['vat_client']}</td>\n");
            echo("</tr>\n");

            $doctor[$i] = $row['vat_doctor'];
            $time[$i] = $row['date_timestamp'];
            $i = $i + 1;
            }
            echo("</table>\n");

            echo("<h1>Conslutation history</h1>");
            echo("<table border=\"0\" cellspacing=\"5\">\n");
            echo("<tr>\n");
            echo("<th>vat_doctor</th>\n");
            echo("<th>date_timestamp</th>\n");
        
            echo("<th>soap_s</th>\n");
            echo("<th>soap_o</th>\n");
            echo("<th>soap_a</th>\n");
            echo("<th>soap_p</th>\n");
            echo("</tr>\n");
            $cons_set = FALSE;

            for($x = 0; $x < sizeof($doctor); $x++){
                $sqll = "SELECT * FROM consultation WHERE vat_doctor = '$doctor[$x]' 
                AND date_timestamp = '$time[$x]'
                ORDER BY date_timestamp";
                $cons = $connection->query($sqll);
                
                if ($cons == FALSE)
                {
                $info = $connection->errorInfo();
                echo("<p>Error: {$info[2]}</p>");
                exit();       
                }
                
                if($cons -> rowCount() > 0){
                    $cons_set = TRUE;
                    foreach($cons as $roww)
                    {
                    echo("<tr>\n");
                    echo("<td>{$roww['vat_doctor']}</td>\n");
                    echo("<td>{$roww['date_timestamp']}</td>\n");
                    
                    echo("<td><a href=\"consultation_details.php?vat_doctor=");
                    echo($row['vat_doctor']);
                    echo("&date_timestamp=");
                    echo($row['date_timestamp']);
                    echo("\">Details</a></td>\n");
                    
                    
                    echo("<td>{$roww['soap_s']}</td>\n");
                    echo("<td>{$roww['soap_o']}</td>\n");
                    echo("<td>{$roww['soap_a']}</td>\n");
                    echo("<td>{$roww['soap_p']}</td>\n");
                    echo("</tr>\n");
                    }  
                }
            }

            echo("</table>\n");

            if(!$cons_set){
                echo("<p>No records in consultations history</p>");
            }

            $connection = null; 
        }
		else{
			echo("<p>No records in appointments history</p>");
        }
}
?>
