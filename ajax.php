<?php
        $selectGenre = $_GET['selection'];
        
        $mysql_access = mysql_connect("localhost", "n00687362", 'Drakos$$h');
        if (!$mysql_access)
        {
                echo "Connection failed.";
                exit;
        }
        mysql_select_db("n00687362");

        $query = "Select * from Books where Genre='" . $selectGenre . "'";

        $result = mysql_query($query);
        
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>";
        echo "<th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Publish Date</th><th>Copies Sold</th>";
        echo "</tr>";

        while ($record = mysql_fetch_array($result)) {
                
                echo "<tr>";
                echo "<td>$record[0]</td>";
                echo "<td>$record[1]</td>";
                echo "<td>$record[2]</td>";
                echo "<td>$record[3]</td>";
                echo "<td>$record[4]</td>";
                echo "<td>$record[5]</td>";
                echo "</tr>";
        }
        echo "</table>";

	mysql_close($mysql_access);

?>




