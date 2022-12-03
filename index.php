<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initail-scale+1.0">
    <link rel+"stylesheet" href+style.css">
    <title>Brushlands</title>
</html>

<body>
    <center><h1>Brushlands</h1></center>
    <div class="table form">
        <table>
            <form action="insert.php" method="get">
            <tr>
                <th>Merchandise</th>
                <td><input type="text" maxlength = "8" name = "sku" placeholder="Enter SKU (8)"></td>
            </tr>
            <tr>
                <td><button type>Submit</button> </td>
            </tr>
            </form>
        </table>
    </div>
    <h2> SKU </h2>
    <table>
        <?php
            // we used ClearDB provided by Heroku for our DB
            $host = "us-cdbr-east-06.cleardb.net";
            $user = "b2262c566d4a43";
            $pass = "cefdaa0f";
            $db = "heroku_306b8584a14114c";
            $conn = new mysqli($host, $user, $pass, $db);
            if($conn -> connect_errno){ // DB error checking
                echo 'MySQL connection failed e.e'.$conn -> connect_errno;
                exit();
            }//else echo 'it works!!<br>';

            $prepped_stmt = $conn -> prepare("SELECT * FROM merchandise");
            $prepped_stmt -> execute();
            $result = $prepped_stmt -> get_result();

            if($result -> num_rows > 0){ // if there is at least 1 row
                while($row = $result -> fetch_assoc()) { // fetch next row if there is one
                    echo "<tr><td>" . $row['SKU'] . "</td></tr>";
                }
            }else echo "Nothing!<br></br>"; // else display that there is nothing

            $conn -> close();
            

        ?>
    </table>
</div>
</body>