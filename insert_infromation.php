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

    /*consultation(VAT_doctor,date_timestamp,SOAP_S,SOAP_O,SOAP_A,SOAP_P)*/

    /*consultation_assistant(VAT_doctor,date_timestamp,VAT_nurse)*/
    
    /*consultation_diagnostic(VAT_doctor,date_timestamp,ID)*/
    
    /*prescription(name,lab,VAT_doctor,date_timestamp,ID,dosage,description)*/

    $vat_doctor = $_REQUEST['vat_doctor'];
    $date_timestamp = $_REQUEST['date_timestamp'];
    
    $soap_s = $_REQUEST['soap_s'];
    $soap_o = $_REQUEST['soap_s'];
    $soap_a = $_REQUEST['soap_s'];
    $soap_p = $_REQUEST['soap_s'];

    $vat_nurse = $_REQUEST['vat_nurse'];
    
    $diagnostic_id = $_REQUEST['diagnostic_id'];
    
    $name = $_REQUEST['name'];
    $lab = $_REQUEST['lab'];
    $dosage = $_REQUEST['dosage'];
    $presc_description = $_REQUEST['presc_description'];
    
    $connection->beginTransaction();

    $sql_cons = "INSERT INTO consultation 
    VALUES ('$vat_doctor', '$date_timestamp', '$soap_s', '$soap_o', '$soap_a', '$soap_p')";
    $result1 = $connection->exec($sql_cons);
    echo($sql_cons);
    echo("\n");

    $sql_cons_ass = "INSERT INTO consultation_assistant 
    VALUES ('$vat_doctor', '$date_timestamp', '$vat_nurse')";
    $result2 = $connection->exec($sql_cons_ass);
    echo($sql_cons_ass);
    echo("\n");

    /* TO DO - obsluga wielu diagnoz i wielu lekow po 5 */

    $sql_cons_diag = "INSERT INTO consultation_diagnostic 
    VALUES ('$vat_doctor', '$date_timestamp', '$diagnostic_id')";
    $result3 = $connection->exec($sql_cons_diag);
    echo($sql_cons_diag);
    echo("\n");

    $sql_presc = "INSERT INTO prescription 
    VALUES ('$name', '$lab', '$vat_doctor', '$date_timestamp', '$diagnostic_id', '$dosage', '$presc_description')";
    $result4 = $connection->exec($sql_presc);
    echo($sql_presc);
    echo("\n");


    for($i=0; $i < sizeof($measures); $i++){
        $q = intval($i / 8) + 1;
        $no = ($i % 8) + 1;

        $sql = "INSERT INTO procedure_charting 
        VALUES ('$procedure', '$vat_doctor', '$date_timestamp', $q, $no, '$description', $measures[$i])";

        echo($sql);
        echo("\n");
        
        $result[$i] = $connection->exec($sql);
    }

    if ($result1 and $result2 and $result3 and $result4) {
        $connection->commit();
    }
    else {
        $connection->rollBack();
        echo("CHUJ");
    }
    
?>
 </body>
</html>