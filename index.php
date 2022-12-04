<!DOCTYPE html>
<html lang="en">

<body>
    <center><h1>Brushlands</h1></center>
    <div class="table form">
        <table>
            <form action="insert.php" method="get">
            <tr>
                <th>Enter Movie SKU here:</th>
                <td><input type="text" maxlength = "8" name = "sku" placeholder="Enter SKU (8)" required></td>
            </tr>
            <tr>
                <td><button type>Submit</button> </td>
            </tr>
            </form>
        </table>
    </div>
    <h2> Movie Table</h2>
    <table>
        <tr>
                <th>SKU</th>
                <th>MOVIE_NAME</th>
        </tr>
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

            $prepped_stmt = $conn -> prepare("SELECT * FROM movie");
            $prepped_stmt -> execute();
            $result = $prepped_stmt -> get_result();

            if($result -> num_rows > 0){ // if there is at least 1 row
                while($row = $result -> fetch_assoc()) { // fetch next row if there is one
                    echo "<tr>
                            <td>" . $row['SKU'] . "</td>
                            <td>". $row['MOVIE_NAME']."</td>
                        </tr>";
                }
            }else echo "Nothing!<br></br>"; // else display that there is nothing
            
            $prepped_stmt -> close();
            $conn -> close();
            

        ?>
    </table>
</div>
</body>
