<?php
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"))
        $server = $url["host"];
        $username = $url["user"];
        $password = $url["password"];
        $db = substr($url["path"],1);


        $conn = mysqli_connect($server, $username, $password, $db);

        if($conn -> connect_errno){
            echo 'mySQL CONNECTION FAILURE'.$conn -> connect_errno;
            exit()
        }else echo 'mySQL connection successful'

        echo "works!"

        $conn -> close()
?>