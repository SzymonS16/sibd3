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
        $VAT = $_REQUEST['VAT'];
        $name = $_REQUEST['name'];
        $birth_date = $_REQUEST['birth_date'];
        $street = $_REQUEST['street'];
        $city = $_REQUEST['city'];
        $zip = $_REQUEST['zip'];
        $gender = $_REQUEST['gender'];

        $birthDate = explode("-", $birth_date);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));

        $sql = "INSERT INTO client VALUES ('$VAT', '$name', $birth_date, $street,
        $city, $zip, $gender, $age)";
        echo("<p>$sql</p>");
        $nrows = $connection->exec($sql);
        echo("<p>Rows inserted: $nrows</p>");
        $connection = null;
    ?>
 </body>
</html>
