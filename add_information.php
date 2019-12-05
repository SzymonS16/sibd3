<html>
 <body>
 <form action="insert_information.php" method="post">
 <h3>Add information to the appointment</h3>
    
    <p><input type="hidden" name="vat_doctor" value="<?=$_REQUEST['vat_doctor']?>"/></p>
    <p><input type="hidden" name="date_timestamp" value="<?=$_REQUEST['date_timestamp']?>"/></p>
    
    <p>Consultation</p>
        <p>SOAP_S: <input type="text" name="soap_s"/></p>
        <p>SOAP_O: <input type="text" name="soap_o"/></p>
        <p>SOAP_A: <input type="text" name="soap_a"/></p>
        <p>SOAP_P: <input type="text" name="soap_p"/></p>

    <p>Consultation assistant</p>
        <p>Assistant:
        <select name="assistant">
        <?php
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
        $sql = "SELECT n.vat, e.name FROM nurse as n, employee as e WHERE n.vat = e.vat";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $vat_nurse = $row['vat'];
        $nurse_name = $row['name'];
        echo("<option value=\"$vat_nurse\">$nurse_name</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>

    <p>Consultation diagnostic</p>
        <p>Diagnosis 1
        <select name="diag_1">
        <?php
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
        $sql = "SELECT * FROM diagnostic_code";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $diag_id = $row['id'];
        $diag_desc = $row['description'];
        echo("<option value=\"$diag_id\">$diag_desc</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>

        <p>Diagnosis 2
        <select name="diag_2">
        <?php
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
        $sql = "SELECT * FROM diagnostic_code";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $diag_id = $row['id'];
        $diag_desc = $row['description'];
        echo("<option value=\"$diag_id\">$diag_desc</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>

        <p>Diagnosis 3
        <select name="diag_3">
        <?php
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
        $sql = "SELECT * FROM diagnostic_code";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $diag_id = $row['id'];
        $diag_desc = $row['description'];
        echo("<option value=\"$diag_id\">$diag_desc</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>

    <p>Prescription</p>
        <p>Medicament 1
        <select name="med_1">
        <?php
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
        $sql = "SELECT * FROM diagnostic_code";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $diag_id = $row['id'];
        $diag_desc = $row['description'];
        echo("<option value=\"$diag_id\">$diag_desc</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>
        <p>Dosage: <input type="text" name="dosage_1"/></p>
        <p>Description: <input type="text" name="presc_description_1"/></p>

        <p>Medicament 2
        <select name="med_2">
        <?php
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
        $sql = "SELECT * FROM diagnostic_code";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $diag_id = $row['id'];
        $diag_desc = $row['description'];
        echo("<option value=\"$diag_id\">$diag_desc</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>
        <p>Dosage: <input type="text" name="dosage_2"/></p>
        <p>Description: <input type="text" name="presc_description_2"/></p>

        <p>Medicament 3
        <select name="med_3">
        <?php
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
        $sql = "SELECT * FROM diagnostic_code";
        $result = $connection->query($sql);
        if ($result == FALSE)
        {
        $info = $connection->errorInfo();
        echo("<p>Error: {$info[2]}</p>");
        exit();
        }
        foreach($result as $row)
        {
        $diag_id = $row['id'];
        $diag_desc = $row['description'];
        echo("<option value=\"$diag_id\">$diag_desc</option>");
        }
        $connection = null;
        ?>
        </select>
        </p>
        <p>Dosage: <input type="text" name="dosage_3"/></p>
        <p>Description: <input type="text" name="presc_description_3"/></p>
                
 <p><input type="submit" value="Submit"/></p>
 </form>
 </body>
</html>