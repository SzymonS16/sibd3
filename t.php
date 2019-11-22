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
            $sql = "SELECT * FROM employee";
            $result = $connection->query($sql);
            if ($result == FALSE)
            {
            $info = $connection->errorInfo();
            echo("<p>Error: {$info[2]}</p>");
            exit();
            }
            echo("<table border=\"1\">");
            echo("<tr><td>vat</td><td>name</td></tr>");
            foreach($result as $row)
            {
            echo("<tr><td>");
            echo($row['vat']);
            echo("</td><td>");
            echo($row['name']);
            echo("</td></tr>");
            }
            echo("</table>");
            $connection = null;
        ?>
    </body>
</html>