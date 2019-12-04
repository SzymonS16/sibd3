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
        

        /*consultation_diagnostic(VAT_doctor,date_timestamp,ID)*/

        /*consultation_assistant(VAT_doctor,date_timestamp,VAT_nurse)*/

        /*prescription(name,lab,VAT_doctor,date_timestamp,ID,dosage,description)*/



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
            echo("<th>description</th>\n");
            echo("<th>vat_client</th>\n");
            echo("</tr>\n");
            
            foreach($result_cons as $row)
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
             echo("<th>vat_doctor</th>\n");
             echo("<th>date_timestamp</th>\n");
             echo("<th>description</th>\n");
             echo("<th>vat_client</th>\n");
             echo("</tr>\n");
             
             foreach($result_cons_ass as $row)
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
            echo("<th>vat_doctor</th>\n");
            echo("<th>date_timestamp</th>\n");
            echo("<th>description</th>\n");
            echo("<th>vat_client</th>\n");
            echo("</tr>\n");
            
            foreach($result_cons_diag as $row)
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
             echo("<th>vat_doctor</th>\n");
             echo("<th>date_timestamp</th>\n");
             echo("<th>description</th>\n");
             echo("<th>vat_client</th>\n");
             echo("</tr>\n");
             
             foreach($result_presc as $row)
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

         $connection = null;

?>