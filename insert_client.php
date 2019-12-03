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
        $vat = $_REQUEST['vat'];
        $name = $_REQUEST['name'];
        $birth_date = $_REQUEST['birth_date'];
        $street = $_REQUEST['street'];
        $city = $_REQUEST['city'];
        $zip = $_REQUEST['zip'];
        $gender = $_REQUEST['gender'];

        $birthDate = explode("-", $birth_date);
        $td = date("Y-m-d");
        $today = explode("-", $td);

        $age = $today[0] - $birthDate[0];

        if(($birthDate[1] == $today[1]) && $birthDate[2] > $today[2]){
            $age = $age - 1;
        }

        if($birthDate[1] > $today[1]){
            $age = $age - 1;
        }

        $sql = "INSERT INTO client VALUES ('$vat', '$name', '$birth_date', '$street',
        '$city', '$zip', '$gender', $age)";
        echo("<p>$sql</p>");
        $nrows = $connection->exec($sql);
        echo("<p>Rows inserted: $nrows</p>");
        $connection = null;
    ?>
 </body>
</html>
