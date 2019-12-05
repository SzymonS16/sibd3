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

    $vat_doctor = $_REQUEST['vat_doctor'];
    $date_timestamp = $_REQUEST['date_timestamp'];
    
    $soap_s = $_REQUEST['soap_s'];
    $soap_o = $_REQUEST['soap_o'];
    $soap_a = $_REQUEST['soap_a'];
    $soap_p = $_REQUEST['soap_p'];

    $vat_nurse = $_REQUEST['assistant'];
    
    $diagnostic_id[0] = $_REQUEST['diag_1'];
    $diagnostic_id[1] = $_REQUEST['diag_2'];
    $diagnostic_id[2] = $_REQUEST['diag_3'];
    

    $name_lab[0] = $_REQUEST['med_1'];
    $tmp_1 = explode("-", $name_lab[0]);
    $name[0] = $tmp_1[0];
    $lab[0] = $tmp_1[1];
    $dosage[0] = $_REQUEST['dosage_1'];
    $presc_description[0] = $_REQUEST['presc_description_1'];

    $name_lab[1] = $_REQUEST['med_2'];
    $tmp_2 = explode("-", $name_lab[1]);
    $name[1] = $tmp_2[0];
    $lab[1] = $tmp_2[1];
    $dosage[1] = $_REQUEST['dosage_2'];
    $presc_description[1] = $_REQUEST['presc_description_2'];

    $name_lab[2] = $_REQUEST['med_3'];
    $tmp_3 = explode("-", $name_lab[2]);
    $name[2] = $tmp_3[0];
    $lab[2] = $tmp_3[1];
    $dosage[2] = $_REQUEST['dosage_3'];
    $presc_description[2] = $_REQUEST['presc_description_3'];

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

    for($i=0; $i < sizeof($diagnostic_id); $i++){
        if(!empty($diagnostic_id[$i])){
            $sql_cons_diag = "INSERT INTO consultation_diagnostic 
            VALUES ('$vat_doctor', '$date_timestamp', '$diagnostic_id[$i]')";
            $res_diag[$i] = $connection->exec($sql_cons_diag);
            echo($sql_cons_diag);
            echo("\n");
        }
    }

    for($i=0; $i < sizeof($name_lab); $i++){
        if(!empty($name_lab[$i])){
            $sql_presc = "INSERT INTO prescription 
            VALUES ('$name[$i]', '$lab[$i]', '$vat_doctor', '$date_timestamp', '$diagnostic_id[$i]', '$dosage[$i]', '$presc_description[$i]')";
            $res_pre[$i] = $connection->exec($sql_presc);
            echo($sql_presc);
            echo("\n");
        }
    }
        //TO DO - warunki
    if ($result1 and $result2 and $result3 and $result4 and false) {
        $connection->commit();
    }
    else {
        $connection->rollBack();
        echo("Transaction aborted");
    }
    
?>
 </body>
</html>