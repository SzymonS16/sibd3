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

    $procedure = 'dental charting';
    $vat_doctor = $_REQUEST['vat_doctor'];
    $date_timestamp = $_REQUEST['date_timestamp'];
    //$description = $_REQUEST['description'];
    $description = 'dental charting procedure';
    $dc_desc = 'dc';

    $measures[0] = $_REQUEST['upper_right_1'];
    $measures[1] = $_REQUEST['upper_right_2'];
    $measures[2] = $_REQUEST['upper_right_3'];
    $measures[3] = $_REQUEST['upper_right_4'];
    $measures[4] = $_REQUEST['upper_right_5'];
    $measures[5] = $_REQUEST['upper_right_6'];
    $measures[6] = $_REQUEST['upper_right_7'];
    $measures[7] = $_REQUEST['upper_right_8'];

    $measures[8] = $_REQUEST['upper_left_1'];
    $measures[9] = $_REQUEST['upper_left_2'];
    $measures[10] = $_REQUEST['upper_left_3'];
    $measures[11] = $_REQUEST['upper_left_4'];
    $measures[12] = $_REQUEST['upper_left_5'];
    $measures[13] = $_REQUEST['upper_left_6'];
    $measures[14] = $_REQUEST['upper_left_7'];
    $measures[15] = $_REQUEST['upper_left_8'];

    $measures[16] = $_REQUEST['lower_right_1'];
    $measures[17] = $_REQUEST['lower_right_2'];
    $measures[18] = $_REQUEST['lower_right_3'];
    $measures[19] = $_REQUEST['lower_right_4'];
    $measures[20] = $_REQUEST['lower_right_5'];
    $measures[21] = $_REQUEST['lower_right_6'];
    $measures[22] = $_REQUEST['lower_right_7'];
    $measures[23] = $_REQUEST['lower_right_8'];

    $measures[24] = $_REQUEST['lower_left_1'];
    $measures[25] = $_REQUEST['lower_left_2'];
    $measures[26] = $_REQUEST['lower_left_3'];
    $measures[27] = $_REQUEST['lower_left_4'];
    $measures[28] = $_REQUEST['lower_left_5'];
    $measures[29] = $_REQUEST['lower_left_6'];
    $measures[30] = $_REQUEST['lower_left_7'];
    $measures[31] = $_REQUEST['lower_left_8'];

    $cond = true;

    $connection->beginTransaction();

    $sql_proc_in = "INSERT INTO procedure_in_consultation 
    VALUES ('$procedure', '$vat_doctor', '$date_timestamp', '$description')";

    $result1 = $connection->exec($sql_proc_in);

    for($i=0; $i < sizeof($measures); $i++){
        $q = intval($i / 8) + 1;
        $no = ($i % 8) + 1;

        $sql = "INSERT INTO procedure_charting 
        VALUES ('$procedure', '$vat_doctor', '$date_timestamp', $q, $no, '$dc_desc', $measures[$i])";        
     
        $result[$i] = $connection->exec($sql);

        if(!($result[$i])){
            $cond = false;
        }
    }

    if ($result1 and $cond) {
        $connection->commit();
        echo("Operation succeed");
    }
    else {
        $connection->rollBack();
        echo("Transaction aborted");
    }
    
?>
 </body>
</html>