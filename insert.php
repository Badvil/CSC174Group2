<?php
     $host = "us-cdbr-east-06.cleardb.net";
     $user = "b2262c566d4a43";
     $pass = "cefdaa0f";
     $db = "heroku_306b8584a14114c";
     $conn = new mysqli($host, $user, $pass, $db);
     if($conn -> connect_errno){ // DB error checking
         echo 'MySQL connection failed e.e'.$conn -> connect_errno;
         exit();
     }//else echo 'it works!!<br>';

     $sku = $_GET["sku"]; // get the number inputted from HTML form
     $sku = str_pad($sku, 8, "0", STR_PAD_LEFT); // if user inputs a number with less than 8 digits, pad the left with 0
     //echo $sku;
     $sql = "INSERT INTO merchandise VALUES ('$sku')";
     $insert = $conn -> query($sql);
     if(!$insert){
        echo "Error dude: " .$sql. "<br>" .$conn->error;
     }else{ 
        echo "hey it works!";
        header("Location: index.php");
     }

     
?>