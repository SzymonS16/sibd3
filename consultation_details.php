<?php       
        $vat_doctor =  $_REQUEST['vat_doctor'];
        $date_timestamp = $_REQUEST['date_timestamp'];

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
    
        /*APPOINTMENT*/

        $sql_app = "SELECT * FROM appointment WHERE vat_doctor = '$vat_doctor' AND date_timestamp = '$date_timestamp'";

        $result_app = $connection->query($sql_app);
        if ($result_app == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
       
        echo("<h1>Appointment</h1>");

        if($result_app -> rowCount() > 0){
            echo("<table border=\"0\" cellspacing=\"5\">\n");
            echo("<tr>\n");
            echo("<th>vat_doctor</th>\n");
            echo("<th>date_timestamp</th>\n");
            echo("<th>description</th>\n");
            echo("<th>vat_client</th>\n");
            echo("</tr>\n");
            
            foreach($result_app as $row)
            {
            echo("<tr>\n");
            echo("<td>{$row['vat_doctor']}</td>\n");
            echo("<td>{$row['date_timestamp']}</td>\n");
            echo("<td>{$row['description']}</td>\n");
            echo("<td>{$row['vat_client']}</td>\n");
            echo("</tr>\n");
            }
            echo("</table>\n");
        }

        /*CONSULTATION*/

        $sql_cons = "SELECT * FROM consultation WHERE vat_doctor = '$vat_doctor' AND date_timestamp = '$date_timestamp'";

        $result_cons = $connection->query($sql_cons);
        if ($result_cons == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
       
        echo("<h1>Consultation</h1>");

        if($result_cons -> rowCount() > 0){
            echo("<table border=\"0\" cellspacing=\"5\">\n");
            echo("<tr>\n");
            echo("<th>vat_doctor</th>\n");
            echo("<th>date_timestamp</th>\n");
            echo("<th>soap_s</th>\n");
            echo("<th>soap_o</th>\n");
            echo("<th>soap_a</th>\n");
            echo("<th>soap_p</th>\n");
            echo("</tr>\n");
            
            foreach($result_cons as $row)
            {
            echo("<tr>\n");
            echo("<td>{$row['vat_doctor']}</td>\n");
            echo("<td>{$row['date_timestamp']}</td>\n");
            echo("<td>{$row['soap_s']}</td>\n");
            echo("<td>{$row['soap_o']}</td>\n");
            echo("<td>{$row['soap_a']}</td>\n");
            echo("<td>{$row['soap_p']}</td>\n");
            echo("</tr>\n");
            }
            echo("</table>\n");
        }

         /*CONSULTATION-ASSISTANT*/

         $sql_cons_ass = "SELECT * FROM consultation_assistant WHERE vat_doctor = '$vat_doctor' AND date_timestamp = '$date_timestamp'";

         $result_cons_ass = $connection->query($sql_cons_ass);
         if ($result_cons_ass == FALSE)
         {
         $info = $connection->errorInfo();
         echo("<p>Error: {$info[2]}</p>");
         exit();
         }
        
         echo("<h1>Consultation assistant</h1>");
 
         if($result_cons_ass -> rowCount() > 0){
             echo("<table border=\"0\" cellspacing=\"5\">\n");
             echo("<tr>\n");
             echo("<th>vat_nurse</th>\n");
             echo("</tr>\n");
             
             foreach($result_cons_ass as $row)
             {
             echo("<tr>\n");
             echo("<td>{$row['vat_nurse']}</td>\n");
             echo("</tr>\n");
             }
             echo("</table>\n");
         }

        /*CONSULTATION-DIAGNOSTIC*/

        $sql_cons_diag = "SELECT * FROM consultation_diagnostic WHERE vat_doctor = '$vat_doctor' AND date_timestamp = '$date_timestamp'";

        $result_cons_diag = $connection->query($sql_cons_diag);
        if ($result_cons_diag == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
       
        echo("<h1>Consultation diagnostic</h1>");

        if($result_cons_diag -> rowCount() > 0){
            echo("<table border=\"0\" cellspacing=\"5\">\n");
            echo("<tr>\n");
            echo("<th>id</th>\n");
            echo("</tr>\n");
            
            foreach($result_cons_diag as $row)
            {
            echo("<tr>\n");
            echo("<td>{$row['id']}</td>\n");
            echo("</tr>\n");
            }
            echo("</table>\n");
        }

         /*PRESCRIPTION*/

         $sql_presc = "SELECT * FROM prescription WHERE vat_doctor = '$vat_doctor' AND date_timestamp = '$date_timestamp'";

         $result_presc = $connection->query($sql_presc);
         if ($result_presc == FALSE)
         {
         $info = $connection->errorInfo();
         echo("<p>Error: {$info[2]}</p>");
         exit();
         }
        
         echo("<h1>Prescription</h1>");
 
         if($result_presc -> rowCount() > 0){
             echo("<table border=\"0\" cellspacing=\"5\">\n");
             echo("<tr>\n");
             echo("<th>name</th>\n");
             echo("<th>lab</th>\n");
             echo("<th>dosage</th>\n");
             echo("<th>description</th>\n");
             echo("</tr>\n");
             
             foreach($result_presc as $row)
             {
             echo("<tr>\n");
             echo("<td>{$row['name']}</td>\n");
             echo("<td>{$row['lab']}</td>\n");
             echo("<td>{$row['dosage']}</td>\n");
             echo("<td>{$row['description']}</td>\n");
             echo("</tr>\n");
             }
             echo("</table>\n");
         }

         /*PROCEDURE*/

         $sql_proc = "SELECT * FROM procedure_in_consultation WHERE vat_doctor = '$vat_doctor' AND date_timestamp = '$date_timestamp'";

         $result_proc = $connection->query($sql_proc);
         if ($result_proc == FALSE)
         {
         $info = $connection->errorInfo();
         echo("<p>Error: {$info[2]}</p>");
         exit();
         }
        
         echo("<h1>Procedure</h1>");

         if($result_proc -> rowCount() > 0){
             echo("<table border=\"0\" cellspacing=\"5\">\n");
             echo("<tr>\n");
             echo("<th>name</th>\n");
             echo("<th>vat_doctor</th>\n");
             echo("<th>date_timestamp</th>\n");
             echo("<th>description</th>\n");
             echo("</tr>\n");
             
             foreach($result_proc as $row)
             {
             echo("<tr>\n");
             echo("<td>{$row['name']}</td>\n");
             echo("<td>{$row['vat_doctor']}</td>\n");
             echo("<td>{$row['date_timestamp']}</td>\n");
             echo("<td>{$row['description']}</td>\n");
             echo("</tr>\n");
             }
             echo("</table>\n");
         }
         else{
            echo("<td><a href=\"dental_charting.php?vat_doctor=");
                    echo($row['vat_doctor']);
                    echo("&date_timestamp=");
                    echo($row['date_timestamp']);
                    echo("\">Add procedure</a></td>\n");
         }

         $connection = null;

?>